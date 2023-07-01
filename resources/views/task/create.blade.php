@extends('base')

@section('title')
    Add Task
@endsection

@section('main')

    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <div class="h-[70%] flex flex-col items-center justify-center">
            <label class="pt-8" for="title">
                Title
            </label>
            <input class="border-b-2 border-black" type="text" name="title" id="title" />
            @error('title')
            <div class="text-red-800">{{ $message }}</div>
            @enderror

            <label class="pt-8" for="description">
                Description
            </label>
            <textarea class="border-b-2 border-black" name="description" id="description" rows="5"></textarea>
            @error('description')
            <div class="text-red-800">{{ $message }}</div>
            @enderror

            <label class="pt-8" for="long_description">
                Long Description
            </label>
            <textarea class="border-b-2 border-black" name="long_description" id="long_description" rows="10"></textarea>
            @error('long_description')
            <div class="text-red-800">{{ $message }}</div>
            @enderror

            <div class="pt-8">
                <button class="border-4 rounded-lg bg-black text-white" type="submit">Add Task</button>
            </div>

        </div>
    </form>
@endsection
