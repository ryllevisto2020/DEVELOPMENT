function checkID(req,res,next){
    if(req.query.id == 1){
        next()
    }else{
        res.send("You're not authorized to access this!")
    }
}

module.exports = {
    checkID
}