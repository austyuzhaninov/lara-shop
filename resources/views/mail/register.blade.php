<DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <h2>
        Привет {{$data['name']}}, мы рады, что ты с нами! Ниже приведены данные вашего аккаунта:
    </h2>
    <br>
    <h3>Email: </h3>
    <p>{{$data['email']}}</p>
    <h3>Username: </h3>
    <p>{{$data['name']}}</p>
    </body>
    </html>
</DOCTYPE>
