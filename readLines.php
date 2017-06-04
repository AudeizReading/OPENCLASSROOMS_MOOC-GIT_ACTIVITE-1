<?php
// Petit script qui permet d'afficher notre script PHP comme dans un EDI tout en l'exécutant. M'est très utile en période de formation sur langages de programmation.
function readLines($filenName) {
	// Si le fichier est inexistant, on ne continue pas
	if(!$file = fopen($fileName, 'r')) {
		return;
	}

	// Tant qu'il reste des lignes à parcourir
	while(($line = fgets($file)) !== false) {
		// On dit à PHP que cette ligne du fichier fait office de "prochaine entrée du tableau"
		yield $line;
	}

	fclose($file);
}

/**
*
* Dans cette partie du script, on écrit le code qu'on souhaite lire
* dans le navigateur, tout en l'exécutant.
*
*/

echo '<hr/><pre>'; // A partir d'ici, le script est lu.

$generator = readLines(__FILE__); // Si pb avec __FILE__, indiquer, à la place, le nom du script courant ou du script désiré.

foreach($generator as $key => $line) {
	echo '<span style="color: red; font-size: 0.8em;">'.++$key.'</span>&nbsp;&nbsp;'.htmlspecialchars($line);
}

echo '</pre><hr/>';
