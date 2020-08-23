<?php echo $this->element('tinymce', array('_simple'=>true));?>
<style>
	.half { width: 30%; float: left; margin: 0 1%; }
</style>
<div class="fatty form">
<div>
	<?php echo $this->Form->create('Presentation', ['type' => 'file']); ?>
	<fieldset style="min-width: 100%;">
		<legend><?php echo __('Présentation'); ?> de : <?php echo $this->request->data['Creator']['name'];?>
			<small class="pull-right">Cours: <?php echo $this->request->data['Cours']['titre'];?></small>
		</legend>
		
	<?php echo $this->Form->input('id'); ?>
	
	<h4>Titre: 	<?php echo $this->Form->value('titre');?></h4>
		<div class="row">
			<div class="col-lg-7"><?php echo $this->Form->value('description');?></div>
			<div class="col-lg-5"><?php echo $this->Form->input('comments');?></div>
		</div>
</fieldset>

<fieldset>
		<div class="row" style="margin-top: 1em; border-top: 1px solid gray; padding-top: 1em;">
			<span class="half">	<?php echo $this->Form->input('status', ['options' => $statuses]); ?></span>
			<span class="half">
			<span class="half">	<?php echo $this->Form->input('document', ['type' => 'file']); ?></span>
			<span class="half">
				Public: <?php echo $this->Form->checkbox('public');?>
			</span>
		</div>

		<?php 
		
		echo $this->Form->input('document_dir', ['type' => 'hidden']); 
		echo $this->Form->hidden('creator');
	?>
	</fieldset>
	

	<?php echo $this->Form->end(__('Enregistrer')); ?>

</div>

	<?php //debug($this->request->data);?>

	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><?php echo $this->Form->postLink(__('Effacer cette présentation'), array('action' => 'delete', $this->Form->value('Presentation.id')), array('class'=>'erase'), __('Are you sure you want to delete # %s?', $this->Form->value('Presentation.id'))); ?></li>
			<li><?php echo $this->Html->link(__('Mes Présentations'), array('action' => 'index')); ?></li>
		</ul>
	</div>
</div>

<?php echo $this->element('keyboard');?>
