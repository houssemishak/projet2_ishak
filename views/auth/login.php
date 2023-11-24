<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>

<h1>Connexion</h1>

<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?= $errorMessage; ?></p>
<?php endif; ?>

<form method="post" action="/login">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Se connecter</button>
</form>

</body>
</html>
