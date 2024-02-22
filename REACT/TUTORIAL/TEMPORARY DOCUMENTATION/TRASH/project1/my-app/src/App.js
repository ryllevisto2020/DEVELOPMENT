import $ from 'jquery';
import { useState } from 'react';



function App() {
  const [number,setNumber] = useState([{name:"visto"},{name:"dulay"}]);
  const arr = [{name:"visto"}];
  $(document).ready(function(){
    console.log(number[0]);
    $(".name").click(function(){
     // alert("awd");
     $.ajax({
      url:"vistop",
      success:function(){
        
      }
     })
    })
  });
  
  
  function test(event){
    console.log(event);
  }  
  return (
    <div className="App">
      <h1></h1>
      <button class="name" onClick={test}>awd</button>
    </div>
  );
}

export default App;
