import * as jose from 'jose'

//ENCODE DATA
const secret = new TextEncoder().encode(
  'cc7e0d44fd473002f1c42167459001140ec6389b7353f8088f4d9a95f2f596f2',
)
const alg = 'HS256'

const jwt = await new jose.SignJWT({ 'urn:example:claim': true })
  .setProtectedHeader({ alg })
  .setIssuedAt()
  .setIssuer({
    auth:true,
    name:"visto",
    role:1
  })
  .setAudience('urn:example:audience')
  .setExpirationTime('2h')
  .sign(secret)

console.log(jwt)

/*const { payload, protectedHeader } = await jose.jwtVerify(jwt, secret, {
  issuer: 'urn:example:issuer',
  audience: 'urn:example:audience',
})*/

//console.log(protectedHeader)
//console.log(payload)

//DECODE TOKEN
const claims = jose.decodeJwt(jwt)
console.log(claims)
function App() {
  return (
    <div className="App">
      
    </div>
  );
}

export default App;
