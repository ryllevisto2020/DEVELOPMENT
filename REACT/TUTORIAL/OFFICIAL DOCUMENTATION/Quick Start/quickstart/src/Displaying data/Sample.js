const name = "visto";

/*Object*/
const user = {
    name:"claire",
    age:15
}

/*Array Object*/
const all_user = [
    {
        name:"robinson",
        age:20
    },
    {
        name:"rynne",
        age:21
    }
]

export default function App() {
    return (
        <div>
            <h1>Displaying Data</h1>
            <h2>hello {name}</h2>

            <h2>hello {user.name}! your age is {user.age}</h2>

            {all_user.map((x)=>
                <h2>hello {x.name}! your age is {x.age}</h2>
            )}
        </div>
    )
}