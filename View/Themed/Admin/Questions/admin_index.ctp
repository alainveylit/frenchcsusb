<div class=" index">
		
<div class="fatty row">
	<h2><?php echo __('Questions'); ?>
	<?php if(isset($quiz) ):?>
		<small class="pull-right">
			<?php $quiz_id = key($quiz);
			echo $this->Html->link(__('Exercice:') . reset($quiz), array('controller'=>'quizzes', 'action'=>'view', key($quiz)));?> 
		</small>
	<?php endif;?>
	</h2>
	<hr>
			<ul class="list-inline pull-right">
				<?php if(isset($quiz_id)) :?>
					<li><?php echo $this->Html->link(__('Nouvelle Question'), array('action' => 'add', $quiz_id)); ?></li>
				<?php endif;?>
				<li><?php echo $this->Html->link(__('Liste des exercices'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Nouvel exercice'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
			</ul>

<?php //debug($questions);?>
	
	<table class="table table-striped">
		<caption>	
			<small >Total: <?php echo count($questions);?> questions</small>
		</caption>
	<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('index'); ?></th>
				<th>Image</th>
				<th><?php echo $this->Paginator->sort('text', 'Texte'); ?></th>
				<th>Reponse</th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($questions as $question): ?>
			<tr>
				<td><?php echo h($question['Question']['index']); ?>&nbsp;</td>
				
					<?php //echo $this->Html->link($question['Quiz']['title'], array('controller' => 'quizzes', 'action' => 'view', $question['Quiz']['id'])); ?>
			<?php 
				$image_url = $this->Crud->get_upload_image('question', $question['Question'], null, true);
				//debug($image_url);
			?>
			<td>
					<?php if(!empty($image_url)) echo $image_url;?>
			</td>
		
				<td><?php echo $question['Question']['text']; ?>&nbsp;</td>
				<td>
					<?php 
					foreach($question['Response'] as $response) {
						echo '<span class="response">', $response['title'], '</span>&nbsp;'; 
					}
					?>
				
				</td>
				
				<td class="actions">
					<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $question['Question']['id'])); ?>
					<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $question['Question']['id'])); ?>
					<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $question['Question']['id']), array(), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
	<?php /*
	<p>
	<?php 
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pager">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>*/?>
</div>

<?php if ($User['role']=='Admin'):?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<?php if(isset($quiz_id)) :?>
		<li><?php echo $this->Html->link(__('Nouvelle Question'), array('action' => 'add', $quiz_id)); ?></li>
		<?php endif;?>
		<li><?php echo $this->Html->link(__('Liste des exercices'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvel exercice'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php endif;?>
</div>
