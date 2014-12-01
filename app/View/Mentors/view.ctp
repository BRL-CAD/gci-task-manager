<div class="mentors view">
<h2><?php echo __('Mentor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mentor['Mentor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Melange Name'); ?></dt>
		<dd>
			<?php echo h($mentor['Mentor']['melange_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mentor'), array('action' => 'edit', $mentor['Mentor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mentor'), array('action' => 'delete', $mentor['Mentor']['id']), array(), __('Are you sure you want to delete # %s?', $mentor['Mentor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mentors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mentor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tasks'); ?></h3>
	<?php if (!empty($mentor['Task'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Background'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th><?php echo __('References'); ?></th>
		<th><?php echo __('Modify'); ?></th>
		<th><?php echo __('Category'); ?></th>
		<th><?php echo __('Mentors'); ?></th>
		<th><?php echo __('Tags'); ?></th>
		<th><?php echo __('Beginner'); ?></th>
		<th><?php echo __('Length'); ?></th>
		<th><?php echo __('Parent'); ?></th>
		<th><?php echo __('Copies'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($mentor['Task'] as $task): ?>
		<tr>
			<td><?php echo $task['id']; ?></td>
			<td><?php echo $task['title']; ?></td>
			<td><?php echo $task['description']; ?></td>
			<td><?php echo $task['background']; ?></td>
			<td><?php echo $task['action']; ?></td>
			<td><?php echo $task['references']; ?></td>
			<td><?php echo $task['modify']; ?></td>
			<td><?php echo $task['category']; ?></td>
			<td><?php echo $task['mentors']; ?></td>
			<td><?php echo $task['tags']; ?></td>
			<td><?php echo $task['beginner']; ?></td>
			<td><?php echo $task['length']; ?></td>
			<td><?php echo $task['parent']; ?></td>
			<td><?php echo $task['copies']; ?></td>
			<td><?php echo $task['created']; ?></td>
			<td><?php echo $task['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tasks', 'action' => 'edit', $task['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tasks', 'action' => 'delete', $task['id']), array(), __('Are you sure you want to delete # %s?', $task['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
