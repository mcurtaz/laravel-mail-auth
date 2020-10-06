<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Azione Utente</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: antiquewhite;
            color: indigo;
        }

        h1{
            padding-top: 15px; 
            text-align: center;
        }

        ul{
            list-style: none;
            padding: 20px 10%;
        }

        li{
            padding: 5px;
        }

        footer{
            width: 100%;
            padding: 15px;


            position: absolute;
            bottom: 0;
            left: 0;
            
            
            text-align: center;
            font-size: 12px;
            color: gray;
        }
    </style>
</head>
<body>
    <h1>New Action from User</h1>

    <ul>
        <li>
            UTENTE: {{ $user -> name }}
        </li>
        <li>
            ACTION: {{ $action }}
        </li>
        <li>
            POST TITLE: {{ $post -> title }}
        </li>
        <li>
            POST BODY: {{ $post -> body }}
        </li>
    </ul>

    <footer>
        Don't reply to this email.
    </footer>
</body>
</html>