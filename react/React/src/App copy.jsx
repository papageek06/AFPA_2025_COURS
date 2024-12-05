import { useState } from 'react'
// ici j'importe l'effet de bord (hook, usetate) qui me permet de gérer le DOM avec ce principe de variable d'état
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'

// function component
function App() {
  // object destructuring
  const [count, setCount] = useState(0) // effet de bord (hooks, ce sont des fonctionnalités extra qu'on peut mettre dans nos composants)
  // je suis en train d'initialisé une variable d'état
  // et la fonction qui me permettra de modifier mon état

  // useState(0) renvoit deux choses
  // count : sera ma variable d'état (j'aurais pu l'appeler toto)
  // setCount : sera la fonction qui me permet de réaffecter une valeur à ma variable d'état count


  // className: ce sont des attributs JSX
  // onClick: attribut JSX
  // src={viteLogo} les accolades intérprête les valeurs des variables
  // src="ihor-pompe-3-doigts.png"
  // dans {} je peux aussi avoir de la logique
  // `${}`
  return (
    <>
      <div>
        <a href="https://vite.dev" target="_blank">
          <img src={viteLogo} className="logo" alt="Vite logo" />
        </a>
        <a href="https://react.dev" target="_blank">
          <img src={count > 0 ? 'toto.png' : 'titi.svg'} className={`logo react ${count > 0 ? 'toto' : 'x'}  ` } alt="React logo" />
        </a>
      </div>
      <h1>Vite + React</h1>
      <div className="card">
        <button onClick={() => setCount((count) => count + 1)}>
          {/* () => setCount((count) => count + 1) : met à jour la variable d'état */}
          count is {count} 
          {/*  {count}  affiche la valeur de la variable d'état */}

          {/* si react detecte qu'une variable d'état à été mis à jour, il raffraichit automatiquement le composant seul */}
        </button>
        <p>
          Edit <code>src/App.jsx</code> and save to test HMR
        </p>
      </div>
      <p className="read-the-docs">
        Click on the Vite and React logos to learn more
      </p>
    </>
  )
}

export default App
