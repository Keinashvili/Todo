@extends('layouts.app')

@section('content')
<div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
    <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
        <div class="mb-4">
            @if(\Illuminate\Support\Facades\Session::has('message'))
                <div class="bg-green-600 rounded-3xl py-1 px-3 ">
                    <p class="text-gray-400">{{ \Illuminate\Support\Facades\Session::get('message') }}</p>
                </div>
            @endif
                @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="bg-green-600 rounded-3xl py-1 px-3 ">
                        <p class="text-gray-400">{{ $error }}</p>
                    </div>
                    @endforeach
                @endif
            <h1 class="text-grey-darkest">Todo List</h1>
            <form action="{{ route('store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="flex mt-4">
                    <input name="content" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Add Todo">
                    <button type="submit" class="flex-no-shrink border-2 border-green-700 p-2 ml-2 rounded text-black hover:text-white hover:bg-green-700">Add</button>
                </div>
            </form>
        </div>
        @if(count($todolists))
        <div>
            @foreach($todolists as $item)
            <div class="flex mb-4 items-center">
                <p class="w-full text-grey-darkest" >{{ $item->content }}</p>
              <form class="flex mb-4 items-center" action="{{ route('destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('delete')
                <button type="submit" onclick="return confirm('Are you sure?')" class="mt-4 border-2 border-red-700 p-2 ml-2 rounded text-black hover:text-white hover:bg-red-700">Remove</button>
                </form>
            </div>
            @endforeach
        </div>
            <p class="text-center mt-3">
                You have {{ count($todolists) }} Pending tasks
            </p>
            @else
            <p class="text-center mt-3">No tasks!</p>
        @endif
    </div>
</div>
@endsection
