<?php echo $this->Html->css(array('resultados_busqueda')); ?>

<div class="extra resultados_busqueda">
	<?php if(isset($result)): ?>
		<div class="resultados">
			<?php echo "Resultados encontrados: ".count($results); ?>
		</div>
		<ul>
			<?php 
				foreach ($results as $result) {
					echo '<li>'.
							$this->Html->image('icons/chart.png',array() ).
							$this->Html->link( $result['Post']['titulo'], '/posts/reporte/'.$result['Post']['id']).
							'<br>'.
								'<span> ['.$this->Text->truncate($result['Post']['descripcion'], 120, array('ending' => '...','exact' => false) ).']'. 
								'</span>'.
						'</li>';
				}
			?>
		</ul>
	<?php else: ?>
		<?php echo $this->Html->css(array('publicidad')); ?>
		<ul id="publicidad_grande">
			<li>
				<span></span>
				<div class="shine"></div>
				<?php echo $this->Html->image('/files/publi1.jpg' ) ?>
			</li>
			<li>
				<span></span>
				<div class="shine"></div>
				<?php echo $this->Html->image('/files/deadmau5.png' ) ?>
			</li>
			<li>
				<span></span>
				<div class="shine"></div>
				<?php echo $this->Html->image('/files/crookers.png' ) ?>
			</li>
		</ul>
	<?php endif; ?>
</div>