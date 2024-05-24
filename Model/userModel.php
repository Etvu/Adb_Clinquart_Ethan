<?php 
include($_SERVER['DOCUMENT_ROOT']."/Model/dbconnect.php");


function inscriptiondb($nom,$prenom,$date_n,$username,$mdp){
    //Récupération de la connexion à la BDD
    global $bdd;
    $role = 0;
    //Requete SQL
    $querysql = "INSERT INTO users_data (name,lastname,date_naissance) VALUES (:nom,:prenom,:date_n)";
    //Prépare la requête SQL
    $stmtUserData = $bdd->prepare($querysql);
    //BindParam
    $stmtUserData->bindParam(":nom",$nom);
    $stmtUserData->bindParam(":prenom",$prenom);
    $stmtUserData->bindParam(":date_n",$date_n);
    //Exécuter la requête SQL
    try{
        $stmtUserData->execute();
    }catch(PDOException $e){
        $message = "Une erreur s'est produite.";
    }
    if(isset($message)){return $message;}
    $sqlLastUser = "SELECT id FROM users_data ORDER BY id DESC LIMIT 1";
    $stmtUsers = $bdd->prepare($sqlLastUser);
    $stmtUsers->execute();
    // On récupère l'id du dernier enregistrement
    $idUsers = $stmtUsers->fetchColumn();

    $querysqlData = "INSERT INTO users (username,password,role,users_data_id) VALUES (:username,:password,:role,:users_data_id)";
    /*     var_dump($username,$password,$idUsers); */
        //Prépare la requête SQL
        $stmtUsersInsert = $bdd->prepare($querysqlData);
        $stmtUsersInsert->bindParam(":username",$username);
        $stmtUsersInsert->bindParam(":password",$mdp);
        $stmtUsersInsert->bindParam(":role",$role);
        $stmtUsersInsert->bindParam(":users_data_id",$idUsers, PDO::PARAM_INT);
        
        try{
           $stmtUsersInsert->execute();
        }catch(PDOException $e){
            $message = "Erreur 2";
        }
        if(isset($message)){return $message;}
}
function login($username,$mdp){
    global $bdd;
    $sqlUser = "SELECT * FROM `users`  join users_data where users.users_data_id = users_data.id AND username= :username AND password= :password";
    $stmtUsers = $bdd->prepare($sqlUser);
    $stmtUsers->bindParam(":username",$username);
    $stmtUsers->bindParam(":password",$mdp);
    try{
        $stmtUsers->execute();
    }catch(PDOException $e){
         $message = "Erreur 2";
         return false;
    }
    $user = $stmtUsers->fetch();
    if ($user) {
        $_SESSION["user"] = $user;
        return true;
    }
}
function recupusername($username) {
    global $bdd;

    $stmt = $bdd->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function ajouterunarticle($tarticle,$article,$typea,$user_id){
    global $bdd;   
    $querysqlData = "INSERT INTO article (title,article,type, user_id) VALUES (:tarticle,:article,:typea, :user_id)";
    $stmtUsersInsert = $bdd->prepare($querysqlData);
    $stmtUsersInsert->bindParam(":tarticle",$tarticle);
    $stmtUsersInsert->bindParam(":article",$article);
    $stmtUsersInsert->bindParam(":typea",$typea);
    $stmtUsersInsert->bindParam(":user_id", $user_id);
    try{
        $stmtUsersInsert->execute();
     }catch(PDOException $e){
         $message = "Erreur 2";
    }
     if(isset($message)){return $message;}
}

function afficherarticle(){
    global $bdd;
    $stmt = $bdd->prepare("SELECT * FROM article");
    $stmt->execute();

    // Récupérez les résultats sous forme de tableau associatif
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function supparticle($article_id){
    global $bdd;
    $stmt = $bdd->prepare("DELETE FROM article WHERE ID = :article_id");
    $stmt->bindParam(':article_id', $article_id);
    $stmt->execute();
}
function affichermembres(){
    global $bdd;
    $stmt = $bdd->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function suppmembre($membre_id){
    global $bdd;
    $stmt = $bdd->prepare("DELETE FROM users WHERE users_data_id = :membre_id");
    $stmt->bindParam(':membre_id', $membre_id);
    $stmt->execute();

    $stmt = $bdd->prepare("DELETE FROM users_data WHERE ID = :membre_id");
    $stmt->bindParam(':membre_id', $membre_id);
    $stmt->execute();
}
function afficherinfo($user_id){
    global $bdd;
    $stmt = $bdd->prepare("SELECT * FROM users WHERE users_data_id = :user_id");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function afficherinfo2($user_id){
    global $bdd;
    $stmt = $bdd->prepare("SELECT * FROM users_data WHERE ID = :user_id");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function modifarticle($article_id,$tarticle,$article,$typea){
    global $bdd;
    $stmt = $bdd->prepare("UPDATE article SET title = :tarticle, article = :article, type = :typea WHERE ID = :article_id");
    $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
    $stmt->bindParam(':tarticle', $tarticle);
    $stmt->bindParam(':article', $article);
    $stmt->bindParam(':typea', $typea);
    return $stmt->execute();
}
function getArticleById($article_id) {
    global $bdd;
    $stmt = $bdd->prepare("SELECT * FROM article WHERE ID = :article_id");
    $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function affichepseudo($pseudo_id){
    global $bdd;
    $stmt = $bdd->prepare("SELECT * FROM users WHERE users_data_id = :pseudo_id");
    $stmt->bindParam(':pseudo_id', $pseudo_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function modifuser($membre_id,$nom,$prenom,$date_n,$username,$password){
    global $bdd;
    $stmtUserData = $bdd->prepare("UPDATE users SET username= :username, password = :password  WHERE users_data_id = :membre_id");
    $stmtUserData->bindParam(':membre_id', $membre_id, PDO::PARAM_INT);
    $stmtUserData->bindParam(":username",$username);
    $stmtUserData->bindParam(":password",$password);
    $stmtUserData->execute();

    
    $stmtUsersInsert = $bdd->prepare("UPDATE users_data SET name= :nom, lastname = :prenom, date_naissance = :date_n  WHERE ID= :membre_id");
    $stmtUsersInsert->bindParam(':membre_id', $membre_id, PDO::PARAM_INT);
    $stmtUsersInsert->bindParam(":nom",$nom);
    $stmtUsersInsert->bindParam(":prenom",$prenom);
    $stmtUsersInsert->bindParam(":date_n",$date_n);
    $stmtUserData->execute();

}
?>