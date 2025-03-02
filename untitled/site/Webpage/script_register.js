// Example: Form Validation for Register Page
document.querySelector('form').addEventListener('submit', function (e) {
  const password = document.querySelector('input[type="password"]').value;
  const confirmPassword = document.querySelectorAll('input[type="password"]')[1].value;

  if (password !== confirmPassword) {
    e.preventDefault();
    alert('Passwords do not match!');
  }
});
