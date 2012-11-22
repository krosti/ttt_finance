<script type="text/javascript" src="http://cdn.aloha-editor.org/latest/lib/require.js"></script>
 
<!-- load the Aloha Editor core and some plugins -->
<script src="http://cdn.aloha-editor.org/latest/lib/aloha.js"
                   data-aloha-plugins="common/ui,
                                        common/format,
                                        common/list,
                                        common/link,
                                        common/paste,
                                        common/undo">
</script>

<!-- load the Aloha Editor CSS styles -->
<link href="http://cdn.aloha-editor.org/latest/css/aloha.css" rel="stylesheet" type="text/css" />

<!-- make all elements with class="editable" editable with Aloha Editor -->
<script type="text/javascript">
     Aloha.ready( function() {
            var $ = Aloha.jQuery;
            $('.editable').aloha();
     });
</script>

<!--END EDITOR-->

<div class="posts form">
	<?php echo $this->Form->create('Post',array('type'=>'file')); ?>
		<fieldset>
			<legend><?php echo __('Agregar Nuevo Posteo'); ?></legend>
		<?php
			echo $this->Form->input('titulo');
			echo $this->Form->input('descripcion',array('rows'=>25,'class'=>'editable') );
			#echo $this->Form->input('serie_datos');
			echo $this->Form->input('serie_datos_pie',array('label'=>'Pie de foto') );
			echo $this->Form->input('tipo_id');
			#echo $this->Form->input('visitas');
			$this->Form->input('user_id',array('value'=>$this->Session->read('User')) );
			#echo $this->Upload->add('Post');
			#echo $this->Form->input('image', array('type' => 'file'));
			echo $this->Form->input('image',array('type'=>'hidden'));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<?php echo $this->element('uploadById',array('id'=>'PostImage')); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('controller' => 'tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo'), array('controller' => 'tipos', 'action' => 'add')); ?> </li>
	</ul>
</div>
