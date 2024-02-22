const express = require('express')
const app = express();

const route_login = require('./controller/login.js');

//Create Routes
app.use('/login', route_login);

app.listen('2030',function(req,res){
    console.log('listening on port 2030');
});