<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mascota;
use App\Models\Cartilla;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Vacunas extends Component
{
    use WithPagination;

    public $id;
    public $tipo = 0;
    public $isOpen = 0;
    public $idRegistro,$tratamiento,$fecha,$proximo_control,$peso,$descripcion;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $this->tipo = $this->getTipo();

        $mascota = Mascota::find($this->id);
        $data = null;
        $title = '';

        switch($this->tipo){
            case 0:
                $title = 'Vacunas';
                $data = Cartilla::where('mascota_id', $this->id)->where('tratamiento', 'vacuna')->paginate(4);
                break;
            case 1:
                $title = 'Desparasitaciones';
                $data = Cartilla::where('mascota_id', $this->id)->where('tratamiento', 'desparasitacion')->paginate(4);
                break;
            case 2:
                $title = 'Otros tratamientos';
                $data = Cartilla::where('mascota_id', $this->id)->where('tratamiento', 'otro_tratamiento')->paginate(4);
                break;
        }

        return view('livewire.general.cartilla', [ 'mascota'=> $mascota, 'data' => $data, 'title' => $title]);
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function back(){
        if($this->tipo > 0){
            $this->tipo--;
        }
        $this->render();
    }

    public function next(){
        if($this->tipo < 2){
            $this->tipo++;
        }

        $this->render();
    }

    public function create()
    {
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
        $this->tratamiento = 'vacuna';
        $this->fecha = null;
        $this->proximo_control = null;
        $this->peso = null;
        $this->descripcion = '';
    }

    public function store()
    {
        try {
            $this->validate([
                'tratamiento' => 'required',
                'fecha' => 'required',
                'peso' => 'required',
                'descripcion' => 'required',
            ]);

            $userId = Auth::id();

            Cartilla::updateOrCreate(['id' => $this->idRegistro], [
                'tratamiento' => $this->tratamiento,
                'fecha' => $this->fecha,
                'proximo_control' => $this->proximo_control,
                'peso' => $this->peso,
                'descripcion' => $this->descripcion,
                'mascota_id' => $this->id,
                'user_id' => $userId
            ]);

            session()->flash('success', $this->idRegistro ? 'Tratamiento actualizado.' : 'Tratamiento creado.');

            $this->closeModal();
            $this->resetInputFields();
        } catch (\Throwable $th) {
            session()->flash('error', ($this->idRegistro ? 'No se pudo actualizar el Tratamiento' : 'No se pudo crear el Tratamiento') . '. ' . $th->getMessage());
        }
    }
}
