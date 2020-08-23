<?php echo $this->element('tinymce');?>
<div class="fatty form">
	<?php //debug($this->request->data);?>
		

	<h3>Cours: <?php echo $this->request->data['Cours']['titre'];?> 
	<small class="pull-right">Professeur: 
		<?php echo $this->Crud->professor_view($professeur);?>
	</small>
	
	
	</h3>
<?php echo $this->Form->create('Landing'); ?>
	<fieldset>
		<legend><?php echo __('Page d\'atterissage'); ?>. 
		
		</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('style'=>'width: 600px;'));
		echo $this->Form->input('description');
		echo $this->Form->hidden('professeur_id');
		echo $this->Form->input('syllabus');	
		//echo $this->Form->input('login');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $this->Form->value('Landing.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Landing.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Landings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
	</ul>
</div>
