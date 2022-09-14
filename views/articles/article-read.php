<?php 
$type = "hidden";
foreach ($data as $key => $row) {
    if (isset($_SESSION["name"])) {
        if ($_SESSION['userId'] ===  $row['userId']) {
          $type = "submit";
        }else {
          $type = "hidden";
        }
      }
?>

<section>
    <article class="article read">
        <header>
                <h1><?php echo $row['title'];?></h1>
                <strong>Publier par : <?php echo $row['name'];?></strong>
                <span>Le <?php echo $row['date'];?></span>
        </header>
        <div>
            <p><?php echo $row['content'];?></p>
        </div>
        <footer>
                <form action="index.php?module=article&action=update" method="post">
                <input type="hidden" name="articleId" value="<?php echo $row['articleId']; ?>">
                <input class="button" type="<?php echo $type;?>" value="Editer">
            </form>
            <form action="index.php?module=article&action=delete" method="post">
                <input type="hidden" name="articleId" value="<?php echo $row['articleId']; ?>">
                <input class="button" type="<?php echo $type;?>" value="Effacer">
            </form>
        </footer>
    </article>
</section>
<?php 
}
?>

