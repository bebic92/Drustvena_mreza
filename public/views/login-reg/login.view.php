<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>uHost</title>
    <link rel="shortcut icon" href="favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="public/css/login-register/login-form.css">
</head>

<body>
    <main class="signin-page">
        <div class="signin-page__form__container">
        <h1 class="signin-title">Prijavite se !</h1>
            <form method="POST" action="/login" class="signin-form">
                <input type="email" name="email" id="email" placeholder="Email" class="<?= (!empty($error)) ? 'errorInput' : '' ?>" required autofocus>
                <input type="password" name="password" id="password" class="<?= (!empty($error)) ? 'errorInput' : '' ?>" placeholder="Lozinka" required>
                <?php if(isset($error)) : ?>
                  <p class="errorMessage"><?= $error ?></p>
                <?php endif; ?>       
                <button type="submit" class="signin-form__button">Prijava</button>
            </form>
        </div>
    </main>
</body>
</html>