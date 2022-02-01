<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::all();
        return view('home', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|regex:/^[a-zA-Z]+$/u',
            'note1' => 'required|numeric|max:5.0|min:1.0',
            'note2' => 'required|numeric|max:5.0|min:1.0',
            'note3' => 'required|numeric|max:5.0|min:1.0'
        ], [
            'full_name.required' => 'El campo nombre es obligatorio',
            'full_name.regex' => 'El campo nombre no debe tener caracteres especiales ni numeros',
            'note1.required' => 'El campo nota 1 es obligatorio',
            'note2.required' => 'El campo nota 2 es obligatorio',
            'note3.required' => 'El campo nota 3 es obligatorio',
            'note1.numeric' => 'El campo nota 1 solo permite numeros',
            'note2.numeric' => 'El campo nota 2 solo permite numeros',
            'note3.numeric' => 'El campo nota 3 solo permite numeros',
            'note1.max' => 'El campo nota 1 debe ser mayor a 1.0',
            'note2.max' => 'El campo nota 2 debe ser mayor a 1.0',
            'note3.max' => 'El campo nota 3 debe ser mayor a 1.0',
            'note1.min' => 'El campo nota 1 debe ser menor a 5.0',
            'note2.min' => 'El campo nota 2 debe ser menor a 5.0',
            'note3.min' => 'El campo nota 3 debe ser menor a 5.0',
        ]);

        $average = ($request->note1 + $request->note2 + $request->note3) / 3;
        $note_final = new Students();
        $note_final->full_name = $request->full_name;
        $note_final->note1 = $request->note1;
        $note_final->note2 = $request->note2;
        $note_final->note3 = $request->note3;
        $note_final->average = $average;
        $note_final->save();
        Session::flash('message', 'Estudiante creado con exito');
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Students::find($id);
        $note->delete();
        Session::flash('message', 'Estudiante eliminado');
        return redirect()->route('home');
    }
}
