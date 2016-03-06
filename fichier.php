<?php
	$fichier = fopen("MonFichier.txt","a+");
	fwrite($fichier,$chaine,100);
	fclose($fichier);
