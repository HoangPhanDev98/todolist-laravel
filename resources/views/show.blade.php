@extends('layouts.app')

@section('title', $task->title)

@section('content')

<div class="mb-4">
<a href="{{ route('tasks.index') }}" class="font-medium text-gray-700 underline decoration-pink-500">⬅️ Go back to the task list!</a>
</div>

<p class="mb-4 text-slate-700">{{ $task->description }}</p>

@isset($task->long_description)
    <p>{{ $task->long_description }}</p>
@endisset

<p>{{ $task->created_at }}</p>

<p>{{ $task->updated_at }}</p>

<p>
    @if ($task->completed)
    Completed
    @else
    Not Completed
    @endif
</p>

<a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>

<div>
    <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
        @csrf
        @method('PUT')
        <button type="submit">
            Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
    </form>
</div>

<div>
    <form method="POST" action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
@endsection
