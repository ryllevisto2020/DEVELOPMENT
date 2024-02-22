const express = require("express");
const app = express();

const url_encoded = express.urlencoded({extended:false});
const json = express.json();
app.use(url_encoded);
app.use(json);

//Required Parameters
app.get("/routing/:name",(req,res)=>{
    let name = req.params.name
    res.send(name);
});

//Optional Parameters
app.get("/route/optional/:name?",(req,res)=>{
    let name = req.params.name
    res.send(name);
})
 
app.listen(3080,()=>{
    console.log("running on port 3080!")
})