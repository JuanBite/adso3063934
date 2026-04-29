const express = require('express')
const bcrypt = require('bcryptjs')
const cors = require('cors')
const jwt = require('jsonwebtoken')
const db = require('./database')
const auth = require('./authMiddleware')

const app = express()
app.use(express.json())
app.use(cors())

const SECRET_KEY = 'your_secret_key_here'

// AUTH ENDPOINTS

// POST Register
app.post('/register', async (req, res) => {
    const {username, password} = req.body
    const hashedPassword = await bcrypt.hash(password, 10)

    db.run(`INSERT INTO users (username, password)
        VALUES(?, ?)`, [username, hashedPassword], (err) => {
            if(err) return res.status(400).json({error: 'User already exists!'})
                res.json({message: 'User registered successfully!'})
            })
})

// POST Login

// MANGAS
// GET /mangas
app.get('/mangas', auth, (req, res) => {
    db.all(`SELECT * FROM mangas`, [], (err, rows) => {
        res.json(rows)
    })
})
// GET /mangas/:id
// PUT /mangas/:id
// DELETE /mangas/:id

app.listen(3000, () => console.log('Server started on port http://localhost:3000/'))
