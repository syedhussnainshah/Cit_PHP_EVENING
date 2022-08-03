<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" id="form">
        <input type="text" id="input">
        <input type="submit">
    </form>
    <h1 id="result"></h1>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#form").on("submit", function(e) {
                e.preventDefault();
                var input = $("#input").val();
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        input: input
                    },
                    success: function(response) {
                        $("#result").html(response);
                    }

                });


            });

        })
    </script>
</body>

</html>