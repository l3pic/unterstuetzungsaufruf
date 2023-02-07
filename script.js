const logreg_div = document.getElementById('logreg_div');
const logreg_close_btn = document.getElementById('logreg_close_btn');
const login_btn = document.getElementById('login_btn');
const register_btn = document.getElementById('register_btn');
const login_profile = document.getElementById('login_profile');

const login_close_btn = document.getElementById('login_close_btn');
const login_div = document.getElementById('login_div');
const login_form = document.getElementById('login_form');
const login_email = document.getElementById('login_email');
const login_pass = document.getElementById('login_pass');
const login_error = document.getElementById('login_error');

const register_close_btn = document.getElementById('register_close_btn');
const register_div = document.getElementById('register_div');
const register_form = document.getElementById('register_form');
const register_error = document.getElementById('register_error');
const register_pass = document.getElementById('register_pass');
const register_confirm_pass = document.getElementById('register_confirm_pass');

const userinfo_close_btn = document.getElementById('userinfo_close_btn');

//Boolean Variablen für die Sichtbarkeit von Anmelde- und Registrierungsformular

let logreg_shown = false;
let login_shown = false;
let register_shown = false;
let userinfo_shown = false;

//Logged_in Boolean definieren
let logged_in = false;

// Logged_in Boolean per AJAX request von get-logged-in.php holen
$.ajax({
    url: 'get-logged-in.php',
    type: 'GET',
    success: function (data) {
        if (data === 'true') {
            logged_in = true;
        } else {
            logged_in = false;
        }
    }
});

//Öffne Anmeldeformular Buttons

login_profile.onclick = function () {
    if(!logreg_shown && !login_shown && !register_shown && !logged_in) {
        logreg_div.style.transform = "translateX(-320px)";
        logreg_shown = true;
    } else if (logreg_shown) {
        logreg_div.style.transform = "translateX(320px)";
        logreg_shown = false;
    } else if (login_shown) {
        login_div.style.transform = "translateX(320px)";
        login_shown = false;
    } else if (register_shown) {
        register_div.style.transform = "translateX(320px)";
        register_shown = false;
    }else if (logged_in && !userinfo_shown) {
        userinfo_div.style.transform = "translateX(-320px)";
        userinfo_shown = true;
    } else if (logged_in && userinfo_shown) {
        userinfo_div.style.transform = "translateX(320px)";
        userinfo_shown = false;
    }
}

login_btn.onclick = function () {
    logreg_div.style.transform = "translateX(320px)";
    logreg_shown = false;
    login_div.style.transform = "translateX(-320px)";
    login_shown = true;
}

register_btn.onclick = function () {
    logreg_div.style.transform = "translateX(320px)";
    logreg_shown = false;
    register_div.style.transform = "translateX(-320px)";
    register_shown = true;
}

//Buttons zum Schließen von Anmelde- und Registrierungsformular

logreg_close_btn.onclick = function () {
    logreg_div.style.transform = "translateX(320px)";
    logreg_shown = false;
}

login_close_btn.onclick = function () {
    login_div.style.transform = "translateX(320px)";
    login_shown = false;
}

register_close_btn.onclick = function () {
    register_div.style.transform = "translateX(320px)";
    register_shown = false;
}

userinfo_close_btn.onclick = function () {
    userinfo_div.style.transform = "translateX(320px)";
    userinfo_shown = false;
}

//Überprüfen der Eingabefelder Login und Registrierung

//Emailüberprüfung
// Erklärung des expression patterns https://docs.google.com/document/d/1bnZIgZ-Teiny_rbmg3k02HNDTIsMM4v9BWy9K3Gny-c/edit?usp=sharing

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

login_form.onsubmit = function (e) {
    let input = document.getElementById('login_email').value;
    if (!validateEmail(input)) {
        login_error.innerText = "E-Mail-Adresse nicht gültig!";
        e.preventDefault();
        return;
    } 
    
    if (login_pass.value.length < 5) {
        login_error.innerText = "Passwort muss mindestens 5 Zeichen lang sein!";
        e.preventDefault();
        return;
    }
}

register_form.onsubmit = function (e) {
    let input = document.getElementById('register_email').value;
    if (!validateEmail(input)) {
        register_error.innerText = "E-Mail-Adresse nicht gültig!";
        e.preventDefault();
        return;
    }

    if (register_pass.value.length < 5) {
        register_error.innerText = "Passwort muss mindestens 5 Zeichen lang sein!";
        e.preventDefault();
        return;
    }

    if (register_pass.value !== register_confirm_pass.value) {
        register_error.innerText = "Passwörter stimmen nicht überein!";
        e.preventDefault();
        return;
    }
}