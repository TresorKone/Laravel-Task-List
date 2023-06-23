<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

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
// manual data

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks/index', function () use($tasks) {
    return view('task.index', [
        "tasks" => $tasks
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);

    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('task.show', [
        'task' => $task
    ]);
}
)->name('tasks.show');
