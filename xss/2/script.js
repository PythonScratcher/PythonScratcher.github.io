const messagesEl = document.querySelector('.messages')

const addMessage = () => {
  const inputEl = document.querySelector('input')
  
  messagesEl.innerHTML = messagesEl.innerHTML + '<div class="message">- '+inputEl.value+'</div>'
  
}

const response = () => {
  messagesEl.innerHTML = messagesEl.innerHTML + "<div class='message'>+- </div>"
}