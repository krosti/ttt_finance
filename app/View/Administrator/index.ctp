
<div style="background:#e3e3e3;">
	<button>Posts</button>
	<?php echo $this->Html->link('Agregar nuevo','/posts/add'); ?>|
	<?php echo $this->Html->link('Administrar','/posts'); ?>
</div>
<br>
<div style="background:#e3e3e3;">
	<button>Banners</button>
	<?php echo $this->Html->link('Agregar nuevo','/banners/add'); ?>|
	<?php echo $this->Html->link('Administrar','/banners'); ?>
</div>
<br>
<div style="background:#e3e3e3;">
	<button>Comentarios</button>
	<?php echo $this->Html->link('Moderar','/comments'); ?>
</div>
<br><br>
<table width="100%">
	<tr>
		<td style="color:#ccc">Usuarios Registrados</td>
		<td style="color:#ccc"><?php echo count($users) ?> </td>
	</tr>
	<tr>
		<td style="color:#96FF96">Usuarios Activos</td>
		<td style="color:#96FF96"><?php echo count($usersActivos) ?> </td>
	</tr>
</table>