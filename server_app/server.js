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
    //console.log('Connected');
    socket.on('show_card', (message) => {
        console.log(message);
        io.sockets.emit('show_card', 'Show Data Now!');
    });

    socket.on('num_card', (message) => {
        if (message.uclass == 3) {
            sql = "select * from card_info where card_status <> '' AND card_status <> 'hidden' AND card_status IN('89da7d193f3c67e4310f50cbb5b36b90') AND card_type='0' AND title_types='com'";
        } else if (message.uclass == 33) {
            sql = "select * from card_info where card_status <> '' AND card_status <> 'hidden' AND card_status IN ('89da7d193f3c67e4310f50cbb5b36b90') AND card_type='0' AND title_types='office'";
        } else if (message.uclass == 4) {
            sql = "select * from card_info where card_status IN ('c382e352e2e620a3c60a2cc7c6a7fa35') AND card_type = '0'";
        } else {
            sql = "select * from card_info where card_status <> '' AND card_status <> 'hidden' AND card_status IN ('b1f4d8a6d50a01b4211fd877f7ae464f') AND card_type='0' AND card_customer_work_group='" + message.uwork_id + "' ";
        }
        connection.query(sql, function(err, rows, fields) {
            if (err) throw err
            console.log('Data', rows.length);
            io.emit('num_card', { count_all: rows.length });
        });
        io.emit('show_card', 'Show Data Now!');
    });

    socket.on('num_card_buy', (message) => {
        if (message.uclass == 3) {
            sql = "select * from card_info where card_status <> '' AND card_status <> 'hidden' AND card_status IN ('89da7d193f3c67e4310f50cbb5b36b90','4973069504e1be2a5bdcf7162ade8a16','5cd813fcceeb00544c19201a93ca6529') AND card_type='1' AND title_types='com'";
        } else if (message.uclass == 4) {
            sql = "select * from card_info where card_status IN ('89da7d193f3c67e4310f50cbb5b36b90','1ab320e61b53ff60c3cc5e635f2045f5','b1f4d8a6d50a01b4211fd877f7ae464f') AND card_type = '1'";
        } else {
            sql = "select * from card_info where card_status <> '' AND card_status <> 'hidden' AND card_status IN ('b1f4d8a6d50a01b4211fd877f7ae464f','5cd813fcceeb00544c19201a93ca6529') AND card_type='1' AND card_customer_work_group='" + message.uwork_id + "' ";
        }
        connection.query(sql, function(err, rows, fields) {
            if (err) throw err
            console.log('Data', rows.length);
            io.emit('num_card_buy', { count_all: rows.length });
        });
        io.emit('show_card', 'Show Data Now!');
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