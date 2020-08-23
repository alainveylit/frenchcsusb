<div class="fatty form">
<?php echo $this->Form->create('Etudiant'); ?>
	<fieldset>
		<legend><?php echo __('Edit Etudiant'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('courriel');
		echo $this->Form->input('class');
		echo $this->Form->input('major');
		echo $this->Form->input('enrolled');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Etudiant.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Etudiant.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Etudiants'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
