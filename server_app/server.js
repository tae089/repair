const io = require('socket.io')(8080);
const mysql = require('mysql');
var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '0847890084',
    database: 'repair'
})

connection.connect()

io.on('connection', (socket) => {
    console.log('Connected');
    socket.on('show_card', (message) => {
        console.log(message);
        message.uclass == 3 ? sql = "select * from card_info where card_status <> '' AND card_status <> 'hidden'" : sql = "select * from card_info where card_status <> '' AND card_status <> 'hidden' AND card_customer_work_group='" + message.uwork_id + "' ";
        connection.query(sql, function(err, rows, fields) {
            if (err) throw err

            console.log('Data', rows.length);
            io.emit('num_card', { count_all: rows.length });
        });
        //io.emit('show_card', 'Show Data Now!');

    });

    socket.on('delect_card', (message) => {
        console.log(message);
        io.sockets.emit('show_card', 'Show Delect Data Now!');
    });

    //Whenever someone disconnects this piece of code executed
    // socket.on('disconnect', () => {
    //     console.log('A user disconnected');
    // });

});