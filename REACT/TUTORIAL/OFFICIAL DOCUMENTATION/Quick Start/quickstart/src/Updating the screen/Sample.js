import react from 'react';
import { useState } from 'react';

export default function App(){
    const [number,setNumber] = useState(0);
    const update = () =>{
        setNumber(number + 1)
    }
    return(
        <div>
            <h1>Updating the screen</h1>
            <h2>number : {number}</h2>
            <button type="button" onClick={update}>Update</button>
        </div>
    )
}