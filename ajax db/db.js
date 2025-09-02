const mysql = require("mysql2")
require("dotenv").config()

const connection = mysql.createConnection({
  host: process.env.MYSQL_HOST || "localhost",
  user: process.env.MYSQL_USER || "root",
  password: process.env.MYSQL_PASSWORD || "",
  database: process.env.MYSQL_DATABASE || "ajax"
})

connection.connect(err => {
  if (err) throw err
  console.log("✅ MySQL connected")
})

module.exports = connection
