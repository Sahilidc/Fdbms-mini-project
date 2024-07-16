var email = document.forms['form']['email'];
var password = document.forms['form']['password'];

var email_error = document.getElementById('email_error');
var pass_error = document.getElementById('pass_error');

email.addEventListener('textInput', email_Verify);
password.addEventListener('textInput', pass_Verify);

function validated(){
    if (email.value !== "admin44567@gmail.com" || password.value !== "123456789") {
        email.style.border = "1px solid black";
        password.style.border = "1px solid black";
        email_error.style.display = "block";
        pass_error.style.display = "block";
        email.focus();
        return false;
    }
    return true;
}

function email_Verify(){
    if (email.value === "admin44567@gmail.com") {
        email.style.border = "1px solid silver";
        email_error.style.display = "none";
        return true;
    }
}

function pass_Verify(){
    if (password.value === "123456789") {
        password.style.border = "1px solid silver";
        pass_error.style.display = "none";
        return true;
    }
}
