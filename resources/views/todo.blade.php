
@extends('layout')

@section('content')
    <div>
        <form class="task-input" action="{{ route('storeTask') }}" method="POST">
            @csrf
            <svg class="icon-task" xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="tasks"><path fill="#444" d="M6 0h10v4H6V0zM6 6h10v4H6V6zM6 12h10v4H6v-4zM3 1v2H1V1h2zm1-1H0v4h4V0zM3 13v2H1v-2h2zm1-1H0v4h4v-4zM5.3 5.9l-.6-.8-.9.9H0v4h4V7.2l1.3-1.3zM2.7 7l-.7.7-.8-.7h1.5zM1 8.2l.9.8H1v-.8zM3 9h-.9l.9-.9V9z"></path></svg>
            <input type="text" name="name" autofocus placeholder="Add a new task">
            <input type="submit" value="" hidden>
        </form>
    </div>

    <div class="controls">
        <div class="filters">
            <span class="active" id="all">All</span>
            <span id="pending">Pending</span>
            <span id="completed">Completed</span>
        </div>
        <button class="clear-btn">Clear All</button>
    </div>
    <ul class="task-box">
        @if($tasks->isEmpty())
            <span>You don't have any task here</span>
        @else
            @foreach($tasks as $task)
            <li class="task">
                <label for="{{$task->id}}">
                    <input type="checkbox" id="{{$task->id}}">
                    <p class="@if( $task->is_completed == 1 ) checked @else hi @endif">{{$task->name}}</p>
                </label>
                <div class="settings">
                    <i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>
                    <ul class="task-menu">
                        <li onclick='window.location.href="{{ route("editTask", $task) }}"'><i class="uil uil-pen"></i>Edit</li>
                        <li>
                            <i class="uil uil-trash"></i>
                            <form action="{{ route("destroyTask", $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="reset-button" type="submit" onclick="return confirm('Are you sure?');" title="Delete" class="btn btn-sm btn-danger"> Delete </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
            @endforeach
        @endif
    </ul>
@endsection