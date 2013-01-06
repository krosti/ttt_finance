<?php echo $this->Html->script(array('/wysihtml5/parser_rules/advanced.js','/wysihtml5/dist/wysihtml5-0.3.0.min.js') ); ?>
<?php echo $this->Html->css(array('wysihtml5/css/stylesheet.css','/wysihtml5/css/toolbar.css')); ?>

<div id="wysihtml5-editor-toolbar">
	<ul class="commands">
	  <li data-wysihtml5-command="bold" title="Make text bold (CTRL + B)" class="command"></li>
	  <li data-wysihtml5-command="italic" title="Make text italic (CTRL + I)" class="command"></li>
	  <li data-wysihtml5-command="insertUnorderedList" title="Insert an unordered list" class="command"></li>
	  <li data-wysihtml5-command="insertOrderedList" title="Insert an ordered list" class="command"></li>
	  <li data-wysihtml5-command="createLink" title="Insert a link" class="command"></li>
	  <!--li data-wysihtml5-command="insertImage" title="Insert an image" class="command"></li>
	  <li data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" title="Insert headline 1" class="command"></li>
	  <li data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" title="Insert headline 2" class="command"></li-->
	  <li data-wysihtml5-command-group="foreColor" class="fore-color" title="Color the selected text" class="command">
	    <ul>
	      <!--li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="silver"></li>
	      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="gray"></li>
	      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="maroon"></li-->
	      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"></li>
	      <!--li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="purple"></li-->
	      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green"></li>
	      <!--li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="olive"></li>
	      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="navy"></li-->
	      <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue"></li>
	    </ul>
	  </li>
	  <li data-wysihtml5-command="insertSpeech" title="Insert speech" class="command"></li>
	  <li data-wysihtml5-action="change_view" title="Show HTML" class="action"></li>
	</ul>
</div>

<!--END EDITOR-->

<div class="posts form">
	<?php echo $this->Form->create('Post',array('type'=>'file')); ?>
		<fieldset>
			<legend><?php echo __('Agregar Nuevo Posteo'); ?></legend>
		<?php
			echo $this->Form->input('titulo');
			echo $this->Form->input('descripcion',array('rows'=>25,'class'=>'editable','id'=>'wysihtml5-textarea') );
			#echo $this->Form->input('serie_datos');
			echo $this->Form->input('serie_datos_pie',array('label'=>'Pie de foto') );
			echo $this->Form->input('descripcion_fb',array('label'=>'Desc Facebook') );
			echo $this->Form->input('tipo_id');
			#echo $this->Form->input('visitas');
			echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$this->Session->read('User.id')) );
			echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$this->Session->read('User.username')) );
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

<script>
var editor = new wysihtml5.Editor("wysihtml5-textarea", { // id of textarea element
  toolbar:      "wysihtml5-editor-toolbar", // id of toolbar element
  stylesheets: ["../wysihtml5/css/stylesheet.css"],
  parserRules:  wysihtml5ParserRules // defined in parser rules set 
});
</script>