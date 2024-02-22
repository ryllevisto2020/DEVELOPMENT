import Cookies from 'js-cookie';
import { useEffect , useRouter, useState} from 'react';
import useSessionStorageState from 'use-session-storage-state'
let count = 0;
function App() {

  let token_auth;
  function test(){
    fetch("http://localhost:3080/session",{
      method:"GET",
      headers:{
        "Content-type":"application/json"
      },
    }).then(async function(res){
      token_auth = res.headers.get("token-auth");
      Cookies.set("token-auth",token_auth);
    }).catch(function(err){
      console.log(err)
    })
  }

  const [todos, setTodos] = useSessionStorageState()
  let [arr,setArr] = useState([]);
  //Set Session
  let set_session = () =>{
    sessionStorage.setItem("login_session","eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c")
    window.location.reload();
  }
  //Get Session
  let get_session = () =>{
    return sessionStorage.getItem("login_session"); 
  }
  //Delete Session
  let delete_session = () =>{
    sessionStorage.removeItem("login_session");
    window.location.reload();
  }
  
  let add = () =>{
    setArr([...arr,count=count+1])
  }

  //Set Cookie
  let set_cookie = (event) =>{
    event.preventDefault();
    Cookies.set("name","vistoawd");
    window.location.reload();
  }

  //Delete Cookie
  let delete_cookie = () =>{
    Cookies.remove('name');
    window.location.reload();
  }

  //Get Cookie
  let get_cookie = () =>{
    return Cookies.get('name');
  }
  //console.log(get_cookie());

  useEffect(()=>{
    test()
  },[])
  
  return (
    <div className="App">
      <header className="App-header">
        <button onClick={(e)=>{set_cookie(e)}}>set cookie</button>
        <button onClick={delete_cookie}>delete cookie</button>
        <button onClick={set_session}>set session</button>
        <button onClick={delete_session}>delete session</button>
        { 
        arr.map((x)=>(<h1>{x}</h1>))
        }
        <input type="text" placeholder='cookie' defaultValue={get_cookie()}></input>
        <input type="text" placeholder='session' defaultValue={get_session()}></input>
      </header>
    </div>
  );
}

export default App;
