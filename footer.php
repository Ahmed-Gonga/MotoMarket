<a class="chatbot-icon" href="#">💬</a>
<footer class="footer"><p>© <?= date('Y'); ?> MotoMarket. Motorcycles & spare parts store.</p></footer><div id="chatBox" class="chat-box">
  <div class="chat-header">
    Moto Assistant
    <span onclick="toggleChat()" style="cursor:pointer">✖</span>
  </div>

  <div id="chatMessages" class="chat-messages">
    <div class="bot-msg">Hello! How can I help you?</div>
  </div>

  <div class="chat-input">
    <input type="text" id="userInput" placeholder="Type a message...">
    <button onclick="sendMessage()">Send</button>
  </div>
</div>

<a class="chatbot-icon" onclick="toggleChat()">💬</a>

<script>
function toggleChat() {
  const box = document.getElementById('chatBox');
  box.style.display = box.style.display === 'flex' ? 'none' : 'flex';
}

function sendMessage() {
  let input = document.getElementById('userInput');
  let msg = input.value.trim();
  if (msg === '') return;

  let messages = document.getElementById('chatMessages');
  messages.innerHTML += '<div class="user-msg">' + msg + '</div>';

  let lower = msg.toLowerCase();
  let reply = "Please contact support for more information.";

  if (lower.includes("price")) reply = "You can check prices on each product page.";
  if (lower.includes("motorcycle")) reply = "We sell Yamaha, Honda and Kawasaki motorcycles.";
  if (lower.includes("shipping")) reply = "Shipping takes 2-5 business days.";
  if (lower.includes("parts")) reply = "We sell oil, brake pads, helmets and spare parts.";

  messages.innerHTML += '<div class="bot-msg">' + reply + '</div>';
  input.value = '';
  messages.scrollTop = messages.scrollHeight;
}
</script>

</body></html>
