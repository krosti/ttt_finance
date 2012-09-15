<?php echo $this->Html->css(array('indices_box')); ?>
<?php 
	$indicesARG = array(
			array('id' => "ALUA.BA", 'name' => '')
          , array('id' => "APBR.BA", 'name' => '')
          , array('id' => "BMA.BA", 'name' => '')
          , array('id' => "CEPU2.BA", 'name' => '')
          , array('id' => "COME.BA", 'name' => '')
          , array('id' => "EDN.BA", 'name' => '')
          , array('id' => "ERAR.BA", 'name' => '')
          , array('id' => "FRAN.BA", 'name' => '')
          , array('id' => "GGAL.BA", 'name' => '')
          , array('id' => "LEDE.BA", 'name' => '')
          , array('id' => "MOLI.BA", 'name' => '')
          , array('id' => "PAMP.BA", 'name' => '')
          , array('id' => "PESA.BA", 'name' => '')
          , array('id' => "TECO2.BA", 'name' => '')
          , array('id' => "TS.BA", 'name' => '')
          , array('id' => "YPFD.BA", 'name' => '')
		);
	$indicesIndices = array(
			array('id' => "^MERV")
          , array('id' => "^GSPC") //S&P
          , array('id' => "^DJI") //dow jones
          , array('id' => "^IXIC") //nasdaq
          , array('id' => "^BVSP") 
		);
	$indicesUsa = array(
			array('id' => '^DJA')
		,	array('id' => '^DJI')
		,	array('id' => '^DJT')
		,	array('id' => '^DJU')
		);

	if(isset($setVal)):
		switch ($setVal) {
			case 'argentino':
				$indices = $indicesARG;
				break;
			case 'indices':
				$indices = $indicesIndices;
				break;
			case 'usa':
				$indices = $indicesUsa;
				break;
			default:
				$indices = $indicesARG;
				break;
		}
	else:
		$indices = $indicesARG;
	endif;

?>
<?php if (!isset($setVal)): ?>
<div id="indices_container">
	<div id="indice_list">
		<div class="indice side-nav-button" id="indices">Indices</div>
		<div class="indice selected side-nav-button" id="argentino">Argentino</div>
		<div class="indice side-nav-button" id="usa">USA</div>
	</div>
	<div id="indice_detalles">
		<div id="slider">
			<?php foreach ($indices as $value): ?>
				<div class="box_valores box_s" id="<?php echo str_replace('.', '_', $value['id']); ?>">
					<span class="market"><?php echo $value['id']; ?></span>
					<span class="price"></span>
					<span class="diff"></span>
					<span class="perc"></span>
					<div class="sgraph"><?php echo $this->Html->image('http://ichart.finance.yahoo.com/h?s='.$value['id'].'&amp;lang=en-US&amp;region=ar');?></div>
				</div>
			<?php endforeach ?>
		</div>	
	</div>
</div>

<?php else: ?>
	<?php foreach ($indices as $value): ?>
		<?php $id = ($setVal == 'argentino') ? str_replace('.', '_', $value['id']) : str_replace('^', '^', $value['id']) ; ?>
		<div class="box_valores box_s" id="<?php echo $id; ?>">
			<span class="market"><?php echo $value['id']; ?></span>
			<span class="price"></span>
			<span class="diff"></span>
			<span class="perc"></span>
			<div class="sgraph"><?php echo $this->Html->image('http://ichart.finance.yahoo.com/h?s='.$value['id'].'&amp;lang=en-US&amp;region=ar');?></div>
		</div>
	<?php endforeach ?>
<?php endif; ?>