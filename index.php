<?php
	echo "<pre> Echo la terre";
	$fichier = fopen("MonFichier.txt","r");
	while($ligne = fread($fichier, 100)){
		echo $ligne."<br/>";
	}
	fclose($fichier);
