<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Validation de création de compte</h1>
    <h3><strong> Mr/M : {{$contact['name']}} </strong> Bienvenue sur notre site</h3>
    <p>Votre compte a été créer avec succès :<br>
        <ul>
            <li>Votre email : <strong> {{$contact['email']}} </strong><br></li>
            <li>Votre mot de passe : <strong>"password"</strong></li>
        </ul>
    </p>

</body>
</html>