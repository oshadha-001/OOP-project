// Add an event listener to the form for the 'submit' event
document.getElementById('registerForm').addEventListener('submit', async function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Get form data
    const username = document.querySelector('input[name="username"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;
    const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

    // Validate password match
    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
    }

    // Create a string with the user data
    const userData = `Username: ${username}\nEmail: ${email}\nPassword: ${password}\n\n`;

    try {
        // Request permission to save a file
        const fileHandle = await window.showSaveFilePicker({
            suggestedName: 'user_registration.txt', // Default file name
            types: [{
                description: 'Text Files', // File type description
                accept: { 'text/plain': ['.txt'] }, // Accept only .txt files
            }],
        });

        // Write the new user data to the file (overwriting existing content)
        const writable = await fileHandle.createWritable();
        await writable.write(userData); // Write the new data
        await writable.close(); // Close the writable stream

        alert('Registration successful! Data saved to user_registration.txt.');
    } catch (error) {
        console.error('Error saving file:', error);
        alert('Error saving file. Please try again.');
    }

    // Reset the form after saving
    this.reset();
});