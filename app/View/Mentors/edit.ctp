<div class="mentors form">
<?php echo $this->Form->create('Mentor'); ?>
	<fieldset>
		<legend><?php echo __('Edit Mentor'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('melange_name');
		echo $this->Form->input('Task');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Mentor.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Mentor.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mentors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
