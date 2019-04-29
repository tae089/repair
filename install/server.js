const io = require('socket.io')(8080);

io.on('connection', (socket) => {
    console.log('Connected');
    socket.on('new_card', (message) => {
        console.log(message);
        //socket.broadcast.emit('show', 'Show Data Now!');
    });

    socket.on('delect_card', (message) => {
        console.log(message);
        io.emit('show_card', 'Delect Data Now!');
    });
    //Whenever someone disconnects this piece of code executed
    // socket.on('disconnect', () => {
    //     console.log('A user disconnected');
    // });

});