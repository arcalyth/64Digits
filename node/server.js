var io = require('socket.io').listen(9090);
var http = require('http');
var url = require('url');
var querystring = require('querystring');
var mysql      = require('mysql');
var config = require("./config.js");

var connection = mysql.createConnection({
	host     : config.mysql_address,
	user     : config.mysql_username,
	password : config.mysql_password,
	database : config.mysql_database
});

var transaction = 0;

//Dictionary of sockets.
var socket_pool = [];

function postRequest(request, response, callback) {
    var queryData = "";
    if(typeof callback !== 'function') return null;

    if(request.method == 'POST') {
        request.on('data', function(data) {
            queryData += data;
            if(queryData.length > 1e6) {
                queryData = "";
                response.writeHead(413, {'Content-Type': 'text/plain'});
                request.connection.destroy();
            }
        });

        request.on('end', function() {
            response.post = querystring.parse(queryData);
            callback();
        });

    } else {
        response.writeHead(405, {'Content-Type': 'text/plain'});
        response.end();
    }
}


http.createServer(function (req, res) {
	var uri = url.parse(req.url).pathname;
	if (uri === "/emit.js"){
	
		postRequest(req, res, function() {
		/*
			console.log("Handler: "+res.post.handler);
			console.log("Broadcast: "+res.post.broadcast);
			*/
			var data = JSON.parse(res.post.broadcast);
			if (res.post.hasOwnProperty("url") || res.post.hasOwnProperty("user")){
				//URL restricted broadcast
				
				for(var index in socket_pool){
					var sent = false;
					
					/*Filter via PATH.*/
					if (res.post.hasOwnProperty("url")){
						console.log(data.url);
						if (res.post.url.match(socket_pool[index].path)){
							sent = true;
							socket_pool[index].socket.emit(res.post.handler, res.post.broadcast);
						}
					}
					
					/*Filter via User(s).*/
					if (!sent && res.post.hasOwnProperty("user")){
						if ( !socket_pool[index].guest && JSON.parse(res.post.user).indexOf(socket_pool[index].userid) != -1){
							socket_pool[index].socket.emit(res.post.handler, res.post.broadcast);
						}
					}
				}
			}else{
				//Global broadcast
				io.sockets.emit(res.post.handler, res.post.broadcast);
			}
			res.writeHead(200, {'Content-Type': 'text/plain'});
			res.end('{"receipt":'+transaction+'}');
			transaction++;
			
		});
	
	}else{
		res.writeHead(500, {'Content-Type': 'text/plain'});
		res.end();
	}
}).listen(9091,"127.0.0.1"); //Remove the 2nd parameter if you wish you use a REST kit to debug from a non-local machine.

io.sockets.on('connection', function (socket) {
	socket.on('auth', function (data) {
		if (data.guest){
			socket_pool.push({
				socketid: socket.id,
				socket:socket,
				path: data.path,
				auth: false
			});
		}else{
		console.log(data);
		
			connection.query("SELECT `id` FROM `users` WHERE `username` = "+connection.escape(data.username)+" AND `password` = "+connection.escape(data.authtoken)+" LIMIT 1", function(err, rows) {
				if (rows.length == 1){
					socket_pool.push({
						socketid: socket.id,
						socket:socket,
						path: data.path,
						auth: true,
						userid: rows[0].id
					});
				}else{
					socket_pool.push({
						socketid: socket.id,
						socket:socket,
						path: data.path,
						auth: false
					});
				}
			});
		}
	});
	
	socket.on('disconnect', function (data) {
		for(var index in socket_pool){
			if (socket_pool[index].socketid == socket.id){
				socket_pool.splice(index,1);
			}
		};
	});
});