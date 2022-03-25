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
//        $validated = validator(request()->all(),
//            [
//                'content' => 'required'
//            ]
//        );
//
//        if ($validated->passes())
//        {
//            TodoList::create();
//
//            return Redirect::to(URL::previous())->with('message', 'You have added a task!');
//        }
//
//        return Redirect::to(URL::previous())->withErrors($validated->errors());

            $data = $request->validate([
               'content' => 'required'
            ]);

                if ($data)
                {

                    TodoList::create($data);
                    return back()->with('message', 'You have added a task!');
                }

        return back()->withErrors($data->errors());

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todolists
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $todolists)
    {
        $todolists ->delete();
        return back();
    }
}
