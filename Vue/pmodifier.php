<?php
require($_SERVER['DOCUMENT_ROOT']."/Model/userModel.php");
include('header.php');
if(!$_SESSION['user']){
    header("Location: /vue/pconnexion.php");
    
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
                        <li><a href="materiel.php">MATERIEL</a></li>
                        <li><a href="puser.php"><i class="fa-solid fa-user"></i></a></li>
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
                    <h2>Modifier votre article</h2>
                    <?php
                    if (isset($_GET['id'])) {
                        $article_id = $_GET['id'];  
                        $article = getArticleById($article_id);

                    ?>
                    <form action="<?php $_SERVER['DOCUMENT_ROOT']?>/Controller/userController.php" method="POST" align="center">
                        <input type="hidden" name="article_id" value="<?php echo htmlspecialchars($article['ID']); ?>">
                        <label>Type de matériel</label>
                        <select name="typea" id="typea">
                            <option value="portable">Portable</option>
                            <option value="ecran">Ecran</option>
                            <option value="souris">Souris</option>
                            <option value="clavier">Clavier</option>
                        </select>
                        <br>
                        <label>Titre de l'article</label>
                        <input type="text" name="tarticle" required autofocus>
                        <br><br>
                        <label>Texte de l'article</label>
                        <textarea type="text" name="article"></textarea required>
                        <br><br>
                        <input type="submit" name="bModif">
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