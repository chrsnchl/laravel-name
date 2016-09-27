<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Name Form -->
        <form action="{{ url('name') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Persons Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Name Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Name
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Tasks -->
    @if (count($names) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Names
            </div>

            <div class="panel-body">
                <table class="table table-striped name-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($names as $name)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $name->name }}</div>
                                </td>

				 <!-- Delete Button -->
				    <td>
					<form action="{{ url('name/'.$name->id) }}" method="POST">
					    {{ csrf_field() }}
					    {{ method_field('DELETE') }}

					    <button type="submit" class="btn btn-danger">
						<i class="fa fa-trash"></i> Delete
					    </button>
					</form>
				    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@stop
