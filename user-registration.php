<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/add-training.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/user-registration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="/js/add-training.js" defer></script>
    <script src="/js/navigation.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <title>GymMentor</title>
</head>
<body>
    <main>
        <div class="login-navigate-btn">
            <img src="/img/back.png" alt="Voltar para a página de login">
        </div>
        <div class="user-register">
            <img src="/img/logo.jpg" alt="Logo do site">
            <h1>GymMentor</h1>
            <form action="create-user.php" class="register-form" method="post">
                <label for="name" class="register-label">Nome:</label>
                <input name="name" type="text" class="user-register-input">
                <label for="email" class="register-label">Email:</label>
                <input name="email" type="email" class="user-register-input">
                <label for="password" class="register-label">Senha:</label>
                <input name="password" type="password" class="user-register-input">
                <button class="register-user-btn">Cadastrar usuário</button>
            </form>
        </div>
    </main>
</body>
</html>