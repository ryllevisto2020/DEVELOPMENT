const express = require('express');
const cors = require('cors');
const multer = require('multer');
const body_parser = require('body-parser');

const app = express();
app.use(cors());
app.use(express.urlencoded({extended:true}));
app.use(express.json());

app.post('/',multer().single('text'),(req,res)=>{
    console.log(req.text)
    //res.json(req)
})

app.listen(3020,()=>{
    console.log("running on port 3020");
})