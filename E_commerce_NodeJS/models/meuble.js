let connection = require("../config/db")

class Meuble {

    constructor (row){

     this.row = row

}

    get id () {
        return this.row.id
    }

    get content() {
     return this.row.content
    }

    get create_at() {
     return moment(this.row.create_at)
    }

    static find (id, cb){
        connection.query('SELECT * FROM messages WHERE id = ? LIMIT 1', [id], (err, rows) => {
            if (err) throw err

          cb(new Meuble(rows[0]))//commentaire
        })
    }

    static create (content, cb){
        connection.query('INSERT INTO messages SET content = ?, create_at = ?', [content, new Date()], (err, result) => {
            if (err) throw err
            cb(result)

        })
    }

     static all (cb){
        connection.query('SELECT * FROM messages', (err, rows) => {
            if (err) throw err

            cb(rows.map((row) => new Message(row)))
        })
        }

}

module.exports = Meuble