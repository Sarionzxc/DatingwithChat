function sendMessage() {
    var messageInput = document.getElementById('message-input');
    var message = messageInput.value;
    if (message.trim() !== '') {
        appendMessage('You', message);
        saveMessageToDatabase('You', message);
        messageInput.value = '';
        // Simulate receiving a message after a delay
        setTimeout(function() {
            appendMessage('User', 'Hi there!');
            saveMessageToDatabase('User', 'Hi there!');
        }, 1000);
    }
}

function appendMessage(sender, message) {
    var chatContainer = document.getElementById('chat-container');
    var messageElement = document.createElement('div');
    messageElement.classList.add('message');
    messageElement.innerHTML = '<strong>' + sender + ':</strong> ' + message;
    chatContainer.appendChild(messageElement);
    // Scroll to the bottom to show the latest message
    chatContainer.scrollTop = chatContainer.scrollHeight;
}

function saveMessageToDatabase(sender, message) {
    // Use AJAX or fetch to send a request to your PHP script to save the message to the database
    // Example using fetch:
    fetch('save_message.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            sender: sender,
            message: message,
        }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Message saved to the database:', data);
    })
    .catch(error => {
        console.error('Error saving message to the database:', error);
    });
}
