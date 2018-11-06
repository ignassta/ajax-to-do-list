<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Laravel Ajax ToDo List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="_token" content="{!! csrf_token() !!}" />
</head>
<body>
<div class="container-narrow">
    <h2>Laravel Ajax ToDo List</h2>
    <button id="btn-add" name="btn-add" class="btn btn-primary">Add New Task</button>
    <div>
        {{--data table--}}
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Description</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="tasks-list" name="tasks-list">
            @foreach ($tasks as $task)
                <tr id="task{{$task->id}}">
                    <td>{{$task->id}}</td>
                    <td>{{$task->task}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->created_at}}</td>
                    <td>
                        <button class="btn btn-warning btn-detail open-modal" value="{{$task->id}}">Edit</button>
                        <button class="btn btn-danger btn-delete delete-task" value="{{$task->id}}">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!--Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Task Editor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">
                            <div class="form-group error">
                                <label for="inputTask" class="col-sm-3 control-label">Task</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="task" name="task" placeholder="Task" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="0">Save changes</button>
                        <input type="hidden" id="task_id" name="task_id" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="{{asset('js/ajax.js')}}"></script>
</body>
</html>
