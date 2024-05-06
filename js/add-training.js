const logo = document.querySelector(".logo");
const logout = document.querySelector(".logout");
const exerciseInput = document.getElementById("exercise-input");
const exercisesContainer = document.getElementById("exercises-container");
const addTrainingForm = document.querySelector(".add-training-form");
const addExerciseBtn = document.querySelector(".add-exercise-btn");
const submitTrainingBtn = document.querySelector(".submit-training-btn");
const inputAddExercise = document.querySelector(".input-add-exercise");

let exercises = [];

logo.addEventListener("click", ()=>{
    window.location.href = "main.php"
});

logout.addEventListener("click", ()=>{
    window.location.href = "index.php"
});

addTrainingForm.addEventListener("submit", function(event){    
    event.preventDefault();
});


function removeExercise(index){
    exercises.splice(index, 1);
    exercisesContainer.innerHTML="";
    exercises.map(function(exercise, index){
        exercisesContainer.innerHTML+=
        `
        <li class="exercise-item">
            <h4>${exercise}</h4>
            <img src="/img/less.png" onclick="removeExercise(${index})" alt="Remover exercício do treino" class="delete-exercise-btn">
        </li>
        `;
    });
}

function addTraining(){
    const exerciseValue = exerciseInput.value.trim();
    if(exerciseValue!==""){
        exercises.push(exerciseValue);

        exercisesContainer.innerHTML="";

        exercises.map(function(exercise, index){
            exercisesContainer.innerHTML+=
            `
            <li class="exercise-item">
                <h4>${exercise}</h4>
                <img src="/img/less.png" onclick="removeExercise(${index})" alt="Remover exercício do treino" class="delete-exercise-btn">
            </li>
            `;
        });
        exerciseInput.value = "";
    }
}

addExerciseBtn.addEventListener("click", function() {
    addTraining();
});
inputAddExercise.addEventListener("keydown", function(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        addTraining();
    }
});
submitTrainingBtn.addEventListener("click", function() {
    addTrainingForm.submit();
});