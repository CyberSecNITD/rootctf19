const express = require('express')
const bodyParser = require('body-parser')

const app = express()
const port = 3000

app.use(bodyParser.json())
app.use(bodyParser.urlencoded({extended : true}))





app.get('/', (req,res)=>{


    res.setHeader('flag',process.env.secret)

    res.sendFile(__dirname+ '/views/index.html')
})

app.get('/register', (req,res) => {


    res.sendFile('views/register.html')
})
app.listen(port, () => console.log('App Listening on port '+port))