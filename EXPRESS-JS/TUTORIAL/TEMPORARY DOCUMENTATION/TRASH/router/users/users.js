const express = require('express');

const app = express();

const router = express.Router();

router.param("userGet", (req, res, next, id) => {
    console.log("This function will be called first from get method");
    next();
});

router.param("userPost", (req, res, next, id) => {
    console.log("This function will be called first from post method");
    next();
});

router.get('/get/:userGet',(req,res)=>{
    console.log("hello this is get");
    res.send();
})

router.post('/post/:userPost',(req,res)=>{
    console.log("hello this is post");
    res.send();
})


//route.get('/get/:<use the router.param>',(req,res)) //for params


module.exports = router