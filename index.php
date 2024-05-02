<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<style>

    h1 {
        text-align: center;
        margin-top: 50

    }
    input[type="text"] {
        width: 70%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ff000f;
        font-style: italic;
        text-align: center;
    }
    input{
        display: block;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
        position: relative;
    }
    #result{
        width: 70%;
        margin: 0 auto;
        text-align: left;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
<body>
    <h1>Search</h1>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <input type="text" name="" id="search" placeholder="Search for something">
    <div id="result"></div>

    <script>
        $(document).ready(function() {

            $('#search').keyup(function() {
                var query = $(this).val();
                if (query !== '') {
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#result').html(data);
                        }
                    });
                } else {
                    $('#result').html('');
                }

            });
        });
    </script>
</body>

</html>

</html>