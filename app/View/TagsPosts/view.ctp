<div class="tagsPosts view">
<h2><?php  echo __('Tags Post'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tagsPost['TagsPost']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tagsPost['Tag']['id'], array('controller' => 'tags', 'action' => 'view', $tagsPost['Tag']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tagsPost['Post']['id'], array('controller' => 'posts', 'action' => 'view', $tagsPost['Post']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tags Post'), array('action' => 'edit', $tagsPost['TagsPost']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tags Post'), array('action' => 'delete', $tagsPost['TagsPost']['id']), null, __('Are you sure you want to delete # %s?', $tagsPost['TagsPost']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags Posts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tags Post'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
