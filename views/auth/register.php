<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<h1>Inscription</h1>

<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?= $errorMessage; ?></p>
<?php endif; ?>

<form method="post" action="/register">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="first_name">Prénom:</label>
    <input type="text" id="first_name" name="first_name" required><br>

    <label for="last_name">Nom:</label>
    <input type="text" id="last_name" name="last_name" required><br>

    <label for="address">Adresse:</label>
    <input type="text" id="address" name="address" required><br>

    <button type="submit">S'inscrire</button>
</form>

</body>
</html>
