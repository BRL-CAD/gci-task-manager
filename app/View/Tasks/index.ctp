<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="tasks index">
        <h2><?php echo __('Tasks'); ?></h2>
        <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            			<th><?php echo $this->Paginator->sort('id'); ?></th>            
						<th><?php echo $this->Paginator->sort('title'); ?></th>
                        <th><?php echo $this->Paginator->sort('category'); ?></th>   
                        <th><?php echo $this->Paginator->sort('beginner'); ?></th>  
                        <th><?php echo $this->Paginator->sort('length'); ?></th>  
                        <th><?php echo $this->Paginator->sort('mentors'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>   
        </thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
        <tr>
				<td><?php echo $this->Html->link(h($task['Task']['id']),array('action' => 'edit', $task['Task']['id'])); ?>&nbsp;</td> 
                <td><?php echo h($task['Task']['title']); ?>&nbsp;</td>   
                <td><?php echo h(implode(", ",$task['Task']['category'])); ?>&nbsp;</td>   
                <td><?php echo $task['Task']['beginner']?'Yes':'No'; ?>&nbsp;</td>
                <td><?php echo h($task['Task']['length']); ?>&nbsp;</td>
				<td><?php echo h($task['Task']['mentors']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $task['Task']['id']), array(), __('Are you sure you want to delete # %s?', $task['Task']['id'])); ?>
					<?php echo $this->Html->link(__('Copy'), array(), array('class'=>'copy' ,'data-id'=>$task['Task']['id'])); ?> 
                </td>
        </tr>
<?php endforeach; ?>
        </tbody>
        </table>
        <p>
        <?php
        echo $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>      </p>
        <div class="paging">
        <?php
                echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
        </div>
</div>
<div class="actions">
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
         	<li><?php echo $this->Html->link(__('New Task'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('Export CSV'), array('action' => 'export')); ?></li>
        </ul>
</div>

<script type="text/javascript">
	$(function(){
	$('.copy').click(function(e){
		e.preventDefault();
		console.log(e);
		var id = $(e.target).data('id');
    	var copies = prompt("How many copies do you want to make", 1);
		if (copies != '' && copies != null && copies != '0') {
			 if(copies == '1'){
				window.location.assign("<?php echo Router::url( array('action'=>'add')); ?>"+"/"+id);
			 } else {
			 	$(location).attr('href',"<?php echo Router::url( array('action'=>'replicate')); ?>"+"/"+id+"/"+copies);
			 }
		}
	});});
</script>
