<?php
    require_once "src/connection.php";
    require_once "src/Model/Exercises.php";
    require_once "src/Repository/ExerciseRepository.php";
    $exerciseRepository = new ExerciseRepository($pdo);
    $exerciseId = $_POST['exercise-id'];
    $trainingId = $_POST['id-training'];
    $exerciseRepository->deleteExercise($trainingId, $exerciseId);

    header("Location: add-exercise-training.php");
