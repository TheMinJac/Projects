let mysql      = require('mysql');
let connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'testdb'
});

connection.connect();

module.exports = connection