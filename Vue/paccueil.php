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
            <?php
                //Si la session user existe affiche
                if(isset($_SESSION['user'])){
                    if ($_SESSION['user']['role'] == 1) { //si l'user à le role 1 (admin) on affiche
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
                    <h1>Materiol/accueil</h1>
                    <p>Materiol est un blog où vous pouvez lire et partager vos avis sur différents matériels informatiques tels que les écrans d'ordinateur, les PC portables, les souris ou encore les claviers. Vous pouvez vous inscrire dès à présent pour pouvoir rédiger vos avis. Bonne lecture !</p>
                    <div></div>
                </div>
                <div class="section2">
                    <h2>Présentation des différents matériaux </h2>
                    <div class="materiaux">
                        <div class="portable">
                            <div></div>
                            <p>PC Portable</p>
                        </div>
                        <div class="ecran">
                            <div></div>
                            <p>Ecran</p>
                        </div>
                        <div class="souris">
                            <div></div>
                            <p>Souris</p>
                        </div>
                        <div class="clavier">
                            <div></div>
                            <p>Clavier</p>
                        </div>
                    </div>
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