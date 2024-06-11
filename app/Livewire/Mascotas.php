<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mascota;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Mascotas extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $filter, $title, $imagen;
    public $id, $nombre, $especie, $raza, $sexo, $color, $fecha_nacimiento, $tipo, $senas_particulares;
    public $isOpen = 0;
    public $objeto;


    public function render($filter = '')
    {

        $mascotas = $this->search();

        return view('livewire.admin.mascota.list', [
            'mascotas' => $mascotas,
        ]);
    }

    public function search() {
        if(!$this->filter){
            $this->filter = '';
        }
        return Mascota::where('nombre', 'like', $this->filter . '%')->paginate(6);
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
            ]);

            if($this->imagen != $this->objeto->foto){
                $path = $this->imagen->store('imagenes', 'custom');
            }else{
                $path = $this->imagen;
            }


            Mascota::updateOrCreate(['id' => $this->id], [
                'nombre' => $this->nombre,
                'especie' => $this->especie,
                'raza' => $this->raza,
                'sexo' => $this->sexo,
                'color' => $this->color,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'senas_particulares' => $this->senas_particulares,
                'tipo' => $this->tipo,
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

        $this->title = 'Editar Mascota';

        $o = Mascota::findOrFail($id);
        $this->id = $id;
        $this->objeto = $o;

        $this->nombre = $o->nombre;
        $this->especie = $o->especie;
        $this->raza = '';
        $this->sexo = $o->sexo;
        $this->color = $o->color;
        $this->fecha_nacimiento = $o->fecha_nacimiento;
        $this->senas_particulares = $o->senas_particulares;
        $this->tipo = $o->tipo;
        $this->imagen = $o->foto;

        $this->openModal();
    }

}
