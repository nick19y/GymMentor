<?php
    require_once "src/connection.php";
    require_once "src/Model/Exercises.php";
    require_once "src/Repository/ExerciseRepository.php";
    $exerciseRepository = new ExerciseRepository($pdo);
    $exerciseId = $_GET['exercise-id'];
    $trainingId = $_GET['id'];
    $exerciseRepository->addExercise($trainingId, $exerciseId);

    header("Location: update-training.php?id=" . $trainingId);
