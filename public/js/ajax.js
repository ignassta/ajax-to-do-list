$(document).ready(function(){

    var url = "/tasks";

    //display modal form for task editing
    $('#tasks-list').on("click", ".open-modal", function(){
        var task_id = $(this).val();

        $.get(url + '/' + task_id, function (data) {
        //success data
            console.log(data);
            $('#task_id').val(data.id);
            $('#task').val(data.task);
            $('#description').val(data.description);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        })
    });

    // display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#frmTasks').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete task
    $('#tasks-list').on("click", ".delete-task", function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var task_id = $(this).val();

        $.ajax({
            type: "DELETE",
            url: url + '/' + task_id,
            success: function (data) {
                console.log(data);
                $("#task" + task_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new task / update existing task
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        e.preventDefault();

        var formData = {
            task: $('#task').val(),
            description: $('#description').val(),
        };

        var state = $('#btn-save').val(); //check what to use [add=POST], [update=PUT]

        var type = "POST"; //for creating new task
        var task_id = $('#task_id').val();
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating old task
            my_url += '/' + task_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
                task += '<td><button class="btn btn-warning open-modal" value="' + data.id + '">Edit</button>';
                task += '<button class="btn btn-danger delete-task" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if new record added
                    $('#tasks-list').append(task);
                }else{ //if old record updated
                    $("#task" + task_id).replaceWith( task );
                }

                $('#frmTasks').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
