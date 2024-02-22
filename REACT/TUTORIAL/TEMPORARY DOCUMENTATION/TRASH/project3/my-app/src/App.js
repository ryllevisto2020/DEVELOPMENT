import Axios from 'axios';

const get = () =>{
  Axios.get("http://localhost:3001/query")
  .then(function(response){
    console.log(response)
  })
}

function App(){
  get()
  return (
    <div>
    </div>
  )
}
export default App
