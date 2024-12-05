import React, { useState } from 'react'

function AddForm(props) {

    const [text, setText] = useState('');
    const [date, setDate] = useState('');
    const [reminder, setReminder] = useState(false);

    const handleSubmit = (e) => {
        e.preventDefault();

        props.handleSubmit(
            {
                // text:text,
                // date:date,
                // reminder:reminder
                text, date, reminder
            }
        );

        setText('');
        setDate('');
        setReminder(false);

    }

  return (
    <div>

        <form onSubmit={handleSubmit}>

            <div className='form-control'>
                <label htmlFor="">Todo</label>
                <input type="text" value={text} onChange={ (e) => setText(e.currentTarget.value)} placeholder='Entrez un todo' />
            </div>

            <div className='form-control'>
                <label htmlFor="">Jour et heure</label>
                <input type="text" value={date} onChange={ (e) => setDate(e.currentTarget.value)} placeholder='Entrez un todo' />
            </div>

            <div className='form-control form-control-check'>
                <label htmlFor="">Ajouter un rappel</label>
                <input type="checkbox" checked={reminder} onChange={ (e) => setReminder(e.currentTarget.checked)} />
            </div>

            <input type="submit" className='btn btn-block' value="Ajouter" />

        </form>
        
    </div>
  )
}

export default AddForm