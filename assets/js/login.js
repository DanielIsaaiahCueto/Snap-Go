const toggleButton = document.querySelector('.toggle-button');
const passwordInput = document.getElementById('password');

toggleButton.addEventListener('click', function() {
   if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleButton.textContent = 'Hide';
   } else {
      passwordInput.type = 'password';
      toggleButton.textContent = 'Show';
   }
});