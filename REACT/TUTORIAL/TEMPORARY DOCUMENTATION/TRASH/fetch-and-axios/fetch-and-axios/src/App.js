import { useEffect } from "react";
import axios from "axios";
function App() {
  //axios
  async function axios_post(){
    let data = {id:1000123,name:"visto"};
    axios.post("http://localhost:8080/user",
    {
      id:1000124,name:"visto"
    }).then(function(res){
      console.log(res)
    }).catch(function(err){
      console.log(err)
    })
  }
  async function axios_get(){
    axios.get("http://localhost:8080/user",
    {
      params:{id:1}
    }).then(function(res){
      console.log(res)
    }).catch(function(err){
      console.log(err)
    })
  }

  //fetch
  async function post_data(){
    fetch("http://localhost:8080/user",{
      method:"POST",
      headers:{
        "Content-type":"application/json"
      },
      body:JSON.stringify({id:1000,name:"visto"})
    }).then(async function(res){
      console.log(await res)
    }).catch(function(err){
      console.log(err)
    })
  }

  async function get_data(){
    fetch("http://localhost:8080/user",{
      method:"GET",
    }).then(async function(res){
      let data = await res.json()
      console.log(data[0])
    }).catch(function(err){
      console.log(err)
    })
  }
  useEffect(()=>{
    axios_get();
    //axios_post();
    //post_data();
    //get_data();
  },[])
  return (
    <div className="App">
      <header className="App-header">
       
      </header>
    </div>
  );
}

export default App;
