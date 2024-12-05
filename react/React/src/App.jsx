import Header from "./components/Header"
import AddForm from "./components/AddForm"
import ListTodos from "./components/ListTodos"
import Footer from "./components/Footer"
import Button from "./components/Button"

// importer un hook le usestate
import { useState, useEffect } from "react"

// CRUD
// creat - read - update - delete
// protocole HTTP
// api fetch (pour faire des requêtes asynchrones)
// async await (ES6)

// GET : récupérer des données
// PUT : modifier (toggle sur reminder)
// DELETE : supprimer
// POST : ajouter

// REST

// GET    /todos
// GET    /todos/1
// POST   /todos
// PUT    /todos/2
// DELETE /todos/3


function App() {

  const fetchTasks = async () => {

    const res = await fetch('http://localhost:8000/todos', {method:'GET'}); // method GET
    const data = await res.json();
    setTodos(data);

  }

  // quand mon composant va être monté, chargé à l'écran
  useEffect(
    () => {
      
      fetchTasks();
      
    }, []
  );
  
  const [todos, setTodos] = useState([]);
  const [showAddTodo, setShowAddTodo] = useState(true);
  const [reminder, setReminder] = useState(true);
  const [showAll, setShowAll] = useState(true);

  const handleDeleteTodos = () => setTodos([]);
  const toggleAllReminder = () => {

    setTodos(
      state => state.map(
        todo => ({...todo, reminder : !reminder})
      )
    )
    
    setReminder(
      state => !state
    )
  }
  const toggleShowForm = () => {
    console.log("click");
    setShowAddTodo(
      (state) => !state
    )
  }
  const handleDeleteTodo = async (id) => {

    console.log(`Suppresion du todo n° ` + id);

    const res = await fetch(`http://localhost:8000/todos/${id}`,
       {method:'DELETE'}
    );

    setTodos(
      (state) => state.filter(todo => todo.id != id)
    );

  }

  const toggleReminder = (id) => {

    setTodos(
      state => state.map(
        todo => todo.id == id ? {...todo, reminder : !todo.reminder} : todo
      )
    );

  }

  const handleSubmit = async(todo) => {

    const res = await fetch(`http://localhost:8000/todos`,
        {method:'POST'},
        // headers :> content type objet json
        //body : stringify notre todo
    );

    // ca nous renverra un objet json
    // cet objet vous l'utiliserai pour l'ajouter au state en dessous


    setShowAll(
      true
    );

    setTodos(
      state => [...state, {...todo, id: Math.floor(Math.random() * 1000000)}]
    );

  }

  const toggleShowAll = () => {

    setShowAll(
      state => !state
    );

  }

  // je retourne toujours un élément parent (soit une div
  // soit <> </>)
  // React.fragment
  return (
    <div className="container">

      <Header onclickpropFromApp={toggleShowForm} />

      {
        showAddTodo && <AddForm handleSubmit={handleSubmit} />
      }
      
      <ListTodos showAll={showAll} onDblClickFromApp={toggleReminder} listTodos={todos} onclickFromApp={handleDeleteTodo} />
      <Button onclickprop={handleDeleteTodos} text="Supprimer" color="green" />
      <Button onclickprop={toggleAllReminder} text="Reminder" color="orange" />
      <Button onclickprop={toggleShowAll} text={` ${showAll ? 'Filtrer' : 'Tous'}  `} color="violet" />

      <p className="counter">{todos.length} todos</p>

      <Footer />

    </div>
  )


}

export default App