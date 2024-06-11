<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Mascota;

class MisMascotas extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $filter, $title, $imagen;
    public $id, $nombre, $especie, $raza, $sexo, $color, $fecha_nacimiento, $tipo, $senas_particulares;
    public $isOpen = 0;
    public $fotoActual;

    public function render()
    {
        $mascotas = $this->search();
        return view('livewire.usuario.mis-mascotas', [
            'mascotas' => $mascotas,
        ]);
    }

    public function search() {
        if(!$this->filter){
            $this->filter = '';
        }
        $userId = Auth::id();
        return Mascota::where('user_id', $userId)->where('nombre', 'like', $this->filter . '%')->paginate(12);
    }

    public function delete($id)
    {
        $user = Mascota::find($id);

        if ($user) {
            $user->delete();
            $this->render();

            session()->flash('success', 'Mascota eliminado.');
        } else {
            session()->flash('error', 'El Mascota no pudo ser encontrado.');
        }
    }

    public function create()
    {
        $this->title = 'Crear Mascota';

        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->nombre = '';
        $this->especie = 'Perro';
        $this->raza = '';
        $this->sexo = 'Macho';
        $this->color = '';
        $this->fecha_nacimiento = null;
        $this->tipo = 'real';
        $this->senas_particulares = '';
        $this->imagen = null;
    }

    public function store()
    {
        try {
            $this->validate([
                'nombre' => 'required',
                'especie' => 'required',
                'sexo' => 'required',
                'fecha_nacimiento' => 'required',
                'tipo' => 'required',
                'imagen' => 'required|image|max:1024'
            ]);

            $path = $this->imagen->store('imagenes', 'custom');

            Mascota::updateOrCreate(['id' => $this->id], [
                'nombre' => $this->nombre,
                'especie' => $this->especie,
                'raza' => $this->raza,
                'sexo' => $this->sexo,
                'color' => $this->color,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'senas_particulares' => $this->senas_particulares,
                'tipo' => $this->tipo,
                'user_id' => Auth::id(),
                'foto' => $path
            ]);

            session()->flash('success', $this->id ? 'Mascota actualizado.' : 'Mascota creado.');

            $this->closeModal();
            $this->resetInputFields();
        } catch (\Throwable $th) {
            session()->flash('error', ($this->id ? 'No se pudo actualizar la Mascota' : 'No se pudo crear el Mascota') . '. ' . $th->getMessage());
        }
    }



    public function edit($id)
    {
        // Encuentra la mascota por su ID
        $mascota = Mascota::findOrFail($id);

        // Cargar los datos de la mascota en las variables del componente
        $this->id = $id;
        $this->nombre = $mascota->nombre;
        $this->especie = $mascota->especie;
        $this->raza = $mascota->raza;
        $this->sexo = $mascota->sexo;
        $this->color = $mascota->color;
        $this->fecha_nacimiento = $mascota->fecha_nacimiento;
        $this->tipo = $mascota->tipo;
        $this->senas_particulares = $mascota->senas_particulares;
        $this->fotoActual = $mascota->foto; // Para mantener la referencia de la foto actual

        // Abre el modal de actualización
        $this->title = 'Actualizar Mascota';
        $this->openModal();
    }


}
