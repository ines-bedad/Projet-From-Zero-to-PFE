<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //afficher toutes les taches
    public function index(){
        $tasks=Task::all();
        return view ('welcome',compact('tasks'));
    }
    //ajouter un tache
    public function store(Request $request){
        $request->validate([
            'title'=>'required'
        ]);
        task::create([
            'title'=>$request->title,
            'completed'=>false
        ]);
        return redirect()->route('tasks.index');
    }
    //supprimer une tache
    public function destroy(Task $task){
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
