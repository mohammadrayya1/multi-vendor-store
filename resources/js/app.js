import './bootstrap';
import Alpine from 'alpinejs';
import Echo from "laravel-echo";

window.Alpine = Alpine;

Alpine.start();


var channel = window.Echo.private(`App.Models.User.${userID}`);
channel.notification(function(data) {
    console.log(data);
    alert(data.body);

});
