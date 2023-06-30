@extends('base')

@section('title')
    Add Task
@endsection

@section('main')

    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input class="border-b-2 border-black" type="text" name="title" id="title" />
            @error('title')
            <div>{{ $message }}</div>
            @enderror

            <label for="description">
                Description
            </label>
            <textarea class="border-b-2 border-black" name="description" id="description" rows="5"></textarea>
            @error('description')
            <div>{{ $message }}</div>
            @enderror

            <label for="long_description">
                Long Description
            </label>
            <textarea class="border-b-2 border-black" name="long_description" id="long_description" rows="10"></textarea>
            @error('long_description')
            <div>{{ $message }}</div>
            @enderror

            <div>
                <button class="hover:bg-black hover:text-white" type="submit">Add Task</button>
            </div>

        </div>
    </form>
@endsection
