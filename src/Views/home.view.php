<?php
require_once(__DIR__ . "/parts/head.php");
?>
<h1>Hello 👌</h1>
<div class="container-fluid">
    <h2>Les taches à faire : </h2>
    <a class='btn btn-info' href='/task-add'>Ajouter une tache</a>
    <?php
    foreach ($tasksList as $task) { ?>
        <div class="card">
            <div class="card-header">
                <h3><?= $task->title ?></h3>
            </div>
            <div class="card-body">
                <p class="card-title"><?= $task->description ?></p>
                <footer class="blockquote-footer">
                    Créer le <?= $task->creation_date ?>
                    <?php if ($task->modification_date) { ?>
                        modifier le <?= $task->modification_date ?>
                    <?php
                    } ?>
                </footer>
                <form action="" method="POST">
                    <input type="hidden" id="idDone" name="idDone" value="<?= $task->id; ?>">
                    <button type="submit" class="btn btn-success">Fini</button>
                </form>
                <?php
                echo ("<a class='btn btn-warning' href='/task-update?id={$task->id}'>Modifier</a>");
                ?>
                <form action="" method="POST">
                    <input type="hidden" id="idDelete" name="idDelete" value="<?= $task->id; ?>">
                    <button type="submit" class="btn btn-danger">Annuler</button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>

    <h2>Les taches à fini : </h2>
    <?php
    foreach ($tasksListDone as $task) { ?>
        <div class="card">
            <div class="card-header">
                <h3><?= $task->title ?></h3>
            </div>
            <div class="card-body">
                <p class="card-title"><?= $task->description ?></p>
                <footer class="blockquote-footer">
                    Créer le <?= $task->creation_date ?>
                    <?php if ($task->modification_date) { ?>
                        modifier le <?= $task->modification_date ?>
                    <?php
                    } ?>
                </footer>
                <form action="" method="POST">
                    <input type="hidden" id="idDelete" name="idDelete" value="<?= $task->id; ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>

</div>

<?php

require_once(__DIR__ . "/parts/footer.php");
?>