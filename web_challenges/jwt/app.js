const express = require('express')
const bodyParser = require('body-parser')
const jwt = require('jsonwebtoken')

const app = express()
const port = 3000

app.use(bodyParser.json())
app.use(bodyParser.urlencoded({extended : true}))





app.get('/login', (req,res)=>{


    res.sendFile(__dirname+'/views/login.html')

})
app.post('/login',(req,res)=>{

    let token = jwt.sign({
        exp: Math.floor(Date.now() / 1000) + (60 * 60),
        username : req.body.username
    },process.env.secret);
    res.send(token)

    
})
app.listen(port, () => console.log('App Listening on port '+port))