<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tutorial AJAX CRUD</title>
    <script type="text/javascript" src="jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript">
    $(window).load(function(){
        loadData();

        $("#loadDataButton").click(function(){
            loadData();
        });

        $("#addButton").click(function(){
            addForm();
        });

        $("#data-view").on("click", "#simpanButton", function(){
            simpan();
        });

        $("#data-view").on("click", "#updateButton", function(){
            update($(this).attr("value"));
        });

        $("#data-view").on("click", "#editButton", function(){
            updateForm($(this).attr("value"));
        });

        $("#data-view").on("click", "#deleteButton", function(){
            hapus($(this).attr("value"));
        });
    });

    function loadData(){
        $.ajax({
            url: 'showproduct.php',
            method: "GET",
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

    function addForm(){
        $.ajax({
            url: 'formnew.php',
            method: "GET",
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

    function updateForm(id){
        $.ajax({
            url: 'formupdate.php?id='+id,
            method: "GET",
            data: {id: id}
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

    function hapus(id){
        $.ajax({
            url: 'delete.php',
            method: "GET",
            data: { id: id },
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

    function simpan() {
        $.ajax({
            url: "save.php",
            method: "POST",
            data: {
                name: $("#name").val(),
                price: $("#price").val(),
                brand: $("#brand").val()
            },
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

    function update(id) {
        $.ajax({
            url: 'update.php',
            method: "GET",
            data: {
				id: id,
                name: $("#name").val(),
                price: $("#price").val(),
                brand: $("#brand").val()
            },
        }).done(function(data){
            $("#data-view").html(data);
        });
    }

    </script>
</head>
<body>
    <div class="container">
        <div>
            <button id="loadDataButton" class="btn btn-default">Load Data</a>
            <button id="addButton" class="btn btn-primary">Add Data</a>
        </div>

        <div id="data-view"></div>
    </div>
</body>
</html>
