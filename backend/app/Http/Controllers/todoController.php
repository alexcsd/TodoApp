<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class todoController extends Controller
{
    public function index()
    {
        return  response()->json(Todo::all());
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:3',
            'details' => 'required|string|min:6'
        ]);
        $data = $request->all();
        $todo = new Todo();
        $todo->title = $data['title'];
        $todo->details = $data['details'];

        $todo->save();
        return  response()->json(Todo::all());
    }

    public function show($_id)
    {
        return response()->json(Todo::find($_id));
    }

    public function update(Request $request, $_id)
    {
        $data = $request->all();
        $todo = Todo::find($_id);
        $todo->title = $data['title'];
        $todo->details = $data['details'];

        $todo->save();
        return response()->json(Todo::find($_id));
    }

    public function destroy($_id)
    {
        Todo::destroy($_id);
        return response()->json(Todo::all());
    }

    //
}
