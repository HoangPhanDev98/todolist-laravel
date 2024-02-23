@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
@foreach($tasks as $task)
    <div>
        <a
            href="{{ route('task.show', ['id' => $task->id]) }}">
            {{ $task->title }}
        </a>
    </div>
@endforeach

@endsection
