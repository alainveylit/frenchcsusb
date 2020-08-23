<?php echo $this->element('tinymce');?>
<style>
.half { width:24%; float: left; margin: 0 1%; }
</style>
<div class="fatty">
	<?php //debug($User);?>
	<?php echo $this->Form->create('Presentation', ['type' => 'file']); ?>
		<fieldset>
			<legend><?php echo __('Ajouter une Présentation'); ?>		
				<small class="pull-right"><?php echo $this->Form->input('cours', ['options'=>$cours]);?></small>
			</legend>
		<?php
		//debug($cours);
			echo $this->Form->input('titre', array('style'=>'width:700px'));
		?>
		<div class="row">
			<span class="half">
				<?php echo $this->Form->input('medium', array('options'=>$media));?>
			</span>
			<span class="half">
				<?php echo $this->Form->input('focus', array('options'=>$focuses));?>
			</span>
			<span class="half">
				Public: <?php echo $this->Form->checkbox('public');?>
			</span>
			<span></span>
		</div>
	<?php
		echo $this->Form->input('description', array('label'=>'Brouillon', 'after'=>'<i>Composez votre texte, puis faites un copier/coller pour produire un PDF</i>'));
		echo $this->Form->input('vocabulaire', array('after'=>'<i>Ajoutez des mots et expressions en rapport avec le thème de votre composition.</i>'));
		
		echo $this->Form->input('document', ['type' => 'file', 'after'=>'Formats autorisés: PDF, docx, image']); 
		echo $this->Form->input('document_dir', ['type' => 'hidden']); 
		echo $this->Form->hidden('creator', array('value'=>$creator));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><a href="https://www.dicodesrimes.com" target="_new">Dictionnaire de rimes</a></li>
			<li><a href="https://bonpatron.com/en/"  target="_new">Bon patron</a></li>
			<li><?php echo $this->Html->link(__('Mes Présentations'), array('action' => 'index')); ?></li>
		</ul>
	</div>

<?php echo $this->element('keyboard');?>
