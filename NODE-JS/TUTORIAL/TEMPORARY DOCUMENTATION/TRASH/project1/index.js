const express = require('express');
const cors = require('cors');

const app = express();

app.use(cors());
app.use(express.json())
app.use(express.urlencoded({extended:true}))

const arr = [{name:"visto"},{name:"dulay"}];
const arr_st = '[{"name":"visto"}]'

app.get('/params/:params',(req,res)=>{ // /<name>
    const data = req.params.params
    res.send(data);
});

app.get('/query',(req,res)=>{ // /?id=1
    const data= req.query.id
    res.send(arr)
})

app.post('/query/post',(req,res)=>{ // {id=1,name=visto}
    console.log(req)
    res.send(req.body)
})

app.listen(3001,()=>{
    console.log("running on port 3001");
});