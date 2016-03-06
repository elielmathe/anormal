<?php
	//socket_create_listen(1200);
	echo "<pre>";
	$ligne = shell_exec("ping 127.0.0.2 -c 4");
	echo $ligne;
