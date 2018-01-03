$(document).ready(function(){




    var socket = io.connect('http://vsi.dev:3000');
    socket.emit('online', $('header.tt-header.user').data('id'));



});
