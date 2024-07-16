const openScope = document.querySelector(".start");
const Scope = document.querySelector(".scope");

const element = document.getElementById("hero");
element.classList.remove("hero");

openScope.addEventListener('click',function(){
    Scope.classList.add("show");
    // topics.classList.remove("")
});