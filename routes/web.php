<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// manual data
/*
class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {}
}

$tasks = [
    new Task(
        1,
        "somethings",
        "somethings description",
        "somethings long description",
        true,
        "2023-01-01 00:10:00",
        "2023-02-02 16:00:00"
    ),
    new Task(
        2,
        "somethings 2",
        "somethings description 2",
        "somethings long description 2",
        false,
        "2023-01-01 00:10:00",
        "2023-03-02 16:00:00"
    ),
    new Task(
        3,
        "somethings 3",
        "somethings description 3",
        "somethings long description 3",
        false,
        "2023-01-01 00:10:00",
        "2023-05-02 04:00:00"
    )
];
*/
// manual data

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks/index', function () {
    return view('task.index', [
        "tasks" => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/add', 'task.create')
    ->name('tasks.add');

Route::get('/tasks/{id}', function ($id) {
    //$task = collect($tasks)->firstWhere('id', $id);

    /*
    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }
    */

    return view('task.show', [
        'task' => Task::findOrFail($id)
    ]);
}
)->name('tasks.show');

Route::get('tasks/edit/{id}', function ($id) {
    return view('task.edit', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.edit');

Route::post('/tasks', function (Request $request, Task $task) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['title'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task added!');
})->name('tasks.store');

Route::put('/tasks/{id}', function (Request $request, $id) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);



    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['title'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task edited!');
})->name('tasks.update');

Route::delete('/task/{id}', function ($id) {
    $res=Task::where('id',$id)->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted');
})->name('tasks.destroy');



