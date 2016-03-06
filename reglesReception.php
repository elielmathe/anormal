<?php
	$donnee ;
	function traiterDonneeRecu($donneeRecu){
		//if($donneeRecu = )
	}
	
	function decouperExpression($expression){
		$nveauTab = split("",$expression);
		for($i=0;$i<count($nveauTab);$i++){
			
		}
	}
	
	function decouperPetitMot($expression){
		if(!empty($expression)){
			$petitMot = split("",$expression);
			for($i=0;$i<count($expression);$i++){
				
			}
		}
		
	}
	
	function clefValeur($expression){
		if(!empty($expression)){
			$nveauTab = split("=",$expression);
			$tab['clef'] = $nveauTab[0];
			$tab['valeur'] = $nveauTab[1];
			return $tab;
		}
		return false;
	}
	
	function traitementClefValeur($clef,$valeur){
		if(!empty($clef) && isSet($valeur)){
			
		}
	}
	
	function traitementSuisLa($expression){
		if(!empty($expression)){
			
		}
	}
	
	function traitementPing($expressionRecue){
		if(!empty($expressionRecue)){
			$tab = split("=",$expressionRecue);
			$code = $tab[0];
			$etat = $tab[1];
			$tempsPing = $tab[2];
			if($etat == 1){
				echo "Presence de l'hote sur le reseau ";
			}else if($etat == 0){
				echo "Indisponibilite de l'hote sur le reseau";
			}
		}
	}
	
	/**
	 * Reception des donnees sur la bande passante
	 */
	function traitementBP($expressionRecue){
		if(!empty($expressionRecue)){
			$tab = split("=",$expressionRecue);
			$valeur=0;//Initialisation de la valeur de la bande passante
			$code = $tab[0];
			$valeur=$tab[1];
			
		}else return false;
	}
	
	/**
	 * Reception activer/desactiver DHCP
	 */
	function traiterActiverDHCP($expressionRecue){
		if(!empty($expressionRecue)){
			$tab = split("=",$expressionRecue);
			$typeReponse = $tab[0];
			$code = $tab[1];
			$valeur = $tab[2];
		}
	}
	
	
	function traiterCreerPlagesDHCP($expressionRecue){
		if(!empty($expressionRecue)){
			$tab = split("=",$expressionRecue);
			$typeReponse = $tab[0];
			$code = $tab[1];
			$valeur = $tab[2];
			
			if($valeur == "1"){
				echo "Creation des plages avec succes";
			}else if($valeur = "0"){
				echo "Echec de creation des plages";
			}else{
				echo "Inconnu";
			}
			
		}
	}
	
	function traiterListerHotesConnectes($expressionRecue){
		if(!empty($expressionRecue)){
			$tab = split("=",$expressionRecue);
			$typeReponse = $tab[0];
			$code = $tab[1];
			$valeur = $tab[2];
			if($valeur == 0){
				echo "Aucun n'est connecte!";
			}else{
				afficherLesHotesConnectes($valeur);
			}
		}
	}
	
	function traiterObtenirEtatSNMP($expressionRecue){
		if(!empty($expressionRecue)){
			$tab = split("=",$expressionRecue);
			$typeReponse = $tab[0];
			$code = $tab[1];
			$adresse = $tab[2];
			$valeur = $tab[3];
			
			if($valeur == "NO"){
				echo "Il n'y a pas d'etat SNMP pour cet hote!";
			}else{
				afficherEtatSNMP($valeur);
			}
		}
	}
	
	/**
	 * Cette fonction permet de formatter la chaine pour avoir les hotes connectes
	 */
	function afficherLesHotesConnectes($expressionRecue){
		$tab = split("{}",$expressionRecue);
		for($i=0;$i<count($tab);$i++){
			$propriete = split("@",$tab[$i]);
			for($j=0;$j<count($propriete);$j++){
				$cleValeur = split("*",$propriete);
				$clef = $cleValeur[0];
				$valeur = $cleValeur[1];
				if($clef == "SP"){
					afficherServicesPartages($valeur);
				}
			}
		}
	}
	
	/**
	 * Cette fonction d'afficher l'etat SNMP des hotes
	 */
	
	function afficherEtatSNMP($expressionRecue){
		$tab = split("@",$expressionRecue);
		for($i=0;$i<count($tab);$i++){
			$clefValeur = split("*",$expressionRecue);
			$clef = $clefValeur[0];
			$valeur = $clefValeur[1];
			switch($clef){
				case 'R'://Ceci exprime l'etat RAM
					$val = split("/",$valeur);
					$enCours = $val[0];
					$max = $val[1];
					break;
				case 'P'://Ceci exprime l'etat du processeur
					$val = split("/",$valeur);
					$enCours = $val[0];
					$max = $val[1];
					break;
					break;
				case 'DD'://Ceci exprime l'etat du disque dur, IL faut aussi donnner la maniere d'afficher plusieurs disques durs ou partitions ou encore peripheriques
					$val = split("/",$valeur);
					$enCours = $val[0];
					$max = $val[1];
					break;
					break;
				case 'C'://Ceci exprime l'etat de la connexion
					
					break;
				case 'CP'://Ceci exprime l'etat de la chaleur du processeur
					break;
				case 'V'://Ceci exprime si le ventilateur est allume ou pas.
					break;
			}
		}
	}
	
	function afficherServicesPartages($expressionRecue){
		$tab = split(",",$expressionRecue);
		for($i=0;$i<count($tab);$i++){
			echo "<div>".$tab[$i]."</div>";
		}
	}
	
	
	$con = odbc_connect();
	
	
