const express = require('express');
const app = express();
var jwt = require('jsonwebtoken');
const fs = require('fs');

var token_default = jwt.sign({ foo: 'Default' }, 'shhhhh'); //Synchronous Sign with default (HMAC SHA256)
console.log("Default Token:",token_default,"\n");

var privateKey = fs.readFileSync('test.key');
var token_rsa_sha256 = jwt.sign({ foo: 'RSA_SHA_256' }, privateKey, { algorithm: 'RS256' });//Synchronous Sign with RSA SHA256
console.log("RSA Token:",token_rsa_sha256,"\n");

//Verify Token for Authenticity
try {
    var verify_default = jwt.verify(token_default,'shhhhh')
    console.log("Verify Default Token:",verify_default);
} catch (error) {
    console.log("Verify Failed:",error);
}

try {
    var verify_rsa_sha256 = jwt.verify(token_rsa_sha256,privateKey)
    console.log("Verify RSA Token:",verify_rsa_sha256)
} catch (error) {
    console.log("Verify Failed:",error);
}

app.listen("2030",function(){
    console.log("listening on port 2030!");
});