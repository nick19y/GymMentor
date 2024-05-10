<?php

class ExerciseRepository
{
    private PDO $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function makeObject($data)
    {
        return new Exercise($data['id'], $data['name'], $data['repetitions'], $data['weight'], $data['description']);
    }
    public function createExercise(Exercise $exercise)
    {
        $sql = "INSERT INTO gym_exercises (name, repetitions, weight, description) VALUES(?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $exercise->getName());
        $statement->bindValue(2, $exercise->getRepetitions());
        $statement->bindValue(3, $exercise->getWeight());
        $statement->bindValue(4, $exercise->getDescription());
        $statement->execute();
    }
    public function readExercises(){
        $sql = "SELECT * FROM gym_exercises";
        $statement = $this->pdo->query($sql);
        $exercisesList = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dataExercises = array_map(function($exercise){
            return $this->makeObject($exercise);
        }, $exercisesList);
        return $dataExercises;
    }
    public function addExercise(int $idTraining, int $idExercise)
    {
        $sql = "INSERT INTO workout_exercises (workout_id, exercise_id) VALUES (?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $idTraining);
        $statement->bindValue(2, $idExercise);
        $statement->execute();
        // arrumar uma forma de pegar os ids pelo php no front
        // o problema aqui é que eu não tenho ainda o valor do is do treino, que é um autoincrement do banco de dados
    }
    public function listExercise(int $idTraining)
    {
        $sql = "SELECT gym_exercises.name, gym_exercises.description, gym_exercises.repetitions, gym_exercises.weight
        FROM gym_exercises
        INNER JOIN workout_exercises ON gym_exercises.id = workout_exercises.exercise_id
        INNER JOIN gym_workouts ON workout_exercises.workout_id = gym_workouts.id
        WHERE gym_workouts.id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $idTraining);
        $statement->execute();
        $exercisesTraining = $statement->fetchAll(PDO::FETCH_ASSOC);

        // return $exercisesTraining;

        $exercisesTrainingData = array_map(function($exercise){
            return $this->makeObject($exercise);
        }, $exercisesTraining);
        return $exercisesTrainingData;

        // como tem campo duplicado de name na consulta, o name de uma tabela interfere na outra
        // por isso, quando é listado um novo exercicio ele vem com o nome do treino
        // corrigir isso fazendo um select dos campos específicos
    }
}