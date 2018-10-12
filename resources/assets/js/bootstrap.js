import Echo from "laravel-echo";
import Pusher from 'pusher-js';


window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "Vsz0ocTWK7GOh6JGe7e_EIaZTRiLF-YndblLANIcVKI",
    cluster: "eu",
    encrypted: true
});