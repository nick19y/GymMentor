<?php
    require_once "src/connection.php";
    require_once "src/Model/Exercises.php";
    require_once "src/Repository/ExerciseRepository.php";
    require_once "src/Repository/UserRepository.php";
    $userRepository = new UserRepository($pdo);

    session_start();

    $email = $_POST['email'];
    $userData = $userRepository->readUser($email);
    $password = $_POST['password'];
    $userData = $userRepository->readUser($email);
    
    if ($userData) {
        if (password_verify($password, $userData['password'])) {
            $_SESSION['email'] = $email;
            header("Location: main.php");
        } else {
            // Senha incorreta
            echo "Usuário ou senha inválidos.";
        }
    } else {
        // Usuário não encontrado no banco de dados
        echo "Usuário ou senha inválidos.";
    }