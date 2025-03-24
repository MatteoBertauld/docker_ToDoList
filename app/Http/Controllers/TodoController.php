<?php

namespace App\Http\Controllers;


use App\Models\Liste;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        $todos = Liste::all();
        return view('TodoList', compact('todos'));
    }

    public function store(Request $request) {

        $request->validate([
            'content' => 'required|string|max:255',
        ]);


        Liste::create([
            'content' => $request->content, 
            'etat' => $request->etat, 
        ]);


    

        return redirect()->route('todo.index');
    }
    

    public function destroy($id) {
        Liste::findOrFail($id)->delete();
        return redirect()->route('todo.index');
    }

    public function updateEtat($id) {

        $todo = Liste::find($id);
    

        if ($todo) {

            $todo->etat = ($todo->etat == 'true') ? 'false' : 'true';

            $todo->save();
        }
    

        return redirect()->route('todo.index');
    }
    
}