import { useEffect, useRef, useState } from "react";
import Axios from 'axios';

function ViewComponents() {

  
  let [data_fetch,setDataFetch] = useState([]);
  
  let add =()=>{
    let data = {
      id:id_refs.current.value,
      name: "visto",
      location: "manila"  
    }
    Axios.post("http://localhost:8080/users",data)
    .then(function(res){
      console.log(res);
      a();
    }).catch(function(err){
      console.log(err);
    });
  }

  let dataa;
  useEffect(()=>{
    
    fetch();
  },[])
  function fetch(){
    Axios.get("http://localhost:8080/users")
    .then(function(res){
      setDataFetch(res.data);
    }).catch(function(err){
      console.log(err);
    })
  }  
  
  function a(){
    fetch();
  }

  let id_refs = useRef(null);
  
    return (
      <>
      <h1>This is components</h1>
      <input type="text" ref={id_refs}></input>
      <button onClick={add}>add</button>
      <button onClick={a}>fetch</button>
      {
        data_fetch.map((x)=>(<h1>{x.id} and {x.name} and {x.location}</h1>))
      }
      </>
    );
  }

export default ViewComponents;