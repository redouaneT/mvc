<?php
  $type = "hidden";
  $class = "";
  if (isset($_SESSION["name"])) {
    $userData = $data['user'];
    $data = $data['article'];
  }
?>
<section>
<?php
    foreach($data as $row){
      if (isset($_SESSION["name"])) {
        if ($row['userId'] ===  $userData['userId']) {
          $type = "submit";
          $class = "light";
        }else {
          $type = "hidden";
          $class = "";
        }
      }
    ?>
      <article class="article  <?php echo $class; ?>">
        <header>
          <h2><?php echo $row['title']; ?></h2>
          <strong>Publié par : <?php echo $row['name'];?></strong>
          <span>Le <?php echo $row['date'];?></span>
        </header>
        <div>
          <p><?php echo $row['content']; ?></p>
        </div>
        <footer>
          <form action="index.php?module=article&action=update" method="post">
              <input type="hidden" name="articleId" value="<?php echo $row['articleId']; ?>">
              <a class="button" href="?module=article&action=read&articleId=<?php echo $row['articleId'];?>">Consulter</a>
              <input class="button" type="<?php echo $type;?>" value="Modifier">
          </form>
          <form action="index.php?module=article&action=delete" method="post">
              <input type="hidden" name="articleId" value="<?php echo $row['articleId']; ?>">
              <input class="button" type="<?php echo $type;?>" value="Effacer">
          </form>
        </footer>
      </article>
    <?php
    } 
    ?>
</div>

