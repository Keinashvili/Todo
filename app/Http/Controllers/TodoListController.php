<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class TodoListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolists = TodoList::all();

        return view('index', compact('todolists'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new TodoList();
        $todo->task = $request['task'];
        $data = $request->validate
        ([
            'task' => 'required'

        ]);

        if ($data)
        {
            $todo->save();
            return back()->with('message', 'You have added a task!');
        }

        return back()->withErrors($todo->errors());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todolists
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TodoList::destroy($id);
        return back();
    }
}
