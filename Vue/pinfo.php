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
                }
            ?>
            <form action="pdeco.php" method="POST" align="right">
                <input type="submit" name="bConnexion" value="Deconnexion">
            </form>
            <div class="sous_main">
                <div class="section1">
                    <h1>Info personnel</h1>
                    <?php
                    //On récupère l'id via l'url pour afficher les informations propre à chaque user
                    if (isset($_GET['id'])) {
                        $user_id = $_GET['id'];
                        $user_info = afficherinfo($user_id);
                        $user_info2 = afficherinfo2($user_id);
                        if ($user_info) {
                            echo "<p>Username : " . htmlspecialchars($user_info['username']) . "</p>";
                            echo "<p>Password : " . htmlspecialchars($user_info['password']) . "</p>";
                            echo "<p>Nom : " . htmlspecialchars($user_info2['name']) . "</p>";
                            echo "<p>Prénom : " . htmlspecialchars($user_info2['lastname']) . "</p>";
                            echo "<p>Date de naissance : " . htmlspecialchars($user_info2['date_naissance']) . "</p>";
                        } else {
                            echo "<p>Aucun utilisateur trouvé.</p>";
                        }
                    } else {
                        echo "<p>ID utilisateur non spécifié.</p>";
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