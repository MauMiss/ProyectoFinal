<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Mascota;

class VerMascotas extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $filter;
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $mascotas = $this->search();
        return view('livewire.veterinario.ver-mascotas', [
            'mascotas' => $mascotas,
        ]);
    }

    public function search() {
        if(!$this->filter){
            $this->filter = '';
        }
        return Mascota::where('user_id', $this->id)->where('nombre', 'like', $this->filter . '%')->paginate(3);
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



}
