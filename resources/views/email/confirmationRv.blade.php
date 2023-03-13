<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Confirmation de Rendez-vous</h1>
    <h3><strong> Mr/Mme {{$info['name']}} </strong> Bienvenue sur notre cabinet</h3>
    <p>Votre Rendez-vous est confirmé à :<br>
        <ul>
            <li>Date de Rendez-vous : <strong> {{$info['time']}} </strong><br></li>
            <li> Avec Docteur : <strong>"{{$info['doctor']}}"</strong></li>
        </ul>
    </p>

</body>
</html>