const BTN_TOGGLE_FORM = document.querySelector(".toggleForm");
const TODO_FORM = document.querySelector(".todo-form");
const COUNT = document.querySelector("#count");
const CLEAR_ALL = document.querySelector(".clear-all");
const TODO_LIST = document.querySelector(".todo-list");
const btnNewTODO = document.getElementById("btnNewTODO");
// permet de créer un todo
function createTodo() {

btnNewTODO.addEventListener("click" , function(event) {

    event.preventDefault();

    let text = document.getElementById("task");
    let date = document.getElementById("due-date");
    let newTODO = document.createElement("li");
    newTODO.classList.add("todo-item") 
    let newSpan = document.createElement("span");
    let newDeleted = document.createElement("span");

    newSpan.innerHTML = text.value +" - "+ date.value ;
    TODO_LIST.appendChild(newTODO);
    newTODO.append(newSpan);
    newTODO.append(newDeleted);
    newDeleted.innerHTML = "✖";
    newDeleted.classList.add("delete-btn");
    let checkbox = document.getElementById("reminder").checked ;
    
        if (checkbox) {
            newTODO.classList.add("reminder");
        }
        deleteTodo();
    toggleReminder();
getTotalTodos();
    

   
});



}

// supprimer un todo
function deleteTodo() {

    let listDeleteBtn = document.querySelectorAll(".delete-btn");

    listDeleteBtn.forEach(function(deleteBtn) {
        deleteBtn.addEventListener("click", function() {
            this.parentElement.remove(); // supprimer le li du bouton sur lequel j'ai cliqué
            getTotalTodos();
        });
    });

}

// récupérer le compteur de todo
function getTotalTodos() {

    let nbrTodos = document.querySelectorAll(".todo-item").length;
    COUNT.innerHTML = nbrTodos;

}

// Ajouter/supprimer un rappel sur un todo
function toggleReminder() {

    let listTodos = document.querySelectorAll(".todo-item");

    listTodos.forEach(function(todo) {
        todo.addEventListener("dblclick", function() {
            todo.classList.toggle("reminder");
        });
    });

}

// Afficher/faire disparaitre le formulaire
function toggleShowForm() {

    BTN_TOGGLE_FORM.addEventListener("click", function() {

        TODO_FORM.classList.toggle("hide");

        if(TODO_FORM.classList.contains("hide")) {
            // chager de couleur le bouton
            // changer le texte
            this.classList.toggle("bg-green");
            this.innerHTML = "Afficher";
        } else {
            this.classList.toggle("bg-green");
            this.innerHTML = "Cacher"; 
        }

    });

}

function deleteAllTodos() {

    CLEAR_ALL.addEventListener("click", function() {

        TODO_LIST.innerHTML = "";
        getTotalTodos();

    });
}

function filterTodos() {

    let listTodos = document.querySelectorAll(".todo-item");
    let reminderAll = document.querySelector(".reminder-all");
    function btnRappel(){
      
    }
    reminderAll.addEventListener("click" , ()=> {
        if (reminderAll.classList == "reminder-all") {
            reminderAll.classList.remove("reminder-all");
            reminderAll.classList.add("hide-all-li");
            reminderAll.innerHTML = "Par date";
            listTodos.forEach((listTodo) => {
                if (listTodo.classList == "todo-item reminder"){
                    listTodo.classList.remove("hide")
                }else{
                     listTodo.classList.add("hide")
                }

            });

        } else {
            reminderAll.classList.add("reminder-all");
            reminderAll.classList.remove("hide-all-li");
            reminderAll.innerHTML = "Par rappel";
            listTodos.forEach((listTodo) => {
            
                    listTodo.classList.remove("hide")
               
        })

}})


}

createTodo();

toggleShowForm();
toggleReminder();
getTotalTodos();
deleteTodo();
deleteAllTodos();
filterTodos();
