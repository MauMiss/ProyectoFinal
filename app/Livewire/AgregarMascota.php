<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mascota;
use App\Models\Propietario;
use App\Models\Cartilla;
use Illuminate\Support\Facades\Auth;

class AgregarMascota extends Component
{
    public $nombre, $especie, $fecha_nacimiento, $raza, $color, $senas_particulares, $tipo, $propietario_id;

    public function mount()
    {
        $this->propietario_id = auth()->user()->id;
    }

    public function render()
    {
        return view('livewire.agregar-mascota');
    }

    // Cambiado de 'guardar' a 'crearmascota'
    public function crearmascota()
    {
        $this->validate([
            'nombre' => 'required',
            'especie' => 'required',
            'fecha_nacimiento' => 'required|date',
            'propietario_id' => 'required|exists:propietarios,id',
        ]);

        $mascota = new Mascota();
        $mascota->nombre = $this->nombre;
        $mascota->especie = $this->especie;
        $mascota->fecha_nacimiento = $this->fecha_nacimiento;
        $mascota->raza = $this->raza;
        $mascota->color = $this->color;
        $mascota->senas_particulares = $this->senas_particulares;
        $mascota->tipo = "real";
        $mascota->propietario_id = $this->propietario_id;

        $mascota->save();

        $this->reset('nombre', 'especie', 'fecha_nacimiento', 'raza', 'color', 'senas_particulares', 'tipo', 'propietario_id');
    }
}
