const pwdField = document.querySelector(".form input[type='password']");
const pwdToggleBtn = document.querySelector(".form .field i");

pwdToggleBtn.onclick = ()=> {
    if (pwdField.type == 'password') {
        pwdField.type = 'text';
        pwdToggleBtn.classList.add('active');
    } else {
        pwdField.type = 'password';
        pwdToggleBtn.classList.remove('active');
    }
}