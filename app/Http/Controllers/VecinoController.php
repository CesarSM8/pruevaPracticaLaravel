<?php

// app/Http/Controllers/VecinoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VecinoController extends Controller
{
    // Método para mostrar la lista de vecinos
    public function index(Request $request)
    {
        $vecino = $request->session()->get('vecino', []);
        return view('index', compact('vecino'));
    }

    // Método para mostrar el formulario de creación de un nuevo vecino
    public function create()
    {
        return view('create');
    }

    // Método para guardar un nuevo vecino
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $vecino = $request->session()->get('vecino', []);
        $vecino[] = ['nombre' => $request->nombre, 'realizado' => false];
        $request->session()->put('vecino', $vecino);

        return redirect()->route('vecino.index')->with('success', 'Vecino creado exitosamente.');
    }

    // Método para marcar un hábito como realizado
    public function complete(Request $request, $index)
    {
        $vecino = $request->session()->get('vecino', []);
        if (isset($vecino[$index])) {
            $vecino[$index]['realizado'] = true;
            $request->session()->put('vecino', $vecino);
        }

        return redirect()->route('vecino.index')->with('success', 'Vecino marcado como realizado.');
    }

    // Método para eliminar un hábito
    public function destroy(Request $request, $index)
    {
        $vecino = $request->session()->get('vecino', []);
        if (isset($vecino[$index])) {
            unset($vecino[$index]);
            $request->session()->put('vecino', array_values($vecino));
        }

        return redirect()->route('vecino.index')->with('success', 'vecino eliminado.');
    }
}
