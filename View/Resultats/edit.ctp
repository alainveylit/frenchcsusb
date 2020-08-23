<div class="fatty form">
	<div>
<?php echo $this->Form->create('Resultat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Resultat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('test_id');
		echo $this->Form->input('etudiant_id');
		echo $this->Form->input('taken');
		echo $this->Form->input('grade');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Resultat.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Resultat.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Resultats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tests'), array('controller' => 'tests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test'), array('controller' => 'tests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Etudiants'), array('controller' => 'etudiants', 'action' => 'index')); ?> </li>
	</ul>
</div>
</div>
