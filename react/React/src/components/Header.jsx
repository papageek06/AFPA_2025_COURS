import React from 'react'
import Button from './Button'

function Header(props) {
  return (
    <div className='header'>
        <h1>Mon app</h1>
        <Button onclickprop={props.onclickpropFromApp} color='red' text='Fermer'/>
    </div>
  )
}

export default Header