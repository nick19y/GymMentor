use GymMentor;
CREATE TABLE gym_workouts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    level VARCHAR(255) NOT NULL,
    img VARCHAR(255)
);

CREATE TABLE gym_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    repetitions INT
);

CREATE TABLE workout_exercises (
    workout_id INT,
    exercise_id INT,
    FOREIGN KEY (workout_id) REFERENCES gym_workouts(id),
    FOREIGN KEY (exercise_id) REFERENCES gym_exercises(id)
);