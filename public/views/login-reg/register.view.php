<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Registracija</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 
    <!-- Custom styles for this template -->
    <link href="public/css/form.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="/register" method="POST">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Registriraj se</h1>
      
      <label for="Ime" class="sr-only">Ime</label>
        <input type="text" name="firstName" id="firstName" value="<?= isset($firstName) ? $firstName : ''?>" class="form-control <?= (! empty($errors['Ime'])) ? 'errorInput' : '' ?>" placeholder="Ime" autofocus>
      <?php if(! empty($errors['Ime'])) : ?>
        <strong class="errorMessage"><?= $errors['Ime'][0] ?></strong> 
      <?php endif; ?>
      
      <label for="Prezime" class="sr-only">Prezime</label>
        <input type="text" name="lastName" value="<?= isset($lastName) ? $lastName : ''?>" id="lastName" class="form-control" placeholder="Prezime">
      <?php if(! empty($errors['Prezime'])) : ?>
        <strong class="errorMessage"><?= $errors['Prezime'][0] ?></strong> 
      <?php endif; ?>
            
      <label for="Korisničko ime" class="sr-only">Korisničko ime</label>
        <input type="text" name="username" value="<?= isset($username) ? $username : ''?>" id="username" class="form-control" placeholder="Korisničko ime">
      <?php if(! empty($errors['Korisničko ime'])) : ?>
        <strong class="errorMessage"><?= $errors['Korisničko ime'][0] ?></strong> 
      <?php endif; ?>
      
      <label for="Email" class="sr-only">Email</label>
        <input type="email" name="email" value="<?= isset($email) ? $email : ''?>" id="email" class="form-control" placeholder="Email">
      <?php if(! empty($errors['Email'])) : ?>
        <strong class="errorMessage"><?= $errors['Email'][0] ?></strong> 
      <?php endif; ?>

      <label for="Lozinka" class="sr-only">Lozinka</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Lozinka">
      <?php if(! empty($errors['Lozinka'])) : ?>
        <strong class="errorMessage"><?= $errors['Lozinka'][0] ?></strong> 
      <?php endif; ?>

      <label for="Potvrdi lozinku" class="sr-only">Ponovljena lozinka</label>
        <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Ponovljena lozinka">
      <?php if(! empty($errors['Potvrda lozinke'])) : ?>
        <strong class="errorMessage"><?= $errors['Potvrda lozinke'][0] ?></strong> 
      <?php endif; ?>
      
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Zapamti me
        </label>
      </div>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Registriraj se</button>
      
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
  </body>
</html>
