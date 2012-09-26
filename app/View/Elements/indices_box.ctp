<?php echo $this->Html->css(array('indices_box')); ?>
<?php 
	$indicesARG = array(
			array('id' => "ALUA.BA")
          , array('id' => "APBR.BA")
          , array('id' => "BMA.BA")
          , array('id' => "CEPU2.BA")
          , array('id' => "COME.BA")
          , array('id' => "EDN.BA")
          , array('id' => "ERAR.BA")
          , array('id' => "FRAN.BA")
          , array('id' => "GGAL.BA")
          , array('id' => "LEDE.BA")
          , array('id' => "MOLI.BA")
          , array('id' => "PAMP.BA")
          , array('id' => "PESA.BA")
          , array('id' => "TECO2.BA")
          , array('id' => "TS.BA")
          , array('id' => "YPFD.BA")
		);
	$indicesIndices = array(
			array('id' => "^MERV", 'name' => 'Merval')
          , array('id' => "^GSPC", 'name'=>'S&P') //S&P
          , array('id' => "^DJI", 'name'=>'Dow Jones') //dow jones
          , array('id' => "^IXIC", 'name'=>'Nasdaq') //nasdaq
          , array('id' => "^BVSP", 'name'=>'Bovespa') 
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
		<div class="indice" id="indices">Indices</div>
		<div class="indice selected" id="argentino">Argentino</div>
		<div class="indice" id="usa">USA</div>
	</div>
	<div id="indice_detalles">
		<div id="slider">
			<?php foreach ($indices as $value): ?>
				<div class="box_valores box_s" id="<?php echo str_replace('.', '_', $value['id']); ?>">
					<span class="market"><?php echo (isset($value['name'])) ? $value['name'] : $value['id']; ?></span>
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
			<span class="market"><?php echo (isset($value['name'])) ? $value['name'] : $value['id']; ?></span>
			<span class="price"></span>
			<span class="diff"></span>
			<span class="perc"></span>
			<div class="sgraph"><?php echo $this->Html->image('http://ichart.finance.yahoo.com/h?s='.$value['id'].'&amp;lang=en-US&amp;region=ar');?></div>
		</div>
	<?php endforeach ?>
<?php endif; ?>