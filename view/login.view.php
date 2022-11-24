<?php require '../admin/login.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="/css/login.css" rel="stylesheet" type="text/css">
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form action="" method="post">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
            <input class="form-control" type="text" name="username" placeholder="Username" id="username" required>
            <label for="floatingInput">Username </label>
            </div>
            <div class="form-floating">
            <input type="password"  name="password" placeholder="Password" id="password" required class="form-control my-2"placeholder="Password">
            <label for="floatingPassword">Password</label>
            </div>
            <?php if(!empty($errors)): ?>
                <div  class="my-2 text-danger"><?php echo $errors; ?></div>
            <?php endif; ?>
          
            <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-4 mb-3 text-muted">© 2017–2022</p>
        </form>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>