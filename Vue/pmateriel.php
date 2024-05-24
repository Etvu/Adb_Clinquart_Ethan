<?php
require($_SERVER['DOCUMENT_ROOT']."/Model/userModel.php");
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
                    <h1>Materiol/matériel</h1>
                </div>
                
                    <div>
                    <?php
                        //si l'user est connecté il peut créer son articles
                        if(isset($_SESSION['user'])){
                        ?>
                            <h2 align="center">Créer votre article</h2>
                        <form action="<?php $_SERVER['DOCUMENT_ROOT']?>/Controller/userController.php" method="POST" align="center" style="margin-bottom: 20px;">
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
                            <input type="submit" name="bArticle">
                        </form>
                        <?php
                        }
                    ?>
                    </div>
                    <div class="commentaire">
                        <?php  
                            $articles = afficherarticle();
                            foreach ($articles as $article) { //afficher tous les articles
                                echo '<div class="article">';
                                $pseudo_id = $article['user_id'];
                                
                                $pseudo = affichepseudo($pseudo_id);
                                echo $pseudo['username'] . " : ";
                                echo "<h3>" . htmlspecialchars($article['title']) . "</h3>";
                                $pseudo = $article['article'];
                                echo "<p>" . htmlspecialchars($pseudo) . "</p>";
                                echo "<p><strong>Type:</strong> " . htmlspecialchars($article['type']) . "</p>";
                                if(isset($_SESSION['user']) &&($_SESSION['user']['ID'] === $article['user_id'] || $_SESSION['user']['role'] == 1)) {
                                    ?>
                                    <form action="<?php $_SERVER['DOCUMENT_ROOT']?>/Controller/userController.php" method="POST">
                                        
                                        <?PHP
                                        ?>
                                        <a href="pmodifier.php?id=<?php echo $article['ID']; ?>">Modifier</a>
                                        <?php
                                        echo "<input type='hidden' name='delete_article_id' value='" . $article['ID'] . "'>";
                                        ?>
                                        <input type="submit" name="bSupp" value="Supprimer">
                                        
                                    </form>
                                    <?php
                                }
                                echo '</div>';
                            }?>
                            
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