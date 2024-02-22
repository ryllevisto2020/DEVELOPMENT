const express = require('express');
const checkID = require('./middleware/checkID.js');
const app = express();

app.get('/middleware',checkID.checkID,(req,res)=>{
    res.send("You're authorized to access this!");
})

app.listen(3080,()=>{
    console.log('running on port 3080!!');
})