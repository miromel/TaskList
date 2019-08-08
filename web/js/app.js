//DELETE TASKS

$(document).ready(function deleteTask() {
    $('.delete-btn').on('click', function (e) {
        e.preventDefault();
        var r = confirm("Вы действительно хотите удалить задачу?");
        if (r == true) {
            location.href = $(this).attr('href');
        }
    })
});

//SORTING DATATABLES COLUMNS

var numCols = $('#mytable thead th').length;
if (numCols === 6) {
    var targets = [4, 5]
    var orderable = false
}
else {
    targets = '_all'
    orderable = true
}

$(document).ready(function () {
    $('#mytable').DataTable({
        "columnDefs": [
            {
                "targets": targets,
                "orderable": orderable,
            },
        ],
        "paging": false,
        "info": false,
        "searching": false
    });
});