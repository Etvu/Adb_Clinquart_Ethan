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
                        <li><a href="index.html">ACCUEIL</a></li>
                        <li><a href="">MATERIEL</a></li>
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
                    <input type="submit" name="bInscription" value="Inscription">
                </form>
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