const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');
const loginForm = document.querySelector('.form-box.login');
const registerForm = document.querySelector('.form-box.register');
const registerOption = document.querySelector('.login-register p');

// Function to open the login form
function openLoginForm() {
    wrapper.classList.add('active-popup');
    loginForm.style.transform = 'translateX(0)';
    registerForm.style.transform = 'translateX(400px)';
    registerOption.style.display = 'block';
}

// Function to open the register form
function openRegisterForm() {
    wrapper.classList.add('active-popup');
    loginForm.style.transform = 'translateX(-400px)';
    registerForm.style.transform = 'translateX(0)';
    registerOption.style.display = 'none';
}

function closeLoginForm() {
    wrapper.classList.remove('active-popup');
    loginForm.style.transform = 'translateX(400px)';
}

// Event listeners for buttons and links
registerLink.addEventListener('click', () => {
    openRegisterForm();
    registerOption.style.display = 'block'; // Display the Register option when clicked
});

loginLink.addEventListener('click', openLoginForm);
btnPopup.addEventListener('click', openLoginForm);
iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
});

registerOption.addEventListener('click', () => {
    openRegisterForm();
});

registerOption.style.display = 'none'; // Hide the register option initially

// Function to validate email format
function validateEmail(email) {
    // Regular expression pattern for XXXXXXXXXX@mitwpu.com
    var emailPattern = /^[0-9]{10}@mitwpu\.edu\.in$/;

    // Test the email against the pattern
    return emailPattern.test(email);
}

// Function to handle form submission
function handleFormSubmission(event) {
    event.preventDefault(); // Prevent form submission for now

    // Get the input field values
    var name = document.querySelector('input[type="name"]').value;
    var email = document.querySelector('input[type="email"]').value;

    // Validate the email
    if (validateEmail(email)) {
        // Email is in correct format, you can proceed with further actions like authentication
        console.log("Email is valid:", email);
        // Perform authentication or any other action here
    } else {
        // Email is not in the correct format, display an error message
        alert("Please enter a valid email address in the format XXXXXXXXXX@mitwpu.edu.in");
    }
}

// Add event listener to the form for submission
document.querySelector('form').addEventListener('submit', handleFormSubmission);
