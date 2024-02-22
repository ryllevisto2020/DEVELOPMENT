const express = require('express')
const app = express();
const router = express.Router();

//Create Forgot Password Controller for Login Routes
router.use('/forgotpass',function(req, res, next){
    res.send("This is a Test!");
});

module.exports = router