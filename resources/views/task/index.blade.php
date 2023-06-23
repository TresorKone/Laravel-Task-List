<h1> Task list</h1>

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
