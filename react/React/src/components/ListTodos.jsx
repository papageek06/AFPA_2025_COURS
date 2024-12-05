
import React from 'react'
import Todo from './Todo'

function ListTodos(props) {
  return (
    <div>

        {
          props.listTodos.map( 
            (todo) => <Todo display={ ` ${!props.showAll && !todo.reminder ? 'none' : 'block'} ` } onDblClickFromList={props.onDblClickFromApp} key={todo.id} todoAAfficher={todo} onclickFromList={props.onclickFromApp}/>
          )
        }
       
    </div>
  )
}

export default ListTodos