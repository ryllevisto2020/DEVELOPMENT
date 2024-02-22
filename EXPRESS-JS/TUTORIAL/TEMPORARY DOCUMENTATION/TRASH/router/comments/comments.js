const express = require('express');

const app = express();

const router = express.Router();

router.param("commentsGet", (req, res, next, id) => {
    console.log("This function will be called first from get method");
    next();
});

router.param("commentsPost", (req, res, next, id) => {
    console.log("This function will be called first from post method");
    next();
});

router.get('/get/:commentsGet',(req,res)=>{
    console.log("hello this is get");
    res.send();
})

router.post('/post/:commentsPost',(req,res)=>{
    console.log("hello this is post");
    res.send();
})

module.exports = router