<div class="tasks form">
<?php echo $this->Form->create('Task'); ?>
	<fieldset>
		<legend><?php echo __('Add Task'); ?></legend>
	<?php
		echo $this->Form->input('title');
                echo $this->Form->input('category',array('div'=>array('class'=>'required'), 'type'=>'select','multiple' => true,'size'=>5,'options'=>array(
                "Code"=>"Code",
                "Documentation/Training"=>"Documentation/Training",
                "Outreach/Research"=>"Outreach/Research",
                "Quality Assurance"=> "Quality Assurance",
                "User Interface"=>"User Interface"
                )));
                echo $this->Form->input('beginner',array('label'=>'Beginner Task'));
                echo $this->Form->input('tags');
                if(empty($this->request->data['Task']['description'])||!empty($this->request->data['Task']['action'])){
                echo $this->Form->input('background');
                echo $this->Form->input('action');
                echo $this->Form->input('references');
                echo $this->Form->input('modify');
                } else {
                     echo $this->Form->input('description');
                }
                echo $this->Form->input('length', array('label'=>'Length (Hours)'));
                echo $this->Form->input('Mentor');	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Task.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Task.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'index')); ?></li>
	</ul>
</div>
