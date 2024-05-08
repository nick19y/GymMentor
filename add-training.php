<?php
    require_once "src/connection.php";
    require_once "src/Model/Training.php";
    require_once "src/Repository/TrainingRepository.php";
    require_once "src/Model/Exercises.php";
    require_once "src/Repository/ExerciseRepository.php";

    $trainingRepository = new TrainingRepository($pdo);
    $exerciseRepository = new ExerciseRepository($pdo);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $training = new Training(null, $_POST['training-name'], $_POST['training-level']);
        $trainingRepository->createTraining($training);
        $exercise = new Exercise(null, $_POST['exercise-name'], $_POST['repetitions'], $_POST['weight']);
        $exerciseRepository->createExercise($exercise);
        header("Location: main.php");
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
        <form class="add-training-form" method="post">
            <h2 class="form-title">Adicionar treino</h2>
            <label class="label-form" for="training-name">Nome:</label>
            <input required class="input-add-training" type="text" name="training-name">
            <label class="label-form" for="training-level">Nível:</label>
            <input required class="input-add-training" type="text" name="training-level">
            <h2 class="form-title form-add-exercise">Adicionar Exercícios</h2>
            <label for="exercise-name">Nome:</label>
            <input class="input-add-training input-add-exercise" type="text" name="exercise-name" id="exercise-input">
            <div class="input-exercise">
                <div class="input-exercise-details">
                    <label class="label-form" for="repetitions">Repetições:</label>
                    <input required class="input-add-training input-add-exercise" type="number" name="repetitions">
                </div>
                <div class="input-exercise-details">
                    <label class="label-form" for="weight">Peso (Kg):</label>
                    <input required class="input-add-training input-add-exercise" type="number" name="weight">
                </div>
                <img src="/img/add.png" alt="Adicionar exercício" class="add-exercise-btn">
                <!-- <input class="input-add-training input-add-exercise" type="text" name="add-exercises" id="exercise-input"> -->
            </div>
            <div id="exercises-container">
                <ul class="exercises-list">
                </ul>
            </div>
            <button type="submit" name="register-training" value="submit" class="submit-training-btn">Adicionar treino</button>
        </form>
        <ul id="suggestionsList"></ul>
    </main>
</body>
</html>