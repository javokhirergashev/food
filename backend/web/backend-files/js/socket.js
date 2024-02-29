// WebSocket client in JavaScript
const socket = new WebSocket('ws://localhost:8080');

socket.addEventListener('open', (event) => {
    console.log('WebSocket connection opened');
    // You can send messages here
});

socket.addEventListener('message', (event) => {
    console.log('Message received:', event.data);

    const jsonObject = JSON.parse(event.data);


    // location.reload()
    // Check if you want to reload the page based on the received message
    if (jsonObject.data == "page") {
        window.location.href = 'http://localhost:5050/user'
    }
});

socket.addEventListener('close', (event) => {
    console.log('WebSocket connection closed');
});

socket.addEventListener('error', (event) => {
    console.error('WebSocket error:', event);
});
