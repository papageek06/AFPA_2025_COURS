import React from 'react'

const Input = ({weight, unit, onWeightChange}) => {
  return (
    <div>
      <div>
        <label>Entrez un poids en {unit}</label>
        <input 
          type="text"
          value={weight}
          onChange={(e) => onWeightChange(e.currentTarget.value)} 
          placeholder={`Entrez un poids en ${unit}`} />
      </div>
    </div>
  )
}

export default Input