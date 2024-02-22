const express = require('express');
const app = express();
const body_parser = require('body-parser');

app.use(body_parser.urlencoded({extended: false}));

//External Middleware
const ageRestrict = require('../MIDDLEWARE/middleware/ageRestrict.js');
const accountType = require('../MIDDLEWARE/middleware/accountType.js');

app.get('/middleware/age', ageRestrict, (req, res) => {
    res.send("This is a test!");
});

app.get('/middleware/account',accountType, (req, res) => {
    res.send("This is a test!");
})

//Internal Middleware
async function stat(req,res,next){
    const status = req.query.status
    let stat = (status == "true")?
    next():
    res.send("Your status is False");
}
app.get('/middleware/status',stat, (req, res) => {
    res.send("This is a test!")
})

app.listen('2030',function() {
    console.log("running on port 2030!");
});