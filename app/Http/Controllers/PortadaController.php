<?php

namespace App\Http\Controllers;

use App\Models\Portada;
use Illuminate\Http\Request;
use App\Http\Requests\PortadaRequest;
use Illuminate\Support\Facades\Log;

class PortadaController extends Controller
{
    public function index()
    {
        $portadas = Portada::all();
        return view('portadas.index', compact('portadas'));
    }


    public function create()
    {
        return view('portadas.create');
    }

    public function store(PortadaRequest $request)
    {
        $portada = Portada::create($request->all());
        Log::info($portada);
        return redirect()->route('portadas.index')->with('successMsg', 'El registro se guardó exitosamente');
    }

    public function show(Portada $portada)
    {
        //
    }

    public function edit(Portada $portada)
    {
        return view('portadas.edit', compact('portada'));
    }

    public function update(PortadaRequest $request, Portada $portada)
    {
        $portada->update($request->all());
        return redirect()->route('portadas.index')->with('successMsg', 'El registro se actualizó exitosamente');
    }

    public function destroy(Portada $portada)
    {
        $portada->delete();
        return redirect()->route('portadas.index')->with('eliminar', 'ok');
    }

    public function cambioestadoportada(Request $request)
    {
        $portada = Portada::find($request->portada_id);
        $portada->estado = $request->estado;
        $portada->save();
    }


    public function showPortada()
    {
        $portadas = Portada::where('estado', 1)->get();
        return view('welcome', compact('portadas'));
    }
}
