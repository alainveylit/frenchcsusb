<div>
<div class="fatty row">
<?php //debug($story);?>
<h2>			
	<?php echo $story['Story']['title']; ?>
	<small class="pull-right">
	
	 Cours: <?php echo $this->Html->link($story['Cours']['titre'], array('controller' => 'cours', 'action' => 'view', $story['Cours']['id'])); ?>
	</small>

</h2>
<p>	<?php echo $this->Crud->view_crud('Story', $story['Story']);?>
</p>
	<h4><?php echo $story['Story']['credit'];?></h4>
<div>
			<div class="cartouche">
				<?php if(!empty($story['Story']['image'])) {
					echo $this->Crud->show_upload_image('story', $story['Story']);
				}?>
			</div>

	<?php echo $story['Story']['histoire']; ?>
</div>

<h5>
	Last modified: <?php echo $this->Time->niceShort($story['Story']['modified']); ?>
</h5>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Editer l\'histoire'), array('action' => 'edit', $story['Story']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Effacer cette histoire'), array('action' => 'delete', $story['Story']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $story['Story']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des histoires'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle histoire'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
	</ul>
</div>
</div>
