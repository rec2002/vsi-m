var express = require('express'),
    http = require('http');
var app = express();
var mysql  =  require("mysql");
var server = http.createServer(app);
var io = require('socket.io').listen(server, {'pingTimeout':4000, 'pingInterval':2000});
var users = {};
var str2json = require('string-to-json');

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
    mysql_query("UPDATE `members` SET `online` = '0' WHERE `members`.`id` > 0 ",function(res){
        if(res) console.log('Disconnect all users');
    });

});

app.get('/', function(req, res){
    res.send('<h1>Server live</h1>');
    console.log('Server live');

});


io.on('connection', function(socket){



    socket.on('online',function(data){

        var data = str2json.convert(data);
        console.log('---a user '+data.member+' connected---');

        users[parseInt(data.member)] = { suggestion_id:data.suggestion_id, support:data.support, time: Math.floor(Date.now()), status : 1, token:socket.id};
        mysql_query("UPDATE `members` SET `online` = '1' WHERE `members`.`id` = '"+data.member+"'  LIMIT 1",function(res){
            if(!res) console.log('Mysql Error');
        });
        console.log(users);
    });


    socket.on('disconnect', function() {
        var current_id = '';
        for (key in users) {
            if (users[key].token==socket.id) {
                users[key].status = 0;
                current_id = key;

                setTimeout(function(){
                    if (users[current_id].status==0) {
                        mysql_query("UPDATE `members` SET `online` = '0' WHERE `members`.`id` = '"+current_id+"' LIMIT 1",function(res){
                            if(!res){
                                console.log('Mysql Error');
                            } else {
                                console.log('---a user '+current_id+' disconnected---');
                                delete users[current_id];
                            }
                        });
                    }
                }, 3000);
            }
        }
    });


    socket.on('msg',function(msg){


        var msg = str2json.convert(msg);

        console.log(msg);
        //console.log(JSON.parse(msg));

        console.log('---------------------------');
        console.log(users);


        console.log(msg.member);




        console.log('---------------------------');
        if (msg.support==0) {
            mysql_query("SELECT s.id as suggestion_id, if ('" + msg.member + "'=m.id, m1.id, m.id) as member_id FROM `member_suggestion` s LEFT JOIN `member_suggestion_approved` a ON s.id = a.suggestion_id LEFT JOIN `members` m ON s.member_id = m.id LEFT JOIN `orders` o ON s.order_id = o.id LEFT JOIN `members` m1 ON o.member = m1.id  WHERE a.id IS NOT NULL AND s.id='" + msg.suggestion_id + "' AND (m.id='" + msg.member + "' OR m1.id='" + msg.member + "') LIMIT 1", function (res) {
                if (res) {

                    for (key in users) {
                        if (key == res[0].member_id) {

                            io.sockets.connected[users[key].token].emit('msg', {msg: msg.msg, suggestion_id:res[0].suggestion_id, support:0});
                            if (users[key].suggestion_id==res[0].suggestion_id && users[key].support==0){
                                mysql_query("DELETE FROM `member_msg_unread` WHERE `id` = '" + msg.id_unread + "' LIMIT 1", function (res_) {
                                    if (res_) {
                                        GetUnreadTotal(res[0].member_id, users[key].token);
                                    }
                                });
                            } else{
                                GetUnreadTotal(res[0].member_id, users[key].token);
                            }
                        }
                    }


                    console.log(res[0].suggestion_id);
                    console.log(users);
                } else {
                    console.log('Mysql Error');
                }
            });
        } else if (msg.support==1) {


        }



    });



});


var mysql_query = function (sql,callback) {
    pool.getConnection(function(err,connection){
        if (err) { callback(false); return;}

        connection.query(sql,function(err,rows){
            connection.release();
            if(!err) {
                callback(rows);
            }
        });

        connection.on('error', function(err) {
            callback(false);
            return;
        });
    });
}

function GetUnreadTotal(id, token) {
    mysql_query("SELECT m.suggestion_id as id, count(m.suggestion_id) as counts, '0' as support FROM `member_msg_unread` u LEFT JOIN `member_msg` m ON m.id = u.msg_id WHERE u.member_id='"+id+"' AND m.suggestion_id IS NOT NULL GROUP BY m.suggestion_id UNION SELECT m.ticket_id as id, count(m.ticket_id) as counts, '1' as support FROM `member_msg_unread` u LEFT JOIN `member_msg` m ON m.id = u.msg_id WHERE u.member_id='"+id+"' AND m.ticket_id IS NOT NULL GROUP BY m.ticket_id ", function (res) {
        if (res) {
            var result = counts = {};
            var total = 0;
            for (key in res) {
                counts[res[key].id] = {counts:res[key].counts, support:res[key].support};
                total += res[key].counts;
            }
            io.sockets.connected[token].emit('GetUnreadTotal', {total:total, counts:counts});
        }
    });

}

/*

 io.sockets.connected[socketid].emit(); OR
 io.eio.clients[socketid].emit(); OR
 io.engine.clients[socketid].emit();

*/