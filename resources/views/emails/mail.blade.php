<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailing</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap');
        .container{
        }.body{
            border: 1px solid #000;
            width: 50%;
            margin: auto;
            height: 100%;
            text-align: center;
        }h1{
            color: #0ff;
        }.remerciment{
            margin-bottom: 20px;
            position: relative;
            right: 0px;
            width: 100%;
            margin-right: 50px !important;
        }.navbar-logo {
            color: #595959;
            justify-self: center;
            cursor: pointer;
            width: 100%;
            background-image: url("img/5799717.jpg");
            font-size: 2rem;
            font-weight: 800;
            font-family: 'Rhodium Libre', serif!important;
        }
        .navbar-logo span{
            color : #9999ff;
        }
    </style>
</head>
<body>
    <div class="container">
            <div class="body">
            <div class="title">
            <div class="navbar-logo">Covid.<span>Tn</span></div>
            </div>
            <h2>{{$details['nom']}} {{$details['prenom']}}</h2>
            <p>{{$details['message']}}</p>
            <div class="remerciment">Thank you</div>
            </div>
        </div>
    </div>
</body>
</html>
