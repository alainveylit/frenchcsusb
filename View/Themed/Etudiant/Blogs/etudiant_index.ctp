<div class="blogs wide-margins">
	<h2><?php echo $this->Html->link( __('Mes exercices sur cahier'), array('action'=>'index')); ?>
		<small class="pull-right">
			<span class="glyphicon glyphicon-pencil"> </span> <?php echo $this->Html->link('Ajouter', array('action'=>'add'));?>
			<span class="glyphicon glyphicon-list"> </span> <?php echo $this->Html->link('Deployer', array('action'=>'display'));?>
		</small>
	</h2>
	
	<?php //debug($cours);?>
	<table class="table table-striped">
	<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('title', 'Sujets'); ?></th>
				<th><?php echo $this->Paginator->sort('modified', 'Date'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($blogs as $blog): ?>
	<tr>
		<td><?php echo $this->Html->link($blog['Blog']['title'], array('action' => 'view', $blog['Blog']['id'])); ?></td>
		<td>
		 <?php 
			$englishdate = $this->Time->format($blog['Blog']['created'],  '%A %e %B %Y à %H:%M');
			echo $this->Crud->display_french_date($englishdate);
		 ?>
		 </td>
		<td class="actions">
			<?php //echo $this->Html->link(__('Lire'), array('action' => 'view', $blog['Blog']['id']),  array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $blog['Blog']['id']), array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $blog['Blog']['id']), array('class'=>'erase','confirm' => __('Are you sure you want to delete # %s?', $blog['Blog']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Ajouter une entrée dans mon cahier'), array('action' => 'add'), array('class'=>'add')); ?></li>
	</ul>
</div>
	<hr>
	
	<div class="cartouche beige" style="background:#efefef;">
		<h3><a href="javascript:" class="toggler">Exercices: </a></h3>
			<?php echo $cours['Cour']['weekly_comments'];?>
	</div>
	<p>
	<?php /*
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));*/
	?>	</p>
	<div class="pager">
	<?php /*
		echo $this->Paginator->prev('< ' . __('precedent'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__('suivant') . ' >', array(), null, array('class' => 'next disabled'));
	*/?>
	</div>
</div>

