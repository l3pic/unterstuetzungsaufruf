<head>
    <script src="script.js" defer></script>
</head>
<header>
  <div class="h-logo">
    <img src="./bilder/logo.png" alt="Logo" onclick="window.location.href='./index.php'">
  </div>
  <div class="h-main">
    <img src="./bilder/logo_name.png" alt="Logoname" onclick="window.location.href='./index.php'">
    <span onclick="window.location.href='./index.php'">Stiftung</span>
  </div>
  <div class="h-login">
    <img src="./bilder/login.png" alt="Login" id="login_profile">
  </div>
  <!-- Auswahl Anmelden/Registrieren -->
  <div class="form" id="logreg_div">
    <button class="form-close-btn" id="logreg_close_btn">x</button>
    <button class="form-btn" id="login_btn">Anmelden</button>
    <button class="form-btn" id="register_btn">Registrieren</button>
  </div>
  <!-- Anmeldeformular -->
  <div class="form" id="login_div">
    <button class="form-close-btn" id="login_close_btn">x</button>
    <form class="form-container" action="./login.php" method="post" id="login_form">
      <input type="text" name="email" placeholder="Email" class="form-input" id="login_email" required>
      <input type="password" name="password" placeholder="Passwort" class="form-input" id="login_pass" required>
      <span id="login_error" class="form-error"><?php echo $_SESSION['login_error']?></span>   <!-- Feld für Fehlermeldung -->
      <input type="hidden" name="filename" value="<?php echo basename($_SERVER['PHP_SELF']);?>">
      <input type="submit" value="Anmelden" class="form-btn">
    </form>
  </div>
  <!-- Registrierungsformular -->
  <div class="form" id="register_div">
    <button class="form-close-btn" id="register_close_btn">x</button>
    <form class="form-container" action="./register.php" method="post" id="register_form">
      <input type="text" name="vorname" placeholder="Vorname" class="form-input" required>
      <input type="nachname" name="nachname" placeholder="Nachname" class="form-input" required>
      <input type="text" name="email" placeholder="Email" class="form-input" id="register_email" required>
      <input type="password" name="password" placeholder="Passwort" class="form-input" id="register_pass" required>
      <input type="password" name="password_check" placeholder="Passwort wiederholen" class="form-input" id="register_confirm_pass" required>
      <span id="register_error" class="form-error"></span>    <!-- Feld für Fehlermeldung -->
      <input type="hidden" name="filename" value="<?php echo basename($_SERVER['PHP_SELF']);?>">
      <input type="submit" value="Registrieren" class="form-btn">
    </form>
  </div>
  <!-- Userinformationen -->
  <div class="form" id="userinfo_div">
    <button class="form-close-btn" id="userinfo_close_btn">x</button>
    <span class="form-info"><?php echo $_SESSION['email']; ?></span>
    <form class="form-container" action="./logout.php" method="post" id="logout_form">
      <input type="hidden" name="filename" value="<?php echo basename($_SERVER['PHP_SELF']);?>">
      <input type="submit" value="Abmelden" class="form-btn">
    </form>
  </div>
</header>