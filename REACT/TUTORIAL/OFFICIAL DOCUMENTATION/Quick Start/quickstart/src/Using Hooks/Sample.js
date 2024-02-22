import { useState } from "react"

export default function App(){
    const [number,setNumber] = useState(0);
    const click = () =>{
        setNumber(number + 1);
    }
    
    return (
        <div>
            <h1>Using Hooks</h1>
            <MyButton count={number} onClick={click} />
            <MyButton count={number} onClick={click} />
        </div>
    )
}
function MyButton({ count, onClick }) {
    return(
        <button onClick={onClick}>Clicked {count} times</button>
    )
}