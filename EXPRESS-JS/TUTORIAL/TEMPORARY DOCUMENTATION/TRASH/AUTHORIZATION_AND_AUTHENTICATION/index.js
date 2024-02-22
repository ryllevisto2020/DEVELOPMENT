const express = require('express');
const jwt = require('jsonwebtoken');
const cookieParser = require('cookie-parser');
const app = express();

app.use(cookieParser());

//Authentication
app.get('/authentication', (req, res) => {
    const username = req.query.username
    const password = req.query.password
    fetch(`http://localhost:3000/account?username=${username}&password=${password}`,{
        method:"GET",
    }).then(async function(response){
        var data = await response.json();
        var data_size = data.length;
        if(data_size > 0){
            var token = jwt.sign(data[0],"visto");
            res.cookie("token",token);
            res.send("Account Found");
        }else{
            res.send("No Account Found");
        }
    });
});

//Authorization
app.get('/authorization', (req, res) => {
    try {
        var verify_token = jwt.verify(req.cookies.token,"visto");
    } catch (error) {
        res.send("Your token is invalid");
    }
    if(verify_token.role > 0){
        res.send("Your role is User!");
    }else{
        res.send("Your role is Admin!");
    }
})

//Admin Routes
app.get('/admin', (req, res) => {
    try {
        var verify_token = jwt.verify(req.cookies.token,"visto");
    } catch (error) {
        res.send("Your token is invalid");
    }
    if(verify_token.role > 0){
        res.send("You're not allowed to access this!");
    }else{
        res.send("You're allowed to access this!");
    }
})

//Logout Routes
app.get('/logout', (req, res) => {
    res.clearCookie("token")
    res.redirect("/authentication");
})

app.listen("2030",function(){
    console.log("listening on port 2030!");
});

