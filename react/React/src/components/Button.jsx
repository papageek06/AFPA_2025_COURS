
import React from 'react'

function Button(props) {
  return (
    <div>
        <button onClick={props.onclickprop} style={{backgroundColor: props.color}} className='btn'>{props.text}</button>
    </div>
  )
}

export default Button