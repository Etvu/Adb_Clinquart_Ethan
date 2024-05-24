<?php
require($_SERVER['DOCUMENT_ROOT']."/Model/userModel.php");
include('header.php');
if(!$_SESSION['user']['role'] == 1){
    header("Location: /vue/paccueil.php");
    
}
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
            <form action="pdeco.php" method="POST" align="right">
                <input type="submit" name="bConnexion" value="Deconnexion">
            </form>
            <div class="sous_main">
                <div class="section1">
                    <h1>Page Admin</h1>
                    <h2>Liste des membres</h2>
                    <?php
                    $membres = affichermembres();
                    if (!empty($membres)) {
                        echo "<ul>";
                        // On parcours les membres et on affiche
                        foreach ($membres as $membre) {
                            echo "<li>" . htmlspecialchars($membre['username']) . "</li>";
                            echo '<div style="background-image:none; height:30px;"><a href="pinfo.php?id=' . $membre['users_data_id'] . '">Voir les infos perso</a></div>';
                            ?>
                            <form action=""></form>
                            <form action="<?php $_SERVER['DOCUMENT_ROOT']?>/Controller/userController.php" method="POST">
                                <?PHP
                                echo "<input type='hidden' name='delete_user_id' value='" . $membre['users_data_id'] . "'>";
                                ?>
                                <a href="pmodifuser.php?id=<?php echo $membre['users_data_id']; ?>">Modifier</a>
                                <br>
                                <input type="submit" name="bSuppmembre" value="Supprimer">
                                <HR></HR>
                            </form>

                            <?php
                        }
                        echo "</ul>";
                    } else {
                        echo "<p>Aucun membre trouvé.</p>";
                    }
                    ?>
                    <h2>Ajouter un membre</h2>
                    <form action="<?php $_SERVER['DOCUMENT_ROOT']?>/Controller/userController.php" method="POST" align="center">
                        <input type="text" name="nom" size="20" placeholder="Nom" required autofocus>
                        <br>
                        <input type="text" name="prenom" size="20" placeholder="Prénom" required >
                        <br>
                        <input type="date" name="date_n" size="20" placeholder="Date de naissance" required >
                        <br>
                        <input type="text" name="username" size="20" placeholder="Username" required >
                        <br>
                        <input type="password" name="mdp" size="20" placeholder="Mot de passe" required >
                        <br>
                        <input type="submit" name="bAjoutermembre" value="Ajouter le membres">
                    </form>
                </div>
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