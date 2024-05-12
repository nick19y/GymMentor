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
    }
    public function listExercise(int $idTraining)
    {
        $sql = "SELECT gym_exercises.id, gym_exercises.name, gym_exercises.description, gym_exercises.repetitions, gym_exercises.weight
        FROM gym_exercises
        INNER JOIN workout_exercises ON gym_exercises.id = workout_exercises.exercise_id
        INNER JOIN gym_workouts ON workout_exercises.workout_id = gym_workouts.id
        WHERE gym_workouts.id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $idTraining);
        $statement->execute();
        $exercisesTraining = $statement->fetchAll(PDO::FETCH_ASSOC);

        $exercisesTrainingData = array_map(function($exercise){
            return $this->makeObject($exercise);
        }, $exercisesTraining);
        return $exercisesTrainingData;
    }
    public function deleteExercise(int $idTraining, int $idExercise)
    {
        $sql = "DELETE FROM workout_exercises
        WHERE workout_id = ? AND exercise_id = ?;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $idTraining);
        $statement->bindValue(2, $idExercise);
        $statement->execute();
    }
    public function updateExercise(){
        
    }
}