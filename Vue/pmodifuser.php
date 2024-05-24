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
            <?php
                if(isset($_SESSION['user'])){
                    if ($_SESSION['user']['role'] == 1) {
                        echo '<div align="right"><a href="padmin.php">Page admin</a></div>';
                    }

                ?>
                    <form action="pdeco.php" method="POST" align="right">
                        <input type="submit" name="bConnexion" value="Deconnexion">
                    </form>
                <?php
                }
            ?>
            <div class="sous_main">
                <div class="section1">
                    <h2>Modifier votre article</h2>
                    <?php
                    if (isset($_GET['id'])) {
                        $membre_id = $_GET['id'];  
                    ?>
                    <form action="<?php $_SERVER['DOCUMENT_ROOT']?>/Controller/userController.php" method="POST" align="center">
                        <input type="hidden" name="membre_id" value="<?php echo htmlspecialchars($membre_id); ?>">
                        <input type="text" name="nom" size="20" placeholder="Nom" required autofocus>
                        <br>
                        <input type="text" name="prenom" size="20" placeholder="Prénom" required >
                        <br>
                        <input type="date" name="date_n" size="20" placeholder="Date de naissance" required >
                        <br>
                        <input type="text" name="username" size="20" placeholder="Username" required >
                        <br>
                        <input type="text" name="mdp" size="20" placeholder="Mot de passe" required >
                        <br>
                        <input type="submit" name="bModifmembre" value="Modifier">
                    </form>
                    <?php
                    }
                    ?>
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