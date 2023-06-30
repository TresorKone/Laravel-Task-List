@extends('base')

@section('title')
    Tast List
@endsection

@section('main')
    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
    @endif
    <div>
        @if(count($tasks))
            @foreach($tasks as $task)
                <div>
                    <a href="{{ route('tasks.show', ['id' => $task->id]) }}"> details </a>
                    {{ $task->title }}
                </div>
            @endforeach
        @else
            <div> somethings went wrong when fetching the data array</div>
        @endif
    </div>
@endsection
