<div class="fatty form">
<?php echo $this->Form->create('Resultat'); ?>
<?php debug($etudiant);?>
	<fieldset>
		<legend><?php echo __('Ajouter un R&eacute;sultat de test'); ?></legend>
	<?php
		echo $this->Form->input('test_id');
		echo $this->Form->input('etudiant_id', array('type'=>'text', 'value'=>$etudiant['Etudiant']['id']));
		echo $this->Form->input('taken');
		echo $this->Form->input('grade');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Html->link(__('List Resultats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tests'), array('controller' => 'tests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test'), array('controller' => 'tests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Etudiants'), array('controller' => 'etudiants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Etudiant'), array('controller' => 'etudiants', 'action' => 'add')); ?> </li>
	</ul>
</div>
