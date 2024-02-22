const clickHandle = () =>{
    alert('You Clicked the button');
}

export default function App(){
    return (
        <div>
            <h1>Responding to events</h1>
            <button type="button" onClick={clickHandle}>click this</button>
        </div>
    )
}