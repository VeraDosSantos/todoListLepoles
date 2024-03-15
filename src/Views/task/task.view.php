<?php
require_once(__DIR__ . "/../parts/head.php");
?>

<h1>Nouvelle tache</h1>

<form action="" method="POST">
    <div>
        <label for="title">Titre</label>
        <input type="text" value="<?php echo isset($myResult) ? $myResult->title : '' ?>" name="title">
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="5" cols="40"><?php echo isset($myResult) ? $myResult->description : '' ?></textarea>
    </div>
    <button type='submit' class='btn btn-primary'><?php echo isset($myResult) ? "Modifier" : "Créer" ?></button>
</form>
<?php if (isset($error)) {
    echo "<p class='text-danger'>" . $error . "<p>";
} ?>


<?php
require_once(__DIR__ . "/../parts/footer.php");
?>