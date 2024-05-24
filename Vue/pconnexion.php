<?php
include('header.php');

?>
        <header>
            <div class="sous_header">
                <div class="logo">
                    <img src="img/logo.png" alt="Le logo">
                </div>
                <nav>
                    <ul>
                        <li><a href="paccueil.php">ACCUEIL</a></li>
                        <li><a href="pmateriel.php">MATERIEL</a></li>
                        <li><a href="pconnexion.php"><i class="fa-solid fa-user"></i></a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <div class="sous_main">
                <div class="section1">
                    <h1>Materiol</h1>
                </div>
            </div>
            <div>
                <?php
                if (isset($_SESSION['Erreur'])) {
                    echo "<p style='color: red; text-align: center;'>".$_SESSION['Erreur']."</p>";
                    unset($_SESSION['Erreur']); // Supprimer le message d'erreur après l'affichage
                }
                //Si l'user est déjà connecté on n'a plus accès au formulaire
                if(isset($_SESSION['user'])){
                    
                    echo '<div align="center">Vous êtes déjà connecté !</div>';
                    if ($_SESSION['user']['role'] == 1) {
                        echo '<div align="center"><a href="padmin.php">Page admin</a></div>';
                    }
                    ?>
                    <form action="pdeco.php" method="POST" align="center">
                        <input type="submit" name="bConnexion" value="Deconnexion">
                    </form> 
                    <?php

                }else{
                    ?>
                    <form action="<?php $_SERVER['DOCUMENT_ROOT']?>/Controller/userController.php" method="POST" align="center">
                        <input type="text" name="username" size="20" placeholder="Username" required autofocus>
                        <br>
                        <input type="password" name="mdp" size="20" placeholder="Mot de passe" required >
                        <br>
                        <input type="submit" name="bConnexion" value="Connexion">
                        <br>
                        <a href="pinscription.php">Pas de comte?</a>
                    </form>

                    <?php
                }

                ?>
                
            </div>
        </main>
        <footer>
            <div class="sous_footer">
                <h2>Réseaux sociaux</h2>
                <ul>
                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-square-facebook"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-square-x-twitter"></i></a></li>
                </ul>
            </div>
        </footer>
    </body>
</html>