@extends('base')

@section('title')
    Edit Task
@endsection

@section('main')

    <form method="post" action="{{ route('tasks.update', ['id' => $task->id]) }}">
        @csrf
        @method('PUT')
        <div class="h-[70%] flex flex-col items-center justify-center">
            <label class="pt-8" for="title">
                Title
            </label>
            <input class=" border-b-2 border-black" type="text" name="title" id="title" value="{{ $task->title }}" />
            @error('title')
            <div>{{ $message }}</div>
            @enderror

            <label class="pt-8" for="description">
                Description
            </label>
            <textarea class=" border-b-2 border-black" name="description" id="description" rows="5">{{ $task->description }}</textarea>
            @error('description')
            <div>{{ $message }}</div>
            @enderror

            <label class="pt-8" for="long_description">
                Long Description
            </label>
            <textarea class="border-b-2 border-black" name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
            @error('long_description')
            <div>{{ $message }}</div>
            @enderror

            <div class="py-8">
                <button class="border-4 rounded-lg bg-black text-white" type="submit">Edit Task</button>
            </div>
        </div>
    </form>
@endsection
