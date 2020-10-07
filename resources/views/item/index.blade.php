<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Item</title>
</head>
<body>
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

    function destroy(id){
        $.ajax({
            url: '<?= route('item.delete') ?>/'+id,
            datatype: 'json',
            success: function(response){
                if (response.message){
                    alert(response.message);
                    get();
                } else {
                    alert(response.message);
                }
                get();
            }
        })
    }
    </script>
</body>
</html>