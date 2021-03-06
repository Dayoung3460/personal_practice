// 실행할려면 터미널에 node index
// local:4000

let express = require('express')
let socket = require('socket.io')
let app = express()
let server = app.listen(4000, function() {
    console.log('listening to request on port 4000')
})

app.use(express.static('public'))

let io = socket(server)
io.on("connection", function(socket) {
    console.log('made socket connection', socket.id)
    socket.on('chat', function(data) {
        io.sockets.emit('chat', data)
    })
    socket.on('typing', function(data) {
        socket.broadcast.emit('typing', data)
    })


})