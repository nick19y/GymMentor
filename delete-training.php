<?php
    require_once "src/connection.php";
    require_once "src/Model/Training.php";
    require_once "src/Repository/TrainingRepository.php";

    $trainingRepository = new TrainingRepository($pdo);
    $trainingRepository->deleteTraining($_GET['id']);