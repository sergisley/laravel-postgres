<!DOCTYPE html>
<html>
<head>
    <title>Avaliação</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            background-color: #34485d;
        }
        .main-content {
            position:absolute;
            top:50%;
            left:50%;
            padding:10px;
            -ms-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
        }
        a{
            color: #090909;
        }
        a:hover{
            color: #004d26;
            text-decoration: none;
        }
        th,td{
            text-align: center;
        }
    </style>

</head>
<body>


<div class="container main-content">
    <div class="jumbotron">
        @yield('content')
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js"></script>
</body>
</html>
