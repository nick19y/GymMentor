INSERT INTO gym_workouts (name, level) VALUES 
('Treino de Pernas', 'avançado'),
('Treino de Peito e Tríceps', 'intermediário'),
('Treino de Costas e Bíceps', 'iniciante');

INSERT INTO gym_exercises (name, description, repetitions, weight) VALUES
('Agachamento Livre', 'Agachamento com barra nas costas', 10, 15),
('Supino Reto', 'Supino com barra em bancada plana', 12, 15),
('Puxada na Polia Alta', 'Puxada para costas alta com polia', 8, 15);

SELECT * FROM gym_workouts;
SELECT * FROM gym_exercises;

DROP TABLE gym_workouts;

SET SQL_SAFE_UPDATES=0;
delete from gym_workouts;