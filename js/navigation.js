const backBtn = document.querySelector(".login-navigate-btn");
const logo = document.querySelector(".logo");


logo.addEventListener("click",()=>{
    window.location.href = "main.php";
})

backBtn.addEventListener("click",()=>{
    window.location.href = "index.php";
})