const express = require('express')
const bodyParser = require('body-parser')

const app = express()
const port = 6523

app.use(bodyParser.json())
app.use(bodyParser.urlencoded({extended : true}))



const flag = "root@ctf{$CTf_i$_awes0me$!}"

app.get('/', (req,res)=>{


    res.setHeader('flag',flag)

    res.sendFile(__dirname+ '/views/index.html')
})

app.get('/register', (req,res) => {


    res.sendFile('views/register.html')
})
app.listen(port,'0.0.0.0' ,() => console.log('App Listening on port '+port))
