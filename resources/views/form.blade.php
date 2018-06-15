<!DOCTYPE html>
<html>
<head>
    <title>Form</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<form id="process_form">
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    Product name: <input type="text" name="product_name" id="product_name">
    Quantity in stock: <input type="text" name="quantity" id="quantoty">
    Price per item <input type="text" name="price" id="price">

    <button type="submit" name="submit" id="form_submit">Submit</button>
</form>


<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#form_submit').submit(function(){

        var data = [
            _token: $('#token').val(),
            name: $('#product_name').val(),
            quantity: $('#quantity').val(),
            price: $('#price').val()
        ];

        $.ajax({
            url: '{{ route('new-item') }}',
            type: 'POST',
            data: data,
            success: function(data) {
                
            }
        })

        return false;
    })
});
</script>
</body>
</html>
