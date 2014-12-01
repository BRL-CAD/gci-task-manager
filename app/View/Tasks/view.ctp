<div class="tasks view">
	<h2><?php echo __('Task'); ?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($task[ 'Task'][ 'title']); ?>&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h(implode( ", ",$task[ 'Task'][ 'category'])); ?>&nbsp;
		</dd>
		<dt><?php echo __('Beginner'); ?></dt>
		<dd>
			<?php echo $task[ 'Task'][ 'beginner']? "Yes": "No"; ?>&nbsp;
		</dd>
		<dt><?php echo __('Tags'); ?></dt>
		<dd>
			<?php echo h($task[ 'Task'][ 'tags']); ?>&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo $task[ 'Task'][ 'description']; ?>&nbsp;
		</dd>
		<dt><?php echo __('Length'); ?></dt>
		<dd>
			<?php echo h($task[ 'Task'][ 'length'].' hours'); ?>&nbsp;
		</dd>
		<dt><?php echo __('Mentors'); ?></dt>
		<dd>
			<?php echo h($task[ 'Task'][ 'mentors']); ?>&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
			<?php echo $this->Html->link(__('List Tasks'), array('action' => 'index')); ?></li>
		<li>
			<?php echo $this->Html->link(__('Edit Task'), array('action' => 'edit', $task['Task']['id'])); ?></li>
		<li>
			<?php echo $this->Form->postLink(__('Delete Task'), array('action' => 'delete', $task['Task']['id']), array(), __('Are you sure you want to delete # %s?', $task['Task']['id'])); ?></li>
		<li>
			<?php echo $this->Html->link(__('New Task'), array('action' => 'add')); ?></li>
	</ul>
</div>
