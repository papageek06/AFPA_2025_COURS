import React from 'react'

const Footer = ({kilos}) => {
  return (
    <footer>
        <p>Le poids est plus 
        {
          kilos > 1000
          ? <span className='red'> lourd </span>
          : <span className='green'> léger </span>
        }  
        qu'une tonne</p>
    </footer>
  )
}

export default Footer