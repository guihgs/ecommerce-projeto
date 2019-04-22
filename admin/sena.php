<?php
//função que retorna um array com 6 dezenas que os numeros nunca se repitam e que sejam em ordem crescente
function aposta(){
	$sena = array();

	$i = 0;
	while ($i <= 5) {
		$numero = rand(1, 60);
		if (! in_array($numero, $sena)) {
			$sena[] = $numero;
			++$i;
		}
	}
	sort($sena);

	return $sena;
}

?>