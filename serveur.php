<?php
	lancerEcoute("127.0.0.1", 2022);
	function lancerEcoute($adresse,$port){
		$connexion = stream_socket_server("tcp://".$adresse.":".$port);
		while($socket = stream_socket_accept($connexion)){
			$recu = stream_socket_recvfrom($socket,1500,0,$peer);
			if(false === empty($recu)){
				echo $recu."\r\n";
				traiterRequete($socket,$recu);
			}
		}
		stream_socket_shutdown($conn, \STREAM_SHUT_RDWR);
	}
	
	function traiterRequete($socket,$recu){
		if($recu == "Eliel"){
			envoyerReponse($socket,"C'est tres bonnnn");
		}else{
			envoyerReponse($socket,"C'est tres 111 bonnnn");
		}
	}
	
	function envoyerReponse($socket,$reponse){
		//include("requete.class.php");
		//$a = new Requete();
		//$reponse = chercherRequete("12");
				include("db.php");
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pwd,$pdo_options);
				$req = $bdd -> prepare("SELECT * FROM Requete WHERE Etat=0 AND idEquipement=?");
				$req -> execute(array("12"));
				$retour = "";
				while($res = $req -> fetch()){
					echo $res['contenu']."\n";
					$retour .= $res['type']."=".$res['contenu']."=".$res['code']."<br/>";
					$reponse = $retour;
					stream_socket_sendto($socket,$reponse,0,$peer);
				}
				$req -> closeCursor();
				
				//return $retour;
		
		echo "Reponse avec succes\r\n";
	}