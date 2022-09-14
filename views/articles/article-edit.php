<?php
    foreach($data as $row){
?>
<div class="create-acount write-article">
    <form action="index.php?module=article&action=edit" method="post">
        <header>
        <h2>Modifier l'article :</h2>
        </header>
        <div class="group-input">
            <label for="title">Titre de l'article</label>
            <input type="text" name="title" id="title" value="<?php echo $row['title']; ?>">
        </div>
        <div class="group-input">
            <label for="content">Contenu de l'article</label>
            <textarea name="content" id="content" cols="30" rows="10">
                <?php echo $row['content']; ?>
            </textarea>
        </div>
        <footer>
            <input type="hidden" name="articleId" value="<?php echo $row['articleId']; ?>">
            <input class="button" type="submit" value="Valider">
            <a href="?module=base&action=index"> retourner &#8594</a>
        </footer>
    </form>
</div>
   
<?php
} 
?>