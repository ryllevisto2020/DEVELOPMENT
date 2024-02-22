const express = require('express');
const app = express();

app.get('/response/access/:params', (req, res) => {

    //Set Request Headers
    res.set('customize-headers', 'value of customize-headers');
    res.header('customize-headers-another', 'value of customize-headers-another');

    //Set Cookie
    res.cookie('customize-cookie', 'value of customize-cookie');

    //Choose Between .send, .json, .sendFile, .download, .render
    //Send Plain Text Response
    //res.send("this is a plain text")

    //Send JSON Response
    //res.json([{id:1},{id:2}])

    //Send File Response
    //res.sendFile(__dirname+"\\index.js")

    //Download Response
    //res.download(__dirname+"\\index.js")

    //Send Render Response
    //app.set('views', './views') //-> .set(<name of folder>,./<name of folder>)
    //app.set('view engine', 'pug') //-> .set('view engine', <extension of file template>) ->Example "index.<extension of file template>" -> index.pug
    //res.render('index') //-> .render(<name of file template>) 
})

app.listen(2030, function(){
    console.log('listening on port 2030');
})