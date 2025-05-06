<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStandRequest;
use App\Models\Feria;
use App\Models\Stand;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;

class StandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stand = Stand::get();

        return view('stand.index', compact('stand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ferias = Feria::all();

        return view('stand.create',
            [
                'ferias' => $ferias,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStandRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descriptions' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'feria_id' => 'required',
        ]);

        $producto = new Stand();
        $producto->name = $request->name;
        $producto->descriptions = $request->descriptions;
        $producto->feria_id = $request->feria_id;
        $producto->save();

        if ($request->hasFile('image')) {
            $producto->addMedia($request->file('image'))->toMediaCollection('images');
        }
        Alert::info('You have successfully created a stand.');

        return redirect()->route('platform.stands')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stand = Stand::findOrFail($id);

        return view('stand.edit', [
            'stand' => $stand,
            'ferias' => Feria::select('name', 'id')->all(),
            'image' => $stand->media,
        ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
