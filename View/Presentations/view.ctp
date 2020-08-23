<div class="fatty row">
	<?php if(empty($presentation['Presentation']['id'])):?>
			<h4>Cette presentation n\'existe pas.</h4>
		<?php return;?>
	<?php endif;?>
	<h2><?php echo $presentation['Presentation']['titre']; ?>
		<small class="pull-right">
			<?php echo $this->Html->link(__('Liste des Presentations'), array('action' => 'index')); ?> 
		</small>
	</h2>
	<?php //debug($presentation);?>
	<div class="cartouche bordered wide">
		<h3><strong>Medium: </strong><?php echo $presentation['Presentation']['medium']; ?>
			<small class="pull-right"><?php echo $presentation['Presentation']['focus'];?></small>
		</h3>
			<?php echo $this->element('presentation', array('document'=>$presentation['Presentation']));?>
		<div class="text">
			<?php //echo $this->Crud->show_upload_image('presentation', $presentation['Presentation']); ?>
			<?php echo $presentation['Presentation']['description']; ?>
		</div>
		<h4><a href="javascript:" class="toggler">Vocabulaire</a></h4>
		<div class="row" style="display: none;">
			<?php echo $presentation['Presentation']['vocabulaire']; ?>
		</div>

	</div>

		<div class="actions">
			<?php //echo $this->Crud->view_crud('Presentation', $presentation['Presentation']);?>
		</div>
</div>
<script>

$('document').ready( function() {
	$('.toggler').click( function() {
		$(this).parent().next().toggle();
	});
});

</script>

