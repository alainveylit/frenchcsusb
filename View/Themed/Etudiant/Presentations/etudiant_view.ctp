<style>
.comments { border: 1px solid lightgray; }
.comments h4 { background-color: lightgreen; margin: 0; padding: 4px 12px; }
.comments div { padding: 4px 12px; }
</style>
<div class="fatty row">
	<?php if(empty($presentation['Presentation']['id'])):?>
			<h4>Cette presentation n\'existe pas.</h4>
		<?php return;?>
	<?php endif;?>
	<h2><?php echo $presentation['Presentation']['titre']; ?>
			<small class="pull-right">
				<ul class="list-inline">
					 <li> <span class="glyphicon glyphicon-list"> </span> <?php echo $this->Html->link(__('Mes Présentations'), array('action' => 'index')); ?> </li>
					 <li> <span class="glyphicon glyphicon-edit"> </span> <?php echo $this->Html->link(__('Editer'), array('action' => 'edit',  $presentation['Presentation']['id'])); ?> </li>
				</ul>
			</small>

	</h2>

	<div class="cartouche bordered wide">
		<h3><strong>Medium: </strong><?php echo $presentation['Presentation']['medium']; ?> -- Status: <?php echo $presentation['Presentation']['status']; ?>
			<small class="pull-right"><?php echo $presentation['Presentation']['focus'];?></small>
		</h3>
		<?php //debug($presentation);?>
		
		<?php if(!empty($this->request->data['Presentation']['comments'])):?>
		<div class="comments">
				<h4>Commentaires du prof:</h4>
				<div><?php echo $this->request->data['Presentation']['comments'];?></div>							
		</div>
	<?php endif;?>

			<?php echo $this->element('presentation', array('document'=>$presentation['Presentation']));?>
		<div class="text">
			<?php //echo $this->Crud->show_upload_image('presentation', $presentation['Presentation']); ?>
			<?php echo $presentation['Presentation']['description']; ?>
		</div>
		
		<div class="comments">
			<h4>Commentaires du prof:</h4>
			<div><?php echo $presentation['Presentation']['comments'];?></div>
		</div>
		
			<div class="cartouche" style="background:#efefef;">
			<h3><a href="javascript:" class="toggler">Vocabulaire</a></h3>
				<div class="columns-2" style="display: none;">
					<?php echo $presentation['Presentation']['vocabulaire']; ?>
				</div>
			</div>
		</div>

		<div class="actions">
			<?php //echo $this->Crud->view_crud('Presentation', $presentation['Presentation']);?>
		</div>
</div>

