var express = require('express'),
    http = require('http');
var app = express();
var mysql  =  require("mysql");
var server = http.createServer(app);
var io = require('socket.io').listen(server, {'pingTimeout':4000, 'pingInterval':2000});
var users = {};

var pool    =    mysql.createPool({
    connectionLimit   :   100,
    host              :   'localhost',
    user              :   'root',
    password          :   '',
    database          :   'dev',
    debug             :   false
});

server.listen(3000, function(){
    console.log('listening on *:3000');
});

app.get('/', function(req, res){
    res.send('<h1>Server live</h1>');
    console.log('Server live');

});


io.on('connection', function(socket){



    socket.on('online',function(status){

        console.log('a user connected', status);

        users[parseInt(status)] = (new Date).toLocaleTimeString();

        set_status({'user':parseInt(status),'status':1},function(res){
            if(res){
                io.emit('connected');
            } else {
                io.emit('error');
            }
        });



        console.log(users);
    });


    socket.on('disconnect', function() {
/*
        set_status({'user':parseInt(status),'status':0},function(res){
            if(res){
                io.emit('disconnect');
            } else {
                io.emit('error');
            }
        });
*/
        console.log('a user disconnect');
    });


});


var set_status = function (status,callback) {
    pool.getConnection(function(err,connection){
        if (err) { callback(false); return;}

        connection.query("UPDATE `members` SET `online` = '"+status.status+"' WHERE `members`.`id` = '"+status.user+"'",function(err,rows){
            connection.release();
            if(!err) {
                callback(true);
            }
        });

           connection.on('error', function(err) {
            callback(false);
            return;
        });
    });
}

/*
http.listen(3000, function(){
    console.log('listening on *:3000');
});

*/