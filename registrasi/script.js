let inputPassword = document.querySelector('.hero .container .daftar .form .inputPassword .input-group .form-control');
let tombol1 = document.querySelector('.hero .container .daftar .form .inputPassword .input-group .input-group-text');
let tombol1Warna = document.querySelector('.hero .container .daftar .form .inputPassword .input-group .input-group-text svg');


let conPassword = document.querySelector('.hero .container .daftar .form .confirmPassword .input-group .form-control');
let tombol2 = document.querySelector('.hero .container .daftar .form .confirmPassword .input-group .input-group-text');
let tombol2Warna = document.querySelector('.hero .container .daftar .form .confirmPassword .input-group .input-group-text svg');



tombol1.addEventListener('click', function() {
    if (inputPassword.type === 'password') {
        inputPassword.type = 'text';
        tombol1Warna.classList.toggle('muncul')
    } else {
        inputPassword.type = 'password';
        tombol1Warna.classList.toggle('muncul')
    }
})


tombol2.addEventListener('click', function() {
    if (conPassword.type === 'password') {
        conPassword.type = 'text';
        tombol2Warna.classList.toggle('muncul')
    } else {
        conPassword.type = 'password';
        tombol2Warna.classList.toggle('muncul')
    }
})