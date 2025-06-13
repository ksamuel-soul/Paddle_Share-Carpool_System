// Function to send message
function sendMessage() {
    var userInput = document.getElementById("user-input").value;
    if (userInput.trim() === "") return;

    // Display the user's message
    displayMessage(userInput, "user");

    // Get chatbot response
    var botResponse = getBotResponse(userInput);

    // Display the bot's message after a short delay
    setTimeout(function() {
        displayMessage(botResponse, "bot");
    }, 500);

    // Clear the input field
    document.getElementById("user-input").value = "";
}

// Function to display messages in the chat box
function displayMessage(message, sender) {
    var chatBox = document.getElementById("chat-box");
    if (!chatBox) { //Check if chatBox exists. If not, create it.
        chatBox = document.createElement("div");
        chatBox.id = "chat-box";
        document.getElementById("chat-container").appendChild(chatBox);
    }
    var messageDiv = document.createElement("div");
    messageDiv.classList.add(sender);
    messageDiv.textContent = message;
    chatBox.appendChild(messageDiv);

    // Scroll to the bottom of the chat box
    chatBox.scrollTop = chatBox.scrollHeight;
}

// Function to generate bot responses
function getBotResponse(userInput) {
    userInput = userInput.toLowerCase();

    // Simple bot responses
    if (userInput.includes("hello") || userInput.includes("hi"))
    {
        return "Hello! How can I help you today?";
    }
    else if (userInput.includes("how are you"))
    {
        return "I'm just a bot, but I'm doing well. How about you?";
    }
    else if (userInput.includes("your name"))
    {
        return "I am a Emili created to help you!";
    }
    else if (userInput.includes("bye"))
    {
        return "Goodbye! Have a great day!";
    } 
    else
    {
        return "Sorry, I didn't understand that. Could you please ask something else?";
    }
}

// Function to toggle the visibility of the chat container
function toggleChat() {
    var chatContainer = document.getElementById("chat-container");
    var chatIcon = document.getElementById("chat-icon");

    // Toggle chat window visibility
    if (chatContainer.style.display === "none" || chatContainer.style.display === "") {
        chatContainer.style.display = "flex"; // Show chat container
        chatIcon.style.display = "none"; // Hide chat icon when chat is open
        // Send the initial greeting message
        displayMessage("Hello Iam Emili..!!!", "bot");
    } else {
        chatContainer.style.display = "none"; // Hide chat container
        chatIcon.style.display = "flex"; // Show chat icon again
    }
}

// Close the chat container if the user clicks outside of it
document.addEventListener("click", function(event) {
    var chatContainer = document.getElementById("chat-container");
    var chatIcon = document.getElementById("chat-icon");

    // Check if the click is outside the chat container and icon
    if (!chatContainer.contains(event.target) && !chatIcon.contains(event.target)) {
        chatContainer.style.display = "none"; // Close the chat container
        chatIcon.style.display = "flex"; // Show chat icon again
    }
});