document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get form values
    let username = document.querySelector("input[name='username']").value;
    let email = document.querySelector("input[name='email']").value;
    let password = document.querySelector("input[name='password']").value;
    let confirmPassword = document.querySelector("input[name='confirm_password']").value;

    // Validate passwords match
    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return;
    }

    // Get existing users from localStorage or create an empty array
    let users = JSON.parse(localStorage.getItem("users")) || [];

    // Check if username or email is already registered
    let existingUser = users.find(user => user.username === username || user.email === email);
    if (existingUser) {
        alert("Username or Email already registered!");
        return;
    }

    // Add new user to the array
    users.push({ username, email, password });

    // Save updated users array in localStorage
    localStorage.setItem("users", JSON.stringify(users));

    alert("Registration successful! You can now log in.");
    window.location.href = "login.html"; // Redirect to login page
});
