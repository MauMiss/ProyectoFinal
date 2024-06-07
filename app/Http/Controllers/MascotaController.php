<?php

namespace App\Http\Controllers;

use App\Models\Cartilla;
use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController
{
    public function add(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required',
                'especie' => 'required',
                'sexo' => 'required',
                'fecha_nacimiento' => 'required',
                'tipo' => 'required',
            ]);

            //$path = $request->foto->store('imagenes', 'custom');

            $mascota = Mascota::updateOrCreate(['id' => $request->id], [
                'nombre' => $request->nombre,
                'especie' => $request->especie,
                'raza' => $request->raza,
                'sexo' => $request->sexo,
                'color' => $request->color,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'senas_particulares' => $request->senas_particulares,
                'tipo' => $request->tipo,
                'foto' => 'perritos.jpg',
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'message' => 'Mascota registrado correctamente',
                'mascota' => $mascota
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'No se pudo registrar la mascota. ' . $th->getMessage(),
            ], 405);
        }
    }

    public function list(Request $request)
    {
        try {
            $filter = '';
            if(!$request->filter){
                $filter = $request->filter;
            }
            $data = Mascota::where('nombre', 'like', $filter . '%')->get();

            return response()->json([
                'message' => 'Mascota registrado correctamente',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'No se pudo listar las mascotas. ' . $th->getMessage(),
            ], 405);
        }
    }

    public function search(Request $request, $id)
    {
        try {
            $mascota = Mascota::findOrFail($id);

            $vacunas = Cartilla::where('mascota_id', $id)->where('tratamiento', 'vacuna')->get();
            $desparasitaciones = Cartilla::where('mascota_id', $id)->where('tratamiento', 'desparasitacion')->get();
            $otros = Cartilla::where('mascota_id', $id)->where('tratamiento', 'otro_tratamiento')->get();

            $mascota['tratamientos'] = [
                'vacunas' => $vacunas,
                'desparasitaciones' => $desparasitaciones,
                'otros' => $otros
            ];

            return response()->json([
                'message' => 'Mascota encontrada',
                'mascota' => $mascota,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'No se pudo encontrar la mascota. ' . $th->getMessage(),
            ], 405);
        }
    }

}
