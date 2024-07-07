alert('Default username = admin \nDefault password = 123')


let inputPassword = document.querySelector('.bg .row .login .form .inputPassword .input-group .form-control');
let tombol1 = document.querySelector('.bg .row .login .form .inputPassword .input-group .input-group-text ');
let tombol1Warna = document.querySelector('.bg .row .login .form .inputPassword .input-group .input-group-text  svg');


tombol1.addEventListener('click', function() {
    if (inputPassword.type === 'password') {
        inputPassword.type = 'text';
        tombol1Warna.classList.toggle('muncul')
    } else {
        inputPassword.type = 'password';
        tombol1Warna.classList.toggle('muncul')
    }
})