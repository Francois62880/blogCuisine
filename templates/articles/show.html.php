<h1><?= $article['title'] ?></h1>
<small>Ecrit le <?= $article['created_at'] ?></small>
<p><?= $article['introduction'] ?></p>
<hr>
<?= $article['content'] ?>

<?php if (count($commentaires) === 0) : ?>
<h2>Il n'y a pas encore de commentaires pour cet article ... SOYEZ LE PREMIER ! :D</h2>
<?php else : ?>
<h2>Il y a déjà <?= count($commentaires) ?> réactions : </h2>
<?php foreach ($commentaires as $commentaire) : ?>
<h3>Commentaire de <?= $commentaire['author'] ?></h3>
<small>Le <?= $commentaire['created_at'] ?></small>
<blockquote>
    <em><?= $commentaire['content'] ?></em>
</blockquote>
<a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>"
    onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>
<?php endforeach ?>
<?php endif ?>

<form action="index.php?controller=comment&task=insert" method="POST">
    <h3>Vous voulez réagir ? N'hésitez pas à laisser un commentaire !</h3>
    <div class="form-row">
        <div class="form-group col-lg-3">
            <label for="inputName">Pseudo *</label>
            <input type="text" class="form-control" name="author" placeholder="Votre pseudo !">
        </div>
        <div class="form-group col-lg-9">
            <label for="inputMessage">Commentaire *</label>
            <textarea name="content" class="form-control" rows="5" placeholder="Votre commentaire ..."></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="article_id" value="<?= $article_id ?>">
        </div>
    </div>
    <div class="form-group offset-lg-5">
        <button>Commenter !</button>
    </div>
</form>