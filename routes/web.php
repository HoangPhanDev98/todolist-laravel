<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

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

class Task {
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at,
    ) {}
}

$tasks = [
    new Task(
        1,
        'Task 1',
        'Description 1',
        'Long description 1',
        false,
        '2021-10-01 00:00:00',
        '2021-10-01 00:00:00'
    ),
    new Task(
        2,
        'Task 2',
        'Description 2',
        'Long description 2',
        true,
        '2021-10-02 00:00:00',
        '2021-10-02 00:00:00'
    ),
    new Task(
        3,
        'Task 3',
        'Description 3',
        'Long description 3',
        false,
        '2021-10-03 00:00:00',
        '2021-10-03 00:00:00'
    ),
    new Task(
        4,
        'Task 4',
        'Description 4',
        'Long description 4',
        true,
        '2021-10-04 00:00:00',
        '2021-10-04 00:00:00'
    ),
];

Route::get('/', function() {
    return redirect()->route('task.index');
});

Route::get('/task', function () use($tasks) {
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('task.index');

Route::get('/task/{id}', function ($id) use($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);

    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('show', [
        'task' => $task,
    ]);
})->name('task.show');