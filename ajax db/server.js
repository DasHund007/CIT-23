const express = require("express")
const bodyParser = require("body-parser")
const db = require("./db")

const app = express()
app.use(bodyParser.json())
app.use(express.static("public"))

app.post("/add", (req, res) => {
  const { value } = req.body
  db.query("INSERT INTO values_table (value) VALUES (?)", [value], err => {
    if (err) return res.status(500).json({ error: err })
    res.json({ success: true })
  })
})

app.get("/list", (req, res) => {
  db.query("SELECT * FROM values_table", (err, rows) => {
    if (err) return res.status(500).json({ error: err })
    res.json(rows)
  })
})

app.listen(3000, () => console.log("🚀 Server running on http://localhost:3000"))
