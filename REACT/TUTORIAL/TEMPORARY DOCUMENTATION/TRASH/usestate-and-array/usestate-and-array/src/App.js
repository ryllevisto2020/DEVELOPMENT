import { useEffect, useState } from "react";
function App() {
  //useState
  let [number_ph1,setNumber]=useState([1,2,3,4]);
  //array
  let number_ph2 = ([1,2,3,4]);

  //add element in array
  number_ph2.push(5);

  useEffect(()=>{//to no repeat the function
    //add element in useState
    setNumber([...number_ph1,5]);
    // eslint-disable-next-line
  },[])
 
  //Mapping Array/useState
  number_ph2.map((x)=>console.log("array:",x))
  number_ph1.map((x)=>console.log("useState:",x))
  
  return (
    <div className="App">
      <header className="App-header">
        {
          number_ph2.map((x)=>(<h1>array:{x}</h1>))
        }
        {
          number_ph1.map((x)=>(<h1>useState:{x}</h1>))
        }
      </header>
    </div>
  );
}

export default App;
