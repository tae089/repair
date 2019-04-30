const io = require('socket.io')(8080);

io.on('connection', (socket) => {
    console.log('Connected');
    socket.on('show_card', (message) => {
        console.log(message);
        io.sockets.emit('show_card', 'Show Data Now!');
        io.sockets.emit('num_card', 'Count card.');
    });

    socket.on('new_card', (message) => {
        console.log(message);
        io.sockets.emit('show_card', 'Show Data Now!');
    });

    // socket.on('count_card', (message) => {
    //     console.log(message);
    //     io.sockets.emit('num_card', 'Count card');
    // });

    socket.on('delect_card', (message) => {
        console.log(message);
        io.sockets.emit('show_card', 'Show Delect Data Now!');
    });
    //Whenever someone disconnects this piece of code executed
    // socket.on('disconnect', () => {
    //     console.log('A user disconnected');
    // });

});