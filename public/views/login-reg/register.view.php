<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>uHost</title>
    <link rel="shortcut icon" href="favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="public/css/login-register/register-form.css">
</head>

<body>
    <main class="signin-page">
      <div class="signin-page__form__container">
        <h1 class="signin-title">Registrirajte se !</h1>
        <form method="POST" action="/register" class="signin-form">

          <input type="text" name="firstName" id="firstName" value="<?= isset($firstName) ? $firstName : ''?>" class="<?= (! empty($errors['Ime'])) ? 'errorInput' : '' ?>" placeholder="Ime" autofocus>
            <?php if(! empty($errors['Ime'])) : ?>
              <strong class="errorMessage"><?= $errors['Ime'][0] ?></strong> 
            <?php endif; ?>
        

          <input type="text" name="lastName" value="<?= isset($lastName) ? $lastName : ''?>" id="lastName" class="<?= (! empty($errors['Prezime'])) ? 'errorInput' : '' ?>" placeholder="Prezime">
            <?php if(! empty($errors['Prezime'])) : ?>
              <strong class="errorMessage"><?= $errors['Prezime'][0] ?></strong> 
            <?php endif; ?>
              
        
          <input type="text" name="username" value="<?= isset($username) ? $username : ''?>" id="username" class="<?= (! empty($errors['Korisničko ime'])) ? 'errorInput' : '' ?>" placeholder="Korisničko ime">
            <?php if(! empty($errors['Korisničko ime'])) : ?>
              <strong class="errorMessage"><?= $errors['Korisničko ime'][0] ?></strong> 
            <?php endif; ?>
        

          <input type="email" name="email" value="<?= isset($email) ? $email : ''?>" id="email" class="<?= (! empty($errors['Email'])) ? 'errorInput' : '' ?>" placeholder="Email">
            <?php if(! empty($errors['Email'])) : ?>
              <strong class="errorMessage"><?= $errors['Email'][0] ?></strong> 
            <?php endif; ?>


          <input type="password" name="password" id="password" class="<?= (! empty($errors['Lozinka'])) ? 'errorInput' : '' ?>" placeholder="Lozinka">
            <?php if(! empty($errors['Lozinka'])) : ?>
              <strong class="errorMessage"><?= $errors['Lozinka'][0] ?></strong> 
            <?php endif; ?>

        
          <input type="password" name="confirmPassword" id="confirmPassword" class="<?= (! empty($errors['Potvrda lozinke'])) ? 'errorInput' : '' ?>" placeholder="Ponovljena lozinka">
            <?php if(! empty($errors['Potvrda lozinke'])) : ?>
              <strong class="errorMessage"><?= $errors['Potvrda lozinke'][0] ?></strong> 
            <?php endif; ?>

          <input type="checkbox" id="agree-terms">
            <label for="agree-terms">Prihvati
                <a href="#">prava i uvjete</a>
            </label>           
          <button type="submit" class="signin-form__button">Registracija</button>
        </form>
      </div>
    </main>
</body>
</html>