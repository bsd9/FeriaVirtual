<?php

namespace App\Http\Livewire;

use App\Models\Visitor as VisitorModel;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Livewire\Component;

class Visitor extends Component
{
    public $name;

    public $last_name;

    public $email;

    public $nationality;

    public $geolocation;

    public function Store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:visitors',
            'nationality' => 'required',
        ];

        $this->validate($rules);

        $geolocation = $request->input('geolocation');

        // Crea una nueva instancia del modelo Visitor con los datos del formulario
        $visitor = new VisitorModel([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'nationality' => $request->input('nationality'),
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'device' => $this->getDeviceType($request->header('User-Agent')), // Define la lógica para obtener el tipo de dispositivo
            'session_duration' => null, // Puedes establecer la duración de la sesión si lo deseas
            'geolocation' => $geolocation, // Asigna la geolocalización obtenida
        ]);

        $this->emit('item-added', 'Producto Registrado');
    }

    private function getDeviceType($userAgent)
    {
        $agent = new Agent();

        // Set el agente de usuario personalizado (si es necesario)
        $agent->setUserAgent($userAgent);

        if ($agent->isDesktop()) {
            return 'Escritorio';
        } elseif ($agent->isMobile()) {
            return 'Móvil';
        } elseif ($agent->isTablet()) {
            return 'Tableta';
        } else {
            return 'Desconocido';
        }
    }

    public function render()
    {
        return view('livewire.visitor');
    }

    public function nombreCompleto()
    {
        return $this->select(
            'id',
            DB::raw("CONCAT(first_name, ' ', last_name) AS nombre_completo")
        );
    }
}
