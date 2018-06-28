<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class todoController extends Controller
{
    public function index()
    {
        # code...
        return Todo::all();
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:3',
            'details' => 'required|string|min:6'
        ]);
        // dd($request->all());
        $data = $request->all();
        $todo = new Todo();
        $todo->title = $data['title'];
        $todo->details = $data['details'];

        $todo->save();
        return Todo::all();
    }

    public function show($_id)
    {
        // dd($_id);
        return Todo::find($_id);
    }

    public function update(Request $request, $_id)
    {
        // dd($request->all());
        $data = $request->all();
        $todo = Todo::find($_id);
        $todo->title = $data['title'];
        $todo->details = $data['details'];

        $todo->save();
        return Todo::find($_id);
    }

    public function destroy($_id)
    {
        Todo::destroy($_id);
        return Todo::all();
    }

    //
}
