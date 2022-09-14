
<?php 
    $userId ="";
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
      }else {
        $userId = "-1";
      }
?>
<div class="create-acount write-article">
    <form action="index.php?module=article&action=create" method="post">
        <header>
            <h2>Rédiger un article</h2>
        </header>
        <div class="group-input">
            <label for="title">Titre de l'article &#8594</label>
            <input type="text" name="title" id="title">
        </div>
        <div class="group-input">
            <label for="content">Contenu de l'article &#8594</label>
            <textarea name="content" id="content">
            </textarea>
        </div>
        <footer>
            <input type="hidden" name="userId" value="<?php echo $userId ?>">
            <input class = "button" type="submit" value="Valider">
            <a href="?module=base&action=index"> retourner &#8594</a>
        </footer>
    </form>
</div>
