//Header
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

//Spenden Seite
const paypal_info = document.getElementById('paypal_info');
const kartenzahlung_info = document.getElementById('kartenzahlung_info');
const ueberweisung_info = document.getElementById('ueberweisung_info');
const paypal_radio = document.getElementById('paypal_radio');
const kartenzahlung_radio = document.getElementById('kartenzahlung_radio');
const ueberweisung_radio = document.getElementById('ueberweisung_radio');
const spenden_form = document.getElementById('spenden_form');
const spenden_inhaber = document.getElementById('spenden_inhaber');
const spenden_iban = document.getElementById('spenden_iban');
const spenden_betrag = document.getElementById('spenden_betrag');
const ueberweisung_error = document.getElementById('ueberweisung_error');
const betrag_error = document.getElementById('betrag_error');
const sachspende_radio = document.getElementById('sachspende_radio');
const sachspende_info = document.getElementById('sachspende_info');
const spenden_betrag_input = document.getElementById('spenden_betrag_input');
const sachspende_auswahl_input = document.getElementById('sachspende_auswahl_input');
const sachspende_auswahl = document.getElementById('sachspende_auswahl');
const sachspende_error = document.getElementById('sachspende_error');

//Projekte Seite
const projekte_forms = document.getElementsByClassName("grid-projekt");
const projekte_error = document.getElementById('projekte_error');

//Startseite Seite
const grid_news_btn = document.getElementById('grid_news_btn');
const grid_news_text = document.getElementById('grid_news_text');
const news_btn = document.getElementById('news_btn');

//Boolean Variablen für die Sichtbarkeit von Anmelde- und Registrierungsformular

let logreg_shown = false;
let login_shown = false;
let register_shown = false;
let userinfo_shown = false;

//Variable für logged_in 
let logged_in = false;

// Logged_in Boolean per AJAX request von get-logged-in.php holen
$.ajax({
  url: './ajax-php-files/get-logged-in.php',
  type: 'GET',
  success: function (data) {
    if (data === 'true') {
      logged_in = true;
    } else {
      logged_in = false;
    }
  }
});

// login_error_msg string per AJAX request von get-login-error.php holen und überprüfen

$.ajax({
  url: './ajax-php-files/get-login-error.php',
  type: 'GET',
  success: function (data) {
    data = data.replace(/"/g, "")
    if(data != "") {
      login_div.style.transform = "translateX(-320px)";
      login_shown = true;
      login_error.innerText = data;
    }
  }
}); 

// register_error_msg string per AJAX request von get-register-error.php holen und überprüfen
$.ajax({
  url: './ajax-php-files/get-register-error.php',
  type: 'GET',
  success: function (data) {
    data = data.replace(/"/g, "")
    if(data != "") {
      register_div.style.transform = "translateX(-320px)";
      register_shown = true;
      register_error.innerText = data;
    }
  }
});

//Erklärung .replace(/"/g, "")
// Das Zeichen " muss von den // eingeschlossen werden damit es interpretiert werden kann 
//g steht für global und sorgt dafür das alle zeichen ersetzt werden.

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
    //error message löschen
    $.ajax({
      url: "./ajax-php-files/clear-login-error.php",
      type: "GET"
    });
    login_error.innerText = "";
  } else if (register_shown) {
    register_div.style.transform = "translateX(320px)";
    register_shown = false;
    //error message löschen
    $.ajax({
      url: "./ajax-php-files/clear-register-error.php",
      type: "GET"
    });
    register_error.innerText = "";
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
  //error message löschen
  $.ajax({
    url: "./ajax-php-files/clear-login-error.php",
    type: "GET"
  });
  login_error.innerText = "";
}

register_close_btn.onclick = function () {
  register_div.style.transform = "translateX(320px)";
  register_shown = false;
  //error message löschen
  $.ajax({
    url: "./ajax-php-files/clear-register-error.php",
    type: "GET"
  });
  register_error.innerText = "";
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

//News interagierbarkeit
if(grid_news_btn != null) {
  news_btn.onclick = function () {
    grid_news_btn.classList.add("hide");
    grid_news_text.classList.remove("hide");
  }
}

if(grid_news_text != null) {
  grid_news_text.onclick = function () {
    grid_news_text.classList.add("hide");
    grid_news_btn.classList.remove("hide");
  }
}

//Zahlungsmethoden
if (paypal_radio != null)
paypal_radio.onclick = function () {
  paypal_info.classList.remove('hide');
  spenden_betrag_input.classList.remove('hide');
    
  if (!sachspende_auswahl_input.classList.contains('hide')) {
    sachspende_auswahl_input.classList.add('hide');
  }

  if (!ueberweisung_info.classList.contains('hide')) {
    ueberweisung_info.classList.add('hide');
  }
  if (!kartenzahlung_info.classList.contains('hide')) {
    kartenzahlung_info.classList.add('hide');
  }
  if (!sachspende_info.classList.contains('hide')) {
    sachspende_info.classList.add('hide');
  }
}

if (kartenzahlung_radio != null)
kartenzahlung_radio.onclick = function () {
  kartenzahlung_info.classList.remove('hide');
  spenden_betrag_input.classList.remove('hide');
    
  if (!sachspende_auswahl_input.classList.contains('hide')) {
    sachspende_auswahl_input.classList.add('hide');
  }

  if (!paypal_info.classList.contains('hide')) {
    paypal_info.classList.add('hide');
  }
  if (!ueberweisung_info.classList.contains('hide')) {
    ueberweisung_info.classList.add('hide');
  }
  if (!sachspende_info.classList.contains('hide')) {
    sachspende_info.classList.add('hide');
  }
}

if (ueberweisung_radio!= null)
ueberweisung_radio.onclick = function () {
  ueberweisung_info.classList.remove('hide');
  spenden_betrag_input.classList.remove('hide');
    
  if (!sachspende_auswahl_input.classList.contains('hide')) {
    sachspende_auswahl_input.classList.add('hide');
  }

  if (!paypal_info.classList.contains('hide')) {
    paypal_info.classList.add('hide');
  }
  if (!kartenzahlung_info.classList.contains('hide')) {
    kartenzahlung_info.classList.add('hide');
  }
  if (!sachspende_info.classList.contains('hide')) {
    sachspende_info.classList.add('hide');
  }
}

if (sachspende_radio!= null)
sachspende_radio.onclick = function () {
  sachspende_info.classList.remove('hide');
  sachspende_auswahl_input.classList.remove('hide');

  if(!spenden_betrag_input.classList.contains('hide')) {
    spenden_betrag_input.classList.add('hide');
  }
    
  if (!paypal_info.classList.contains('hide')) {
    paypal_info.classList.add('hide');
  }
  if (!kartenzahlung_info.classList.contains('hide')) {
    kartenzahlung_info.classList.add('hide');
  }
  if (!ueberweisung_info.classList.contains('hide')) {
    ueberweisung_info.classList.add('hide');
  }
}

if (spenden_betrag != null)
spenden_betrag.addEventListener("focusout", function(e) {
  if(spenden_betrag.value.length > 0) {
    var value = spenden_betrag.value.replace(/\D/g, "");
    var formattedValue = value.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    spenden_betrag.value = formattedValue + " €";
  }
});

//Erklärung .replace((\d)(?=(\d\d\d)+(?!\d)))
//durch \d wird nach einer Ziffer gesucht 
//durch ?= wird nach dem Vorhandensein mindestens drei weiterer Ziffern gesucht (\d\d\d)
//welche nicht von einer weiteren Ziffer gefolgt werden (?!\d)

if(spenden_form != null)
spenden_form.onsubmit = function (e) {
  if(!sachspende_radio.checked){
    if(spenden_betrag.value.length <= 0) {
      betrag_error.innerText = "Bitte geben Sie Ihren Betrag ein!";
      e.preventDefault();
    }
  }else {
    if(sachspende_auswahl.value.length <= 0) {
      sachspende_error.innerText = "Bitte wählen Sie eine Sachspende aus oder geben Sie eine eigene Spende an";
      e.preventDefault();
    }
  }

  if(ueberweisung_radio.checked) {
    if(spenden_inhaber.value.length <= 0 || spenden_iban.value.length <= 0) {
      e.preventDefault();
      ueberweisung_error.innerText = "Bitte alle Felder ausfüllen!";
    }
  }
}


//Projekte weiterleitung zur spenden seite
//jeder projekt form einen eventlistener geben
Array.from(projekte_forms).forEach(function (form) {
  form.onsubmit = function (e) {
    if (!logged_in) {
      e.preventDefault();
      if(projekte_error.classList.contains('hide')){
        projekte_error.classList.remove("hide");
        setTimeout(function() {
          projekte_error.classList.add("hide");
        }, 3000);
      }
    }
  }
});

