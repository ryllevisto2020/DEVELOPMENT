const express = require('express');
const fileUpload = require('express-fileupload');
const app = express();

app.use(fileUpload());

//FILE UPLOAD USING EXPRESS-FILEUPLOAD
app.post('/file/upload',async (req, res) => {
    //GET FILES PROPERTIES
    console.log('GET FILES PROPERTIES');
    console.log(req.files);

    res.send("This is a Test!");
})

app.listen("2030",()=>{
    console.log("Listening on Port 2030!");
});