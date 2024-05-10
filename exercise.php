<?php
    require_once "src/connection.php";
    require_once "src/Model/Exercises.php";
    require_once "src/Repository/ExerciseRepository.php";
    $exerciseRepository = new ExerciseRepository($pdo);
    $exerciseId = $_POST['exercise-id'];
    $newId = $_POST['new-id'];
    
    $exerciseRepository->addExercise($newId, $exerciseId);


    if($exerciseRepository){
        ECHO "FUNCIONA";
    }
