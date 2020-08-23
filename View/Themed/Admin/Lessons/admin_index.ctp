	<div class="_cartouche">
		<?php //debug($cours);?>
	<h3><?php echo $cours['titre'];?> : <?php echo __('Liste des Leçons'); ?>
		<small class="pull-right">
		<?php echo $this->Crud->index_crud('lessons');?>
	</small>

	</h3>
		<small class="pull-right">				
		<a href="javascript:" id="save-order" class=" green-gradient">Sauvegarder l'ordre des le&ccedil;ons</a>
	</small>

	<table class="table table-striped" id="sort">
	<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('active'); ?></th>
				<th><?php echo $this->Paginator->sort('titre'); ?></th>
				<th><?php echo $this->Paginator->sort('jour'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($lessons as $lesson): ?>
		<tr id="<?php echo $lesson['Lesson']['id'];?>">
			<td>
				<?php $active_class = $lesson['Lesson']['active'] ? 'checked' : 'unchecked';?>
					<a class="activate <?php echo $active_class;?>" href="javascript:" rel="<?php echo $lesson['Lesson']['id'];?>">
					<?php echo ($active_class=="checked") ? "Active" : "Inactive"?>
					</a> 
			</td>
			<td><?php 
				echo $this->Html->link($lesson['Lesson']['titre'], 
					array('action'=>'view', $lesson['Lesson']['id']),  
					array('escape' => false)); ?>
				&nbsp;</td>
			<td>
			<?php $englishdate = $this->Time->format($lesson['Lesson']['jour'],  '%A %e %B %Y à %H:%M');

			echo $this->Crud->display_french_date($englishdate);
			 ?>
			&nbsp;</td>
			<td class="actions">
			<?php if($User['role']=='Admin'):?>
					<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $lesson['Lesson']['id']), ['class'=>'edit']); ?>
					<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $lesson['Lesson']['id']), array('class'=>'erase'), __('Are you sure you want to delete # %s?', $lesson['Lesson']['id'])); ?>
				<?php endif;?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	/*echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pager">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	* */?>
</div>

	<?php if($User['role']=='Admin'):?>
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				<li><?php echo $this->Html->link(__('Nouvelle Lesson'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('Liste des exercices'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Nouvel exercice'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	<?php endif;?>
</div>


<script>

	$('document').ready( function() {	
				
		<?php echo $this->element('sort_js', array('controller'=>'lessons'));?>
		
		$('.activate').click( function() {
				var lesson_id = $(this).attr('rel');
				var node = $(this);
				$.get( "/lessons/toggle_active", { id: lesson_id },  function( data ) {
					node.removeClass('checked' ).removeClass('unchecked' );
					if(data=='checked') {
						node.addClass('checked' ).text("Active");
					} else { node.text("Inactive"); }				
				});
			});
	
	});
</script>

