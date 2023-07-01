@extends('base')

@section('title')
    Task Details
@endsection

@section('main')
    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div class="border-4 h-[70%] flex flex-col items-center justify-center">
        <h2 class="py-2">{{ $task->title }} (title)</h2>

        <p class="py-2">{{ $task->description }} (description)</p>
        <p class="py-2">{{ $task->long_description }} (long description)</p>
        <p class="py-2">{{ $task->created_at }} (created at)</p>
        <p class="py-2">{{ $task->updated_at }} (updated at)</p>
        <div class="py-2">
            @if($task->completed)
                Completed (status)
            @else
                Not Completed (status)
            @endif
        </div>
    </div>



   <div class=" min-h-[20%] flex flex-col items-center justify-center">
       <div>
           <a class="underline" href={{ route('tasks.edit', ['id' => $task->id]) }}>Edit</a>
       </div>

       <div class="py-2">
           <form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="post">
               @csrf
               @method('DELETE')
               <div ><button class="underline" type="submit">Delete</button></div>
           </form>
       </div>

       <div>
           <form action="{{ route('tasks.state-toggle', ['id' => $task->id]) }}" method="post">
               @csrf
               @method('PUT')

               <div>
                   <button class="underline" type="submit">
                       The Task is {{ $task->completed ? 'completed' : 'not completed' }}
                   </button>
               </div>
           </form>
       </div>
   </div>

@endsection

