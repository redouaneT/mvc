<?php
  $type = "hidden";
  $class = "";
  $title = "";
  // On change le titre de la page selon la page demandée (Soit la page 'd'acceuil' ou la page 'Mes articles')
  if (isset ($data['page']) && $data['page'] === "2") {
    $title = "Mes articles publiés";
  }else {
    $title = "Liste de tous les articles publiés";
  }
  // Si une session est toujour ouverte on mis à jours les donnée
  if (isset($_SESSION["name"])) {
    $userData = $data['user'];
    $data = $data['article'];
  }
?>
<section>
  <header>
  <h1 class="main-title"> <?php echo $title ?></h1>
  </header>
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

