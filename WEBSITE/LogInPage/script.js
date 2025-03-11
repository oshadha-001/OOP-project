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
        // Request permission to read/write a file
        const fileHandle = await window.showSaveFilePicker({
            suggestedName: 'user_registration.txt',
            types: [{
                description: 'Text Files',
                accept: { 'text/plain': ['.txt'] },
            }],
        });

        // Check if the file already exists
        let file = await fileHandle.getFile();
        let contents = await file.text();

        // Append new user data to the existing content
        const updatedContents = contents + userData;

        // Write the updated content back to the file
        const writable = await fileHandle.createWritable();
        await writable.write(updatedContents);
        await writable.close();

        alert('Registration successful! Data saved to user_registration.txt.');
    } catch (error) {
        console.error('Error saving file:', error);
        alert('Error saving file. Please try again.');
    }

    // Optionally, reset the form after saving
    this.reset();
});