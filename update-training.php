<?php
    require_once "src/connection.php";
    require_once "src/Model/Training.php";
    require_once "src/Repository/TrainingRepository.php";
    require_once "src/Model/Exercises.php";
    require_once "src/Repository/ExerciseRepository.php";

    
    $trainingRepository = new TrainingRepository($pdo);
    $exerciseRepository = new ExerciseRepository($pdo);
    $dataExercises = $exerciseRepository->readExercises();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $training = new Training($_POST['id'], $_POST['name'], $_POST['level']);
        $trainingRepository->updateTraining($training);
        header("Location: main.php");
    } else{
        $training = $trainingRepository->readTraining($_GET['id']);
    }

    $exercisesTraining = $exerciseRepository->listExercise($training->getId());


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/add-training.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="/js/add-training.js" defer></script>
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
        <form class="add-training-form" method="post" id="update-form" name="update-form">
            <h2 class="form-title">Atualizar treino</h2>        
            <label class="label-form" for="name">Nome:</label>
            <input type="hidden" name="id" value="<?= $training->getId() ?>">
            <input required class="input-add-training" type="text" value="<?= $training->getName() ?>" name="name">
            <label class="label-form" for="level">Nível:</label>
            <input required class="input-add-training" type="text" value="<?= $training->getLevel() ?>" name="level">
            <button type="submit" name="register-training" value="submit" class="submit-training-btn">Atualizar treino</button>
            <h2 class="form-title form-add-exercise">Atualizar Exercícios</h2>
            <div class="add-exercises-form">
            </form>
            <div class="exercises-list-training">
                <?php foreach($exercisesTraining as $item):?>
                    <form action="delete-exercise-update.php" method="GET" id="delete-form-<?= $item->getId() ?>" name="delete-form">
                        <li class="exercise-item">
                            <h4><?= $item->getName() ?></h4>
                            <button type="submit" class="btn-exercise-form" form="delete-form-<?= $item->getId() ?>">
                                <input type="hidden" name="exercise-id" value="<?= $item->getId() ?>">
                                <input type="hidden" name="id" value="<?= $training->getId() ?>">
                                <img src="/img/less.png" alt="">
                            </button>
                        </li>
                    </form>
                <?php endforeach;?>
            </div>
                <?php foreach ($dataExercises as $exercise):?>
                <li class="exercise-item">
                    <h4><?= $exercise->getName() ?></h4>
                    <h4><?= $exercise->getId() ?></h4>
                    <form action="add-exercise-update.php" method="get">
                    <button type="submit" class="add-exercise-btn btn-exercise-form">
                        <input type="hidden" name="exercise-id" value="<?= $exercise->getId()?>">
                        <img src="/img/add.png" alt="">
                        <input type="hidden" name="id" value="<?= $training->getId() ?>">
                    </button>
                    </form>
                </li>
                <?php endforeach;?>
    </main>
</body>
</html>