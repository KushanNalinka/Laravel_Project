@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">My Todo List</h1>
        </div>
      <div class="col-lg-12 mt-5">
        <form action="{{ route ('todo.store') }}" method="POST">
            @csrf
            <div class ="row">
                <div class="col-lg-8">
                    <div class ="form-group">
                        <input class="form-control" type="text"  name = "title" placeholder="Enter a Task" >
                    </div>

                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary">Submit</button>

                     </div>
            </div>


        </form>

      </div>
      <div class="col-lg-12 mt-5">
        <div>
        <table class="table table-success  table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $key => $task)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $task->title }}</td>
                    <td>@if ($task->done == 0)
                        <span class="badge bg-warning">Not Completed</span>

                    @else
                    <span class="badge bg-success">Not Completed</span>
                    @endif</td>
                    <td>
                        <a href="{{ route('todo.delete',$task->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="{{ route('todo.done',$task->id) }}" class="btn btn-success"><i class="fa-solid fa-check-circle"></i></a>
                    </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>
      </div>

    </div>
</div>

@endsection
@push('css')
<style>
  .page-title{
    padding-top: 10vh;
    font-size: 5rem;
    color: #29d457;
  }
</style>

@endpush
