const express = require('express')
const mysql = require('mysql')

const app = express()

const connection = mysql.createConnection({
    host: 'ct-mysql',
    user: 'tux',
    password: 'Mud@r123',
    database: 'db_tux'
})

connection.connect()

app.get('/', function(req, res) {
    connection.query('SELECT * FROM produtos', function (error, results) {
        if (error) {
            throw error
        }

        res.send(results.map(item => ({ nome: item.nome, preco: item.preco }
            )))
    })
})

app.listen(9001, '0.0.0.0', function() {
    console.log('Listening on port 9001')
})
