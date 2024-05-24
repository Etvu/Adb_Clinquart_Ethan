<?php
session_start();
require($_SERVER['DOCUMENT_ROOT']."/Model/userModel.php");

if(isset($_POST['bInscription'])){
    $nom = htmlspecialchars(strtolower(trim($_POST['nom'])));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $date_n = htmlspecialchars(trim($_POST['date_n']));
    $username = htmlspecialchars(strtolower(trim($_POST['username'])));
    $mdp = md5(htmlspecialchars(trim($_POST['mdp'])));

    $message = inscriptiondb($nom,$prenom,$date_n,$username,$mdp);
    header("Location: /vue/pconnexion.php");
}else if(isset($_POST['bConnexion'])){
    $username = htmlspecialchars(strtolower(trim($_POST['username'])));
    $mdp = md5(htmlspecialchars(trim($_POST['mdp'])));
    if (login($username, $mdp)) {
        header("Location: /vue/paccueil.php");
        exit();
    } else {
        $_SESSION['Erreur'] = "Nom d'utilisateur ou mot de passe incorrect.";
        header("Location: /vue/pconnexion.php");
        exit();
    }
}
if(isset($_POST['bArticle'])){ //créer son article
    $tarticle = htmlspecialchars(strtolower(trim($_POST['tarticle'])));
    $article = htmlspecialchars(strtolower(trim($_POST['article'])));
    $typea = htmlspecialchars(strtolower(trim($_POST['typea'])));
    $user_id = $_SESSION['user']['ID'];
    ajouterunarticle($tarticle,$article,$typea,$user_id);
    header("Location: /vue/pmateriel.php");
    
}
if(isset($_POST['bSupp'])){ //Supprimer un article
    if(isset($_POST['delete_article_id'])) {
        supparticle( $article_id = $_POST['delete_article_id']);
        header("Location: /vue/pmateriel.php");
    }

}
if(isset($_POST['bAjoutermembre'])){
    $nom = htmlspecialchars(strtolower(trim($_POST['nom'])));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $date_n = htmlspecialchars(trim($_POST['date_n']));
    $username = htmlspecialchars(strtolower(trim($_POST['username'])));
    $mdp = md5(htmlspecialchars(trim($_POST['mdp'])));

    $message = inscriptiondb($nom,$prenom,$date_n,$username,$mdp);
    header("Location: /vue/padmin.php");
}

if(isset($_POST['bSuppmembre'])){
    $user_id = $_POST['delete_user_id'];
    suppmembre($user_id);
    // Redirigez vers la page admin ou affichez un message de succès
    header("Location: /vue/padmin.php");
    exit();
}
if(isset($_POST['bModif'])){ //Modifier l'article
    $article_id = $_POST['article_id'];
    $tarticle = $_POST['tarticle'];
    $typea = $_POST['typea'];
    $article = $_POST['article'];
    modifarticle($article_id, $tarticle, $article, $typea);
    header("Location: /vue/pmateriel.php");
    exit();
}
if(isset($_POST['bModifmembre'])){
    $membre_id = $_POST['membre_id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_n = $_POST['date_n'];
    $username = $_POST['username'];
    $password = md5($_POST['mdp']);
    
    modifuser($membre_id,$nom,$prenom,$date_n,$username,$password);
    header("Location: /vue/padmin.php");
}
?>