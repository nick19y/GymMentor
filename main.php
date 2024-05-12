<?php
    require_once "src/connection.php";
    require_once "src/Model/Training.php";
    require_once "src/Repository/TrainingRepository.php";
    $trainingRepository = new TrainingRepository($pdo);
    $dataTraining = $trainingRepository->trainingOptions();
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
    <script src="js/navigation.js" defer></script>
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
                    <img src="/img/list.png" alt="Adicionar exercício">
                </a>
                <a href="add-exercise.php">
                    <img src="/img/add-halter.png" alt="Adicionar exercício">
                </a>
            </div>
            <form action="logout.php">
                <button type="submit" class="logout-btn">
                    <h4 class="logout">Sair</h4>
                </button>
            </form>
        </div>
    </header>
    <main>
        <ul class="trainig-list">
            <?php foreach($dataTraining as $training):?>
            <li class="training-item">
                <img src="img/logo.jpg" alt="" class="trainig-img">
                <div class="training-name-container">
                    <h3 class="training-name"><?= $training->getName()?></h3>
                </div>
                <div class="trainig-details">
                    <p>Nível: <?= $training->getLevel()?></p>
                    <p>Quantidade de exercícios: <?= $trainingRepository->countAmountExercises($training->getId()) ?></p>
                </div>
                <a href="update-training.php?id=<?= $training->getId()?>">
                    <button class="select-training-btn">Atualizar treino</button>
                </a>
                <form action="delete-training.php">
                    <input type="hidden" name="id" value="<?= $training->getId()?>">
                    <button class="exclude-training-btn" type="submit" value="delete">Excluir treino</button>
                </form>
            </li>
            <?php endforeach;?>
        </ul>
    </main>
</body>
</html>