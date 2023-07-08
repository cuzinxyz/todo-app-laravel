@extends('layout')

@section('content')

<form class="task-input" action="{{ route('updateTask', $task) }}" method="POST">
    @csrf
    @method('PUT')
    <svg class="icon-task" xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="tasks"><path fill="#444" d="M6 0h10v4H6V0zM6 6h10v4H6V6zM6 12h10v4H6v-4zM3 1v2H1V1h2zm1-1H0v4h4V0zM3 13v2H1v-2h2zm1-1H0v4h4v-4zM5.3 5.9l-.6-.8-.9.9H0v4h4V7.2l1.3-1.3zM2.7 7l-.7.7-.8-.7h1.5zM1 8.2l.9.8H1v-.8zM3 9h-.9l.9-.9V9z"></path></svg>
    <input type="text" name="name" title="Press Enter to Save" autofocus placeholder="Edit your task" value="{{ ($task) ? $task->name : '' }}">

    <div class="select-status">
        <input type="radio" name="is_completed" value="1" id="option-1" checked>
        <input type="radio" name="is_completed" value="0" id="option-2">
          <label for="option-1" class="option option-1">
            <div class="dot"></div>
             <span>Done</span>
             </label>
          <label for="option-2" class="option option-2">
            <div class="dot"></div>
             <span>In progress</span>
          </label>
    </div>

    <input type="submit" value="" hidden>
</form>

@endsection
