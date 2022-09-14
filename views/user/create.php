<div class="create-acount">
        <?php 
            $msg = "";
            if (isset($data['msg'])) {
               if ($data['msg'] === "1") {
                $msg = "Une erreur s'est produite! veuillez reessayer encore";
               }else if($data['msg'] === "2"){
                $msg ="Le compte a été crée avec success. Connectez vous pour y acceder à votre compte.";
               }
            } 
        ?>
    <form action="index.php?module=user&action=insert" method="post">
        <header>
            <h2>Créer un compte :</h2>
            <strong><?php echo $msg ?></strong>
            <small>*Tous les champs sont obligatoires</small>
        </header>
        <div>
            <div class="group-input">
                <label for="name">Nom &#8594</label>
                <input type="text" id="name" name="name" min="2" max="25" required>
            </div>
            <div class="group-input">
                <label for="date"> Date de naissance &#8594</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="group-input">
                <label for="email"> Username &#8594</label>
                <input type="email" id="email" name="username" required>
            </div>
            <div class="group-input">
                <label for="password">Mot de passe &#8594</label>
                <input type="password" id="password" name="password" min="6" max="20" required>
            </div>
        </div>
        <footer>
            <input class="button" type="submit" value="Valider">
            <a href="?module=login&action=index">Se connecter &#8594</a>
        </footer>
    </form>
</div>

 