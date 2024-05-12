<?php
    require_once "src/connection.php";
    require_once "src/Model/Exercises.php";
    require_once "src/Repository/ExerciseRepository.php";
    require_once "src/Repository/UserRepository.php";
    $userRepository = new UserRepository($pdo);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userRepository->createUser($name, $email, $password);

    header("Location: index.php");
