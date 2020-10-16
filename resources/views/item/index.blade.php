<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Item</title>
</head>
<body>
    <h1 class="btn btn-primary" onclick="create()">Create</h1>
    <table id="item_list" class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Item name</th>
                <th>Price</th>
                <th>Stok</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.1/bootbox.min.js"></script>	
    <script type='text/javascript'>
    $(function(){
        get();
    });
    function get(){
        $.ajax({
            url: '<?= route('item.get') ?>',
            success: function(response){
                $('#item_list tbody').html(response);
            }
        })
    }

    function create() {
        $.ajax({
            url: '<?= route('item.create') ?>',
            success: function(response){
                bootbox.dialog({
                    title: 'Create a sales item',
                    message: response
                });
            }
        })
    }

    function store() {
        $('#frm-item .alert').remove()
        $.ajax({
            url: '<?= route('item.store') ?>',
            type: 'post',
            dataType: 'json',
            data: $('#frm-item').serialize(),
            success: function(response){
                if (response.success) {
                    alert(response.message);
                    bootbox.hideAll();
                    get();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var response = JSON.parse(xhr.responseText)
                $('#frm-item').prepend(validationMessage(response));
            }
        })
    }

    function edit(id) {
        $.ajax({
            url: '<?= route('item.edit') ?>/'+id,
            success: function(response){
                bootbox.dialog({
                    title: 'Edit a sales item',
                    message: response
                });
            }
        })
    }

    function update(id) {
        $('#frm-item .alert').remove()
        $.ajax({
            url: '<?= route('item.update') ?>/'+id,
            type: 'post',
            dataType: 'json',
            data: $('#frm-item').serialize(),
            success: function(response){
                if (response.success) {
                    alert(response.message);
                    bootbox.hideAll();
                    get();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, ajaxOptions, thrownError){
                var response = JSON.parse(xhr.responseText)
                $('#frm-item').prepend(validationMessage(response));
            }
        })
    }

    function destroy(id){
        $.ajax({
            url: '<?= route('item.delete') ?>/'+id,
            dataType: 'json',
            success: function(response){
                if (response.success){
                    alert(response.message);
                    get();
                } else {
                    alert(response.message);
                }
                get();
            }
        })
    }

    function validationMessage(errors) {
        var validationHTML = '<div class="alert alert-danger">';
            validationHTML += '<p><b>'+errors.message+'</b></p>';
            $.each(errors.errors, function(i, error){
                validationHTML += error[0]+'<br>'
            })
        validationHTML += '</div>';
        return validationHTML;
    }
    </script>
</body>
</html>