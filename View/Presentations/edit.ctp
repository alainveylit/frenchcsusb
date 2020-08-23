<?php echo $this->element('tinymce', array('_simple'=>true));?>
<style>
.half { width: 24%; float: left; margin: 0 1%; }
</style>
<div class="fatty form">
	<?php //debug($this->request->data);?>
<div>
	<?php echo $this->Form->create('Presentation', ['type' => 'file']); ?>
	<fieldset style="min-width: 100%;">
		<legend><?php echo __('Editer ma présentation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titre', array('style'=>'width: 600px;'));
	?>
		<div class="row">
			<div class="col-lg-9"><?php echo $this->Form->input('description');?></div>
			<div class="col-lg-3" id="vocab"><?php echo $this->Form->input('vocabulaire', array('id'=>'vocabulary'));?></div>
		</div>
		<div class="row">

			<span class="half">
				<?php echo $this->Form->input('status', array('options'=>$statuses));?>
			</span>
			<span class="half">
				<?php echo $this->Form->input('medium', array('options'=>$media));?>
			</span>
			<span class="half">
				<?php echo $this->Form->input('focus', array('options'=>$focuses));?>
			</span>
			<span class="half">
				Public: <?php echo $this->Form->checkbox('public');?>
			</span>
		</div>

		<?php 
		
		echo $this->Form->input('document', ['type' => 'file']); 
		echo $this->Form->input('document_dir', ['type' => 'hidden']); 
		echo $this->Form->hidden('creator');
	?>
	</fieldset>
	

	<?php echo $this->Form->end(__('Submit')); ?>

</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><a href="https://www.dicodesrimes.com" target="_new">Dictionnaire de rimes</a></li>
			<li><a href="https://bonpatron.com/en/"  target="_new">Bon patron</a></li>
			<li><?php echo $this->Form->postLink(__('Effacer cette présentation'), array('action' => 'delete', $this->Form->value('Presentation.id')), array('class'=>'erase'), __('Are you sure you want to delete # %s?', $this->Form->value('Presentation.id'))); ?></li>
			<li><?php echo $this->Html->link(__('Mes Présentations'), array('action' => 'index')); ?></li>
		</ul>
	</div>
</div>
<?php echo $this->element('keyboard');?>
