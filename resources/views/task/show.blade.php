@extends('base')

@section('title')
    Task Details
@endsection

@section('main')
    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
    @endif

    <h2>{{ $task->title }}<h2>

    <p>{{ $task->description }}</p>
    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <div>
        <form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="post">
            @csrf
            @method('DELETE')

            <div><button type="submit">Delete</button></div>

        </form>
    </div>
@endsection

