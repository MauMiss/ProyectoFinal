<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class MisClientes extends Component
{

    use WithPagination;

    public $filter;
    public $id, $name, $email, $password, $direccion, $telefono, $rol;
    public $isOpen = 0;


    public function render($filter = '')
    {

        $usuarios = $this->search();

        return view('livewire.veterinario.mis-clientes', [
            'usuarios' => $usuarios,
        ]);
    }

    public function search() {
        if(!$this->filter){
            $this->filter = '';
        }
        return User::where('rol', 'USUARIO')->where('name', 'like', $this->filter . '%')->paginate(8);
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            $this->render();

            session()->flash('success', 'Usuario eliminado.');
        } else {
            session()->flash('error', 'El Usuario no pudo ser encontrado.');
        }
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
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->direccion = '';
        $this->telefono = '';
        $this->rol = 'USUARIO';
    }

    public function store()
    {
        try {
            $this->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',
                'rol' => 'required',
            ]);

            User::updateOrCreate(['id' => $this->id], [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'direccion' => $this->direccion,
                'telefono' => $this->telefono,
                'rol' => $this->rol
            ]);

            session()->flash('success', $this->id ? 'Usuario actualizado.' : 'Usuario creado.');

            $this->closeModal();
            $this->resetInputFields();
        } catch (\Throwable $th) {
            session()->flash('error', ($this->id ? 'No se pudo actualizar el Usuario' : 'No se pudo crear el Usuario') . '. ' . $th->getMessage());
        }
    }

    public function edit($id)
    {
        $o = User::findOrFail($id);
        $this->id = $id;

        $this->name = $o->name;
        $this->email = $o->email;
        $this->password = '';
        $this->direccion = $o->direccion;
        $this->telefono = $o->telefono;
        $this->rol = $o->rol;

        $this->openModal();
    }

}
