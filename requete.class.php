<?php
	Class requete{
		/**
		 * Classe permettant de gerer les requetes en provenance de l'administrateur
		 * @author Mathe Eliel
		 * @copyright nfinic 2016
		 */
		private $cheminVar = "db.php";
		 /**
			* Cette fonction permet de verifier s'il y a une requete a partir de l'administrateur
	 	*/
		 public function chercherRequete($idEquipement){
		 	try{
		 		include($this -> cheminVar);
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pwd,$pdo_options);
				$req = $bdd -> prepare("SELECT * FROM Requete WHERE Etat=0 AND idEquipement=?");
				$req -> execute(array($idEquipement));
				while($res = $req -> fetch()){
					echo $res['contenu'];
				}
				$req -> closeCursor();
		 	}catch(Exception $err){
		 		die("Une erreur ".$err->getMessage());
		 	}
		 }
		 
		 public function enregistrerRequete($type,$contenu,$idEquipement){
		 	try{
		 		include($this -> cheminVar);
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pwd,$pdo_options);
				$req = $bdd -> prepare("INSERT INTO Requete(id,idEquipement,code,type,contenu,etat) VALUES('',?,?,?,?,0)");
				$i = $req -> execute(array($idEquipement,$this -> genererCodeRequete(),$type,$contenu));
				if($i > 0){
					return true;
				}else{
					return false;
				}
		 	}catch(Exception $err){
		 		die("Une erreur ".$err -> getMessage());
		 	}
		 }
		 
		 private function genererCodeRequete(){
		 	$nbre = rand(2435,9434);
			$lettre = "";
			$alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','X','Y','Z','N','I','Q');
			$index1 = rand(0,19);
			$index2 = rand(0,19);
			return $alphabet[$index1].$nbre.$alphabet[$index2];
		 }
		 
		 public function envoyerRequete(){
		 	
		 }
		 
		 public function annulerRequete(){
		 	
		 }
		 
		 public function planifierRequete(){
		 	
		 }
	}
	
	function chercherRequete($idEquipement){
		 	try{
		 		include("db.php");
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pwd,$pdo_options);
				$req = $bdd -> prepare("SELECT * FROM Requete WHERE Etat=0 AND idEquipement=?");
				$req -> execute(array($idEquipement));
				$retour = "";
				while($res = $req -> fetch()){
					echo $res['contenu']."\n";
					$retour .= $res['contenu']."\n";
				}
				$req -> closeCursor();
				return $retour;
		 	}catch(Exception $err){
		 		die("Une erreur ".$err->getMessage());
		 	}
		 }