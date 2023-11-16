<?php


header("Access-Control-Allow-Origin:  * ");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE ");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization ");

require "./LivreControlle/LivreControlle.php";

$table_livres = "liste_globale_livres";

$requete_sql = "SELECT * FROM $table_livres LIMIT 100";
if (isset($_GET)) {

  if (isset($_GET["Titre"])) {
    $Titre = $_GET["Titre"];
    $requete_sql = "SELECT * FROM $table_livres WHERE Titre = '$Titre' ";
  } else if (isset($_GET["Filiere"])) {
    $Filiere = $_GET["Filiere"];
    $requete_sql = "SELECT * FROM $table_livres WHERE Filiere = '$Filiere' ";
  } else if (isset($_GET["Code_barre"])) {

    $Code_barre = $_GET["Code_barre"];
    
      $requete_sql = "SELECT * FROM $table_livres WHERE Code_barre = '$Code_barre' and Code_barre is not null ";
    
  } else if (isset($_GET["Search_value"]) && $_GET["Search_value"] != "") {
    $Search_value = $_GET["Search_value"];
    $requete_sql = "SELECT * FROM $table_livres WHERE Titre LIKE '%$Search_value%' OR SOUNDEX(Titre) Like Concat('%',SOUNDEX('$Search_value'), '%') ";
    $words = explode(' ', $Search_value);
    // foreach ($words as $i => $word) {
    // if ($i > 0) {
    // $requete_sql .= " OR ";
    // }
    // $requete_sql .= "Titre LIKE '%" . $word . "%'";
    // }
    


    
  }
}

LivreControlle::FindLivres($requete_sql);
