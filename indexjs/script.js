
// Script to handle chat box interaction
document.getElementById('send-button').addEventListener('click', sendMessage);

function sendMessage() {
    const userInput = document.getElementById('user-input').value;
    if (userInput.trim() === '') return;

    // Display user's message in the chat log
    const chatLog = document.getElementById('chat-log');
    chatLog.innerHTML += `<p><strong>You:</strong> ${userInput}</p>`;

    // Clear the input field
    document.getElementById('user-input').value = '';

    // Send user's message to the server
    fetch('/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ message: userInput })
    })
    .then(response => response.json())
    .then(data => {
        // Display server's response in the chat log
        chatLog.innerHTML += `<p><strong>Gemini:</strong> ${data.reply}</p>`;
        chatLog.scrollTop = chatLog.scrollHeight;  // Scroll to the bottom of chat log
    })
    .catch(error => console.error('Error:', error));
}




    let nav = document.querySelector(".navbar");
window.onscroll = function() {
    if(document.documentElement.scrollTop > 100){
        nav.classList.add("header-scrolled");
    }else{
        nav.classList.remove("header-scrolled"); 
    }
}

// nav hide  
let navBar = document.querySelectorAll(".nav-link");
let navCollapse = document.querySelector(".navbar-collapse.collapse");
navBar.forEach(function(a){
    a.addEventListener("click", function(){
        navCollapse.classList.remove("show");
    })
})
