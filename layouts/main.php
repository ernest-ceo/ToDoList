<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./layouts/img/logo.png">
    <title>Todokit</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./layouts/css/style.css" type="text/css" />
    <link rel="stylesheet" href="./layouts/css/list-style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.min.css"/ >
</head>
    <body>
        <div class="nav">
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fa fa-bars"></i>
            </label>
            <img class="logo" src="./layouts/img/logo1.png" alt="Todokit" />
            <ol>
                <?php
                include_once "menu.php";
                ?>
            </ol>
        </div>
        <?php
    include $content[0];
    ?>
    </body>

</html>
