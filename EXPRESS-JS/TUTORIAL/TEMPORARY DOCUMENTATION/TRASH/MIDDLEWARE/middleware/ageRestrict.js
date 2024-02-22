const express = require('express');
const app = express();
const body_parser = require('body-parser');

app.use(body_parser.urlencoded({extended: false}));

function ageRestrictions(req,res,next) {
    const age = req.query.age

    //Create Shorthand If..Else
    let status = (age>=18)?
    next():
    res.send("Your age is Restricted!");
}

module.exports = ageRestrictions