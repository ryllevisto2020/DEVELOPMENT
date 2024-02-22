const express = require('express');

const app = express();

const useUsers_router = require('./users/users.js')
const useComments_router = require('./comments/comments.js')

app.use('/users',useUsers_router);
app.use('/comments',useComments_router);

app.listen(3080,()=>{
    console.log("running on port 3080");
})