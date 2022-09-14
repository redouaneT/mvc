
<div class="create-acount">
    <strong>
        <?php 
            if (isset($data['msg'])) {
                $msg = $data['msg'];
                if ($msg === "1") {
                    echo "Le mot de passe entré est incorrecte. Veuillez entrer un mot de passe valide.";
                }else if($msg === "2") {
                    echo "Le nom d'utilisateur n'existe pas.";
                }else if($msg === "3") {
                    echo "Vous avez été déconnecter, </br> Veuillez vous rconnecter à nouveau.";
                }
            } 
        ?>
    </strong>
    <form action="index.php?module=authentification&action=login" method="post">
        <header>
            <h2>Connexion : </h2>
        </header>
        <div>
            <div class="group-input">
                <label for="username"> Username &#8594</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="group-input">
                <label for="password"> Mot de passe &#8594</label>
                <input type="password" id="password" name="password" required>
            </div>
        </div>
    <footer>
        <input class="button" type="submit" value="Login">
    </footer>
    </form>
    <div class="need-account">
        <h3>Vous n'avez pas encore un compte ? </h3>
        <div>
            <span>Vous pouvez créer un ici &#8594</span>  
            <a href="?module=user&action=create">Créer un compte</a>
        </div>
    </div>
</div>

