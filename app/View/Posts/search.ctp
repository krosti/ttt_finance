<?php 

	echo "Resultados encontrados: ".count($results);
	echo "<br>";
	foreach ($results as $result) {
		echo $result['Post']['id'];
		echo "<br>";
	}
 ?>