import { useRef, useState } from "react";

/*const products = [
    {
        name:'lettuce',
        id:1
    },
    {
        name:'Eggplant',
        id:2
    }
];*/

export default function App(){
    const ref_product = useRef()
    const [products,SetProducts] = useState([{name:'lettuce',id:1}])
    const submit_product = () =>{
        const product_name = ref_product.current.value;
        const products_count = products.length;
        SetProducts([...products,{name:product_name,id:products_count+1}]);
        ref_product.current.value = '';
    }
    return (
        <div>
            <h1>Rendering Lists</h1>
            <input type="text" placeholder="Name" class="product_name" ref={ref_product}></input>
            <button onClick={submit_product}>Submit</button>
            <h2>Product Count:</h2>
            {products.map((x)=><h2>Product ID: {x.id} | Product Name: {x.name}</h2>)}
        </div>
    )
}