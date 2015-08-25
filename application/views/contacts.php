<?$contacts = Viewer::getModel();?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap-table.js"></script>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/bootstrap-table.css" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico">
    <title>polling test</title>
    <script>
        function getContent(timestamp){
            $('#table').bootstrapTable('refresh',{
                url: '/contacts/?act=ajax&timestamp=' + timestamp

            }).on('load-success.bs.table', function (e, addressbook) {
                getContent(addressbook.timestamp);
            });
        }
        $(function() {
            getContent();
        });
    </script>
</head>
<body>

<div class="container">
    <div id="toolbar">
        <button id="delete" class="btn btn-default">delete</button>
        <button id="create" class="btn btn-default" data-target="#myModal" data-toggle="modal">create</button>
        <button id="update" class="btn btn-default">update</button>
    </div>
    <table id="table"
           data-toggle="table"
           data-toolbar="#toolbar">
        <thead>
        <tr>
            <th data-field="state" data-checkbox="true"></th>
            <th data-field="0">ID</th>
            <th data-field="1">Name</th>
            <th data-field="2">Phone</th>
        </tr>
        </thead>
    </table>
</div>

<script>
    var $table = $('#table');
    $(function () {
        function getSelected(){
            return $.map($table.bootstrapTable('getSelections'), function (row) { return row[0]; });
        }

        $('#delete').click(function () {
            var ids = getSelected();
            $table.bootstrapTable('remove', { field: '0', values: ids });
            /*
             $.ajax({
             url: '/contacts/',
             type: 'DELETE',
             success: function(){
             alert('elements were deleted successfully');
             }
             });
             */
        });

        $('#create').click(function () {
            //modal window for creating contact;
        });

        $('#update').click(function () {
            //var ids = getSelected();
            //alert(2);
        });
    });
</script>
</body>
</html>