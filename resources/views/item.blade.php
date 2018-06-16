<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Form</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<form id="process_form">
    Product name: <input type="text" name="product_name" id="product_name">
    Quantity in stock: <input type="text" name="quantity" id="quantoty">
    Price per item <input type="text" name="price" id="price">

    <button type="submit" name="submit" id="form_submit">Submit</button>
</form>


<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#process_form').submit(function(){

        var data = {
            name: $('#product_name').val(),
            quantity: $('#quantity').val(),
            price: $('#price').val()
        };

        $.ajax({
            url: '/new-item',
            type: 'POST',
            data: data
        }).done(function(data) {
            console.log(data)
        })

        return false;
    })
});
</script>
</body>
</html>
