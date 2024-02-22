import { useSearchParams } from "next/navigation";
import { useRouter } from "next/router";
import { useState } from "react"


function About(){
    const [name,useName] = useState([{id:1,'name':'visto'},{id:2,'name':'claire'}]);
    const router = useRouter();
    const params = useSearchParams();
    let id = params.get('id');
    console.log(id);
    return(
        <div>
            <h1>About</h1>
            <h1>{id}</h1>
            {name.map(name=>(<h1 key={name.id}>{name.name}</h1>))}
            <a href="/">goto index page</a>
            <button onClick={()=>{router.push('/post/abc')}}>router.pust</button>
        </div>
    )
}
export default About