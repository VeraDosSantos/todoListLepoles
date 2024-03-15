<?php
require_once(__DIR__ . "/../parts/head.php");
?>

<h1>Connection</h1>

<form action="" method="POST">
    <div>
        <label for="email">email</label>
        <input type="email" name='email'>
    </div>
    <div>
        <label for="password">password</label>
        <input type="password" name='password'>
    </div>
    <button type='submit' class='btn btn-primary'>Connexion</button>
</form>
<?php if (isset($error)) {
    echo "<p class='text-danger'>" . $error . "<p>";
}
require_once(__DIR__ . "/../parts/footer.php");
?>