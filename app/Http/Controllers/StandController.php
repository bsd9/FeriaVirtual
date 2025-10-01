<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStandRequest;
use App\Models\Feria;
use App\Models\Stand;
use App\Models\Pavilion;
use App\Models\PavilionStandType;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;

class StandController extends Controller
{
    public function index()
    {
        $stands = Stand::with('pavilion', 'feria')->get();
        return view('stand.index', compact('stands'));
    }

    public function create()
    {
        $ferias = Feria::all();
        $pavilions = Pavilion::all(); // ← Cargar pabellones

        return view('stand.create', compact('ferias', 'pavilions'));
    }

    public function store(StoreStandRequest $request)
    {
        // Validación adicional
        $request->validate([
            'pavilion_id' => 'required|exists:pavilions,id',
            'type' => 'required|in:basic,medium,high',
        ]);

        // Validar límite por pabellón y tipo
        $pavilionId = $request->pavilion_id;
        $standType = $request->type;

        $limitConfig = PavilionStandType::where('pavilion_id', $pavilionId)
            ->where('stand_type', $standType)
            ->first();

        if (!$limitConfig) {
            Alert::error("El tipo de stand '{$standType}' no está permitido en este pabellón.");
            return back()->withInput();
        }

        $currentCount = Stand::where('pavilion_id', $pavilionId)
            ->where('type', $standType)
            ->count();

        if ($currentCount >= $limitConfig->max_stands) {
            Alert::error("No se pueden crear más de {$limitConfig->max_stands} stands del tipo '{$standType}' en este pabellón.");
            return back()->withInput();
        }

        // Crear stand
        $stand = new Stand();
        $stand->name = $request->name;
        $stand->descriptions = $request->descriptions;
        $stand->feria_id = $request->feria_id;
        $stand->pavilion_id = $pavilionId; // ← Asignar pabellón
        $stand->type = $standType;         // ← Asignar tipo
        $stand->save();

        // Adjuntar imagen
        if ($request->hasFile('image')) {
            $stand->addMedia($request->file('image'))->toMediaCollection('images');
        }

        Alert::info('Stand creado correctamente.');
        return redirect()->route('platform.stands');
    }

    public function edit(string $id)
    {
        $stand = Stand::findOrFail($id);
        $ferias = Feria::all();
        $pavilions = Pavilion::all();

        return view('stand.edit', compact('stand', 'ferias', 'pavilions'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descriptions' => 'required|string',
            'feria_id' => 'required|exists:ferias,id',
            'pavilion_id' => 'required|exists:pavilions,id',
            'type' => 'required|in:basic,medium,high',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $stand = Stand::findOrFail($id);

        // Validar límite (excluyendo el propio stand si ya existe)
        $pavilionId = $request->pavilion_id;
        $standType = $request->type;

        $limitConfig = PavilionStandType::where('pavilion_id', $pavilionId)
            ->where('stand_type', $standType)
            ->first();

        if (!$limitConfig) {
            Alert::error("El tipo de stand '{$standType}' no está permitido en este pabellón.");
            return back()->withInput();
        }

        $currentCount = Stand::where('pavilion_id', $pavilionId)
            ->where('type', $standType)
            ->where('id', '!=', $stand->id)
            ->count();

        if ($currentCount >= $limitConfig->max_stands) {
            Alert::error("No se pueden tener más de {$limitConfig->max_stands} stands del tipo '{$standType}' en este pabellón.");
            return back()->withInput();
        }

        // Actualizar datos
        $stand->name = $request->name;
        $stand->descriptions = $request->descriptions;
        $stand->feria_id = $request->feria_id;
        $stand->pavilion_id = $pavilionId;
        $stand->type = $standType;
        $stand->save();

        // Actualizar imagen si se sube una nueva
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior (opcional)
            $stand->clearMediaCollection('images');
            $stand->addMedia($request->file('image'))->toMediaCollection('images');
        }

        Alert::info('Stand actualizado correctamente.');
        return redirect()->route('platform.stands');
    }

    public function destroy(string $id)
    {
        $stand = Stand::findOrFail($id);
        $stand->clearMediaCollection('images'); // Opcional: eliminar imágenes
        $stand->delete();

        Alert::info('Stand eliminado correctamente.');
        return redirect()->route('platform.stands');
    }
}