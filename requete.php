<?php
	session_start();
	$_SESSION['idEquipement'] = 12;
	header("Access-Control-Allow-Origin:*");
	if(!empty($_POST)){
		if(!empty($_POST['valeur'])){
			$valeur = htmlspecialchars(addslashes($_POST['valeur']));
			if($valeur == "listeHotes"){
				echo "Voici la liste d'hotes, d'hotes, d'hotes!";
				echo ajouterRequete("312", "Tous");
			}
		}
	}
	
	function ajouterRequete($type,$contenu){
		include_once("requete.class.php");
		$a = new Requete();
		$i = $a -> enregistrerRequete($type,$contenu,$_SESSION['idEquipement']);
		if($i) return true;
		else return false;
	}
