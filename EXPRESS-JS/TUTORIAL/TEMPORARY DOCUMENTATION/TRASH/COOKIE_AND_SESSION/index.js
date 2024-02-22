const express = require('express');
const bodyParser = require('body-parser');
const cookieParser = require('cookie-parser');
const session = require('express-session');
const app = express();

app.use(cookieParser());
app.use(bodyParser.urlencoded({ extended: true }));

// Use the session middleware
app.use(session({ secret: 'keyboard cat'}))

// Save Data to the Session
app.get('/session/save', function (req, res,next) {
    const username = "visto";
    req.session.user = username; // Save data to session 
    req.session.save(function (err){
        res.end("Session saved successfully!");
    });
});

// Get Data from the Session
app.get('/session/get', function (req, res, next) {
    const username = req.session.user;
    res.end("Your session data is: "+username);
});

// Destroy Data from the Session
app.get('/session/destroy', function (req,res,next){
    req.session.destroy(function (err){
        res.end("Session Destroyed!");
    })
});

// Save Data to the Cookie
app.get('/cookie/save', function (req, res, next){
    const username = "visto";
    res.cookie("user",username);
    res.end("Cookie saved successfully!");
});

// Get Data from the Cookie
app.get('/cookie/get', function (req, res, next){
    const username = req.cookies.user;
    res.end("Your cookie data is: "+username);
});

// Destroy Data from the Cookie
app.get('/cookie/destroy', function (req,res,next){
    res.clearCookie("user");
    res.end("Cookie Destroyed!");
});
app.listen("2030",()=>{
    console.log('listening on port 2030!');
});