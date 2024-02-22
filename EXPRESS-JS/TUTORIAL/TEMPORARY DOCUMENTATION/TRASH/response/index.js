const express = require('express');
const body_parser = require('body-parser');
const circular_json = require('circular-json');
const app = express();

app.use(express.urlencoded({extended:false}));
app.use(express.json());
app.use(body_parser.urlencoded({ extended: false }));
app.use(body_parser.json());

//Response Json
app.get('/json',(req,res)=>{
    let data = [{id:1,name:"visto"},{id:2,name:"visto"}]
    let string = JSON.stringify(data);
    let parse = JSON.parse(string);
    res.json(parse[1]);
})

//Response Send
app.get('/send',(req,res)=>{
    let data = "<h1>hello this is from send</h1>";
    console.log(req.query);
    let test = circular_json.stringify(req);
    res.json(JSON.parse(test));
})

//

app.listen(3080,()=>{
    console.log("running on port 3080!");
})