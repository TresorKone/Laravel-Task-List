@extends('base')

@section('title')

@endsection

@section('main')
    <div class="py-8 h-[70%] flex flex-col items-center justify-center">
        <p class="uppercase text-2xl">Welcome to my Task List App for practicing the php MVC framework Laravel</p>
        <div class="py-12 underline">
            <a href="{{ route('tasks.index') }}">task List</a>
        </div>
    </div>
@endsection
