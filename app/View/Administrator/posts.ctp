<?php 

	echo $this->Html->script(array(
		//libs
		'html2canvas',
		'jsfeedback',
		//ourAPPS
		'jsTTT/application',
		'jsTTT/crawler-with-yahooquery',
		'jsTTT/symbols',
		'jsTTT/ui',
		'jsTTT/gchart'
	));

	count($articles);
?>

<div id="results"></div>

<div id="graphic-wrapper">
	<div id="chart_div"></div>
</div>

<button id="take-screenshot">Take Screenshot</button>