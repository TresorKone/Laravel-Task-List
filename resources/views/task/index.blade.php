@extends('base')

@section('title')
    Task List
@endsection

@section('main')
    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
    @endif
    <div>
        @if(count($tasks))
            @foreach($tasks as $task)
                <div class="py-2 h-[70%] flex items-center justify-center">
                    <a class="px-4 underline" href="{{ route('tasks.show', ['id' => $task->id]) }}"> details </a>
                    <h3 class="bg-black text-white">{{ $task->title }}</h3>
                </div>
            @endforeach
        @else
            <div> somethings went wrong when fetching the data array, or there are just no task registered</div>
        @endif
    </div>

    <div>
        @if($tasks->count())
            {{ $tasks->links() }}
        @endif
    </div>
@endsection
