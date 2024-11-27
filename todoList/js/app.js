const BTN_TOGGLE_FORM = document.querySelector(".toggleForm");
const TODO_FORM = document.querySelector(".todo-form");
const COUNT = document.querySelector("#count");
const CLEAR_ALL = document.querySelector(".clear-all");
const TODO_LIST = document.querySelector(".todo-list");
const REMIND_ALL = document.querySelector(".reminder-all");


function createTodo () {

    TODO_FORM.addEventListener("submit", function(e) {

        e.preventDefault(); // j'empêche le chargement de la page

        // je récupère les valeurs soumises de mon formulaire
        let inputTextDodo = document.getElementById('task').value;
        let inputDateDoto = document.getElementById('due-date').value;
        let inputReminder = document.getElementById('reminder').checked;

        let newTodo = {
            id : Math.floor(Math.random() * 1000000) + 1,
            name: inputTextDodo,
            date: inputDateDoto,
            reminder: inputReminder
        };

        // je récupère les données actuellement dans mon localstorage
        let listTodos = JSON.parse(localStorage.getItem("todos")) || [];
        listTodos.push(newTodo);
        localStorage.setItem("todos", JSON.stringify(listTodos));
        TODO_FORM.reset();
    
        createLiTodo(newTodo);
        
    }); 

}


function deleteTodo() {

}

function handleDeleteTodo(id) {

}

function getTodosCount() {

}

function toggleReminder() {

}

function toggleShowForm() {

}

function deleteTodos() {

}

function filterTodos() {

}

function handleDeleteButtonChange() {

}

function handleFilterButtonChange() {

}

function loadTodos() {

    // je récupère tous mes todos depuis localstorage
    let listTodos = JSON.parse(localStorage.getItem('todos')) || [];

    listTodos.forEach(function(todo) {

        createLiTodo(todo);

    });

}

function createLiTodo(todo) {

    // je créer mon li
    let li = document.createElement("li");
    li.className = "todo-item";

    // si mon todo a un rappel
    if(todo.reminder) {
        li.classList.add("reminder"); // j'ajoute cette classe la
    }

    li.id = todo.id;

    // je crée mon span
    let span1 = document.createElement("span");
    span1.innerText = `${todo.name} - ${todo.date}`;
    li.append(span1); // j'ajoute le span à mon li

    // je crée mon deuxième span
    let span2 = document.createElement("span");
    span2.innerText = "✖";
    span2.className = "delete-btn";
    li.append(span2); // j'ajoute le span à mon li

    // j'ajoute le li à ma liste de todo
    TODO_LIST.append(li);
} 

loadTodos();
createTodo();