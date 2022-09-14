
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=à, initial-scale=1.0">
    <title>MVC</title>
    <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
    <div class="navigation-container">
    <?php 
      if (isset($_SESSION["name"])) {
        require 'userNavigationLayout.php';
      }else {
        require 'navigationLayout.php';
    }
    ?>
    </div>
    <div class="container" >
        <div class="main">
            <?php echo $content; ?>
        </div>
      
    </div>
    <footer class="footer">
        <span>Tous les droits sont reservés</span>
    </footer>
</body>
</html>