<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php echo $this->Form->create('Cour'); ?>
	<fieldset>
		<legend><?php echo __('Editer ce Cours'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titre', ['style'=>'width: 500px;']);
		echo $this->Form->hidden('creator', ['value'=>$creator]);
		
		echo $this->Form->input('weekly_comments');
		//echo  $this->Form->input('slug');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Form->postLink(__('Effacer'), 
			array('action' => 'delete', $this->Form->value('Cour.id')), array('class'=>'erase', 'confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Cour.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Mes Cours'), array('action' => 'index'), ['class'=>'list']); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Etudiants'), array('controller' => 'etudiants', 'action' => 'index'), ['class'=>'list']); ?> </li>
	</ul>
</div>
