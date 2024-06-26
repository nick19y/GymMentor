<?php
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/add-training.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="/js/add-training.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <title>GymMentor</title>
</head>
<body>
    <main>
        <div class="login-div">
            <img src="/img/logo.jpg" alt="Logo do site">
            <h1>GymMentor</h1>
            <form action="login.php" class="login-form" method="post">
                <label class="login-label" for="email">Email:</label>
                <input class="login-input" type="email" name="email">
                <label class="login-label" for="password">Senha:</label>
                <input class="login-input" type="password" name="password">
                <button class="login-btn" type="submit">Entrar</button>
            </form>
            <p>Não tem uma conta? <a href="user-registration.php">Cadastre-se!</a></p>
        </div>
    </main>
</body>
</html>