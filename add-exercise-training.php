<?php
    require_once "src/connection.php";
    require_once "src/Model/Training.php";
    require_once "src/Repository/TrainingRepository.php";
    require_once "src/Model/Exercises.php";
    require_once "src/Repository/ExerciseRepository.php";

    $trainingRepository = new TrainingRepository($pdo);
    $exerciseRepository = new ExerciseRepository($pdo);

    $dataExercises = $exerciseRepository->readExercises();

    
    $lastIdTraining = $trainingRepository->getLastIdTraining();
    $newId = $lastIdTraining + 1;
    
    $exercisesTraining = $exerciseRepository->listExercise($lastIdTraining);
    $trainingRepository = new TrainingRepository($pdo);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $training = new Training($_POST['id'], $_POST['name'], $_POST['level']);
        $trainingRepository->updateTraining($training);
    } else{
        $training = $trainingRepository->readTraining($lastIdTraining);
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/add-training.css">
    <link rel="stylesheet" href="/css/add-exercise-training.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <title>GymMentor</title>
</head>
<body>
    <header class="main-header">
        <div class="logo">
            <img src="/img/logo3.png" alt="Logo do site">
            <h3>GymMentor</h3>
        </div>
        <div class="right-side-header">
            <div class="addTrainingPlan">
                <a href="add-training.php">
                    <img src="/img/add-halter.png" alt="Adicionar exercício">
                </a>
            </div>
            <h4 class="logout">Sair</h4>
        </div>
    </header>
    <main>
        <div class="form">
            <div class="add-exercises-form">
                <h1  class="form-title">Adicionar Exercícios</h1>
                <div class="exercises-list-training">
                    <?php foreach($exercisesTraining as $item):?>
                        <form action="delete-exercise.php" method="post">
                            <li class="exercise-item">
                                <h4><?= $item->getName() ?></h4>
                                <button type="submit" class="btn-exercise-form">
                                <input type="hidden" name="exercise-id" value="<?= $item->getId()?>">
                                <input type="hidden" name="id-training" value="<?= $training->getId()?>">
                                    <img src="/img/less.png" alt="">
                                </button>
                            </li>
                        </form>
                            <?php endforeach;?>
                </div>
                <ul class="exercises">
            <?php foreach ($dataExercises as $exercise):?>
                <li class="exercise-item">
                    <h4><?= $exercise->getName() ?></h4>
                    <h4><?= $exercise->getId() ?></h4>
                    <form action="exercise.php" method="post">
                    <button type="submit" class="add-exercise-btn btn-exercise-form">
                        <input type="hidden" name="exercise-id" value="<?= $exercise->getId()?>">
                        <input type="hidden" name="new-id" value="<?= $lastIdTraining?>">
                        <img src="/img/add.png" alt="">
                    </button>
                    </form>
                </li>
                <?php endforeach;?>
                <form action="main.php">
                    </ul>
                    <button type="submit" class="create-training-btn">
                        Criar treino
                    </button>
                    </form>
            </div>
        </div>
    </main>
</body>
</html>