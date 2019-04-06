const express = require('express')
const bodyParser = require('body-parser')
const jwt = require('jsonwebtoken')

const app = express()
const port = 6763 

app.use(bodyParser.json())
app.use(bodyParser.urlencoded({extended : true}))


const flag = 'root@ctf{foodbabe}' ;


app.get('/',(res,req)=>{

    res.redirect('http://localhost:6763')

})

app.get('/login', (req,res)=>{


    res.sendFile(__dirname+'/views/login.html')

})
app.post('/login',(req,res)=>{

    let token = jwt.sign({
        exp: Math.floor(Date.now() / 1000) + (60 * 60),
        username : req.body.username
    },flag);
    res.send(token)

    
})
app.listen(port,'0.0.0.0', () => console.log('App Listening on port '+port))
