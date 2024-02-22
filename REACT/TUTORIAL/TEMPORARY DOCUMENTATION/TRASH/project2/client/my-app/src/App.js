import React,{useState} from 'react';

function App() {
  const [name,setName]=useState([{name:"aawd",id:1},{name:"test",id:2}]);
  let setnameVal;
  const a = (nameVal)=>{
    let count = name.length;
    setName([...name,{name:nameVal,id:count+1}]);
  }
  const b =(val)=>{
    setnameVal = val.target.value;
  }
  return (
    <div className="App">
      {name.map(na=><h1 key={na.id}>{na.name}</h1>)}
      <input type="text" class="name" onChange={b}></input>
      <input type="button" class="start" value="signin" data-ng="test"></input>
      <input type="button" class="start" value="login" data-ng="test" onClick={()=>{a(setnameVal)}}></input>
    </div>
  );
}

export default App;
