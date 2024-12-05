document.getElementById('registrationForm').addEventListener('submit', function (e) {
    // Get form fields
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('psw').value.trim();
    const gender = document.querySelector('input[name="gender"]:checked');

    // Email validation (basic regex check)
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        e.preventDefault();
        alert('Please enter a valid email address.');
        return;
    }

    // Password length validation
    if (password.length < 6) {
        e.preventDefault();
        alert('Password must be at least 6 characters long.');
        return;
    }

    // Gender selection validation
    if (!gender) {
        e.preventDefault();
        alert('Please select a gender.');
        return;
    }

    // If all validations pass
    alert('Form submitted successfully!');
});
