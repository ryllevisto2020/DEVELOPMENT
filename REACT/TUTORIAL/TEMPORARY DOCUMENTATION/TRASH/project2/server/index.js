const express = require('express')
const bodyParser = require('body-parser')
const cookieParser = require('cookie-parser');
const mysql = require('mysql')
const cors = require('cors')
const app = express()

app.use(bodyParser.urlencoded({extended:true}))
app.use(express.json())
app.use(cors())
app.use(cookieParser());

app.get('/test/:id',(req,res)=>{

    res.cookie('awd','test')
    /*const arr = [{name:"awd"}];
    
    console.log(req.params['id'])
    for (let index = 0; index < 5; index++) {
        arr.push({name:index});
    }
    res.send(arr);*/
})
app.get('/cookie',(req,res)=>{
   
    res.send([{'awd':'awd'}]).json
})
app.listen(3001,()=>{console.log('Port 3001 running!')})