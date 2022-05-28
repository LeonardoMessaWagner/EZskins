async function connect() {
    if(global.connection && global.connection.state !== 'disconnected') {
        return global.connection;
    }
    const mysql = require("mysql2/promise");
    const connection = await mysql.createConnection("mysql://root:root@localhost:3306/teste_banco");
    global.connection = connection;
    return "Conectou";
}
connect();
module.exports = {}