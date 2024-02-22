const express = require('express');
const app = express();
const body_parser = require('body-parser');

app.use(body_parser.urlencoded({extended: false}));

function accountType(req, res,next) {
    const account_type = req.query.account_type

    let status = (account_type == "admin")?
    next():
    res.send("Your account type is Reqular");
}

module.exports = accountType