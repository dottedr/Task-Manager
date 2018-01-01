$(document).ready(function () {

    $('#create-task').submit(function (event) {
        event.preventDefault();
        var form = $(this);

        var formData = form.serialize();

        $.ajax({
            url: 'create.php',
            method: 'POST',
            data: formData,
            success: function (data) {
                $('#ajax_msg').css("display", "block").delay(3000).html(data);
                document.getElementById("create-task").reset();
            }
        });

    });

    $('#task-list').load('viewRemainding.php');
    $('#task-completed-list').load('viewCompleted.php');

});
function makeElementEditable(div) {
    div.style.border = "2px solid lavender";
    div.style.padding = "5px";
    div.style.background = "white";
    div.contentEditable = true;
}

function updateTaskName(target, taskId) {
    var data = target.textContent;
    target.style.border = "none";
    target.style.padding = "0px";
    target.style.background = "#ececec";
    target.contentEditable = false;

    $.ajax({
        url: 'updateTaskName.php',
        method: 'POST',
        data: {name: data, id: taskId},
        success: function (data) {
            $('#ajax_msg').css("display", "block").delay(3000).html(data);

        }
    });

}

function deleteTask(taskId) {
    if (confirm("Do you really want to delete the task")) {
        $.ajax({
            url: 'deleteTask.php',
            method: 'POST',
            data: {id: taskId},
            success: function (data) {
                $('#ajax_msg').css("display", "block").delay(3000).html(data);

            }
        });
        $('#task-list').load('viewRemainding.php');
    }
    return false;

}
function completeTask(taskId) {

    $.ajax({
        url: 'complete.php',
        method: 'POST',
        data: {id: taskId},
        success: function (data) {
            $('#ajax_msg').css("display", "block").delay(3000).html(data);

        }
    });
    $('#task-list').load('viewRemainding.php');
    $('#task-completed-list').load('viewCompleted.php');

    return false;

}