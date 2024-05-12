<?php
    require_once "src/connection.php";
    require_once "src/Model/Exercises.php";
    require_once "src/Repository/ExerciseRepository.php";

    $exerciseRepository = new ExerciseRepository($pdo);

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $exercise = new Exercise(null, $_POST['exercise-name'], $_POST['repetitions'], $_POST['weight'], $_POST['description'],);
        $exerciseRepository->createExercise($exercise);
        header("Location:main.php");
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
    <link rel="stylesheet" href="/css/add-exercise.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="js/navigation.js" defer></script>
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
        <form class="add-exercise-form" method="post">
            <h3 class="form-title">Adicionar exercício</h3>        
            <label class="label-form" for="exercise-name">Nome:</label>
            <input required class="input-add-exercise" type="text" name="exercise-name">
            <label class="label-form" for="repetitions">Repetições:</label>
            <input required class="input-add-exercise" type="number" name="repetitions">
            <label class="label-form" for="weight">Peso (Kg):</label>
            <input required class="input-add-exercise" type="number" name="weight">
            <label class="label-form" for="description">Descrição:</label>
            <textarea id="description" name="description" rows="4" cols="30"></textarea>
            <div id="exercises-container">
                <ul class="exercises-list">
                </ul>
            </div>
            <button type="submit" class="submit-exercise-btn">Adicionar exercício</button>
        </form>
    </main>
</body>
</html>