<div class="fatty">
<h2>
		Cours: <?php echo $this->Html->link($tuile['Cours']['titre'], array('controller' => 'cours', 'action' => 'view', $tuile['Cours']['id'])); ?>
		<small class="pull-right">
			<?php echo $this->Crud->professor_view($tuile['Professeur']);?>
		</small>
</h2>


<div class="row">

<?php if($tuile['Tuile']['full_row']==true) : ?>
			<div class="captioned <?php echo $tuile['Couleur']['title'];?>">
				<h4><?php echo $tuile['Tuile']['title'];?></h4>
				<div class="<?php echo $tuile['Tuile']['model_id'];?>">
					<?php echo $tuile['Tuile']['description'];?>
				</div>
			</div>
	<?php  else: ?>
<?php 
$cols = 3;
?>
	<div class="<?php echo sprintf('col-lg-%d', 12/$cols);?>">
	
		<div class="captioned <?php echo $tuile['Couleur']['title'];?>">
			<h4><?php echo $tuile['Tuile']['title'];?></h4>
			<div class="<?php echo $tuile['Tuile']['model_id'];?>">
					<?php echo $tuile['Tuile']['description'];?>
			</div>
		</div>
	</div>
<?php endif;?>
<p><strong>Modele:</strong> <?php echo $tuile['Tuile']['model_id'];?></p>

</div>

</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Editer cette Tuile'), array('action' => 'edit', $tuile['Tuile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Effacer la Tuile'), array('action' => 'delete', $tuile['Tuile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tuile['Tuile']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Tuiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle Tuile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
	</ul>
</div>
