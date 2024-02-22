const express = require('express');
const cors = require('cors');
var cookieParser = require('cookie-parser')
const app = express();

app.use(cors({
    credentials:true,
    origin:true,
}));
app.use(cookieParser());

app.get('/cookie-session/get',(req,res)=>{
    let cookie_1 = req.cookies; //Cookie=awd;Session=true
    console.log(cookie_1["Cookie"]);

    //let cookie_2 = req.headers.cookie; //{"Cookie":"awd","Session":"true"}
    //let parse_cookie_2 = JSON.parse(cookie_2); //{Cookie:'awd',Session:'true'}
    //console.log(parse_cookie_2["Session"]);
    res.cookie("Cookie",cookie_1["Cookie"]);
    res.send("success");
})

app.listen(3080,()=>{
    console.log("running on port 3080");
})