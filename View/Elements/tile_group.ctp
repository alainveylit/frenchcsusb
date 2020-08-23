	<?php //debug($tile_group);?>

	<?php if(empty($tile_group['Tile'])) return;?>
	<?php 
		if(!isset($cols)) {
			die("No columns or index given");
			//$cols = $tile_group['columns']; $index = $tile_group['index'];
			}?>
		<div class="row">
	
	<?php if(!empty($tile_group['TileGroup']['header'])):?>
		<h2 class="centered light-blue"><?php echo $tile_group['TileGroup']['header']; $cols =$tile_group['TileGroup']['columns']; $index=0;?>
				<?php if($User['role']=='Admin'):?>
						<small class="pull-right">
							<small>
								<span class="glyphicon glyphicon-pencil"> </span> 
								<?php echo $this->Html->link("Editer ce group", array('controller'=>'tile_groups', 'action'=>'edit',  'admin'=>true, $tile_group['TileGroup']['id']));?> | 
								<span class="glyphicon glyphicon-plus"> </span> 
								<?php echo $this->Html->link('Ajouter une colonne', array('controller'=>'tiles', 'action'=>'add', 'admin'=>true, $tile_group['TileGroup']['id']));?>
							</small>
						</small>
				<?php endif;?>
		</h2>
	<?php endif;?>
	
	<?php foreach($tile_group['Tile'] as $tuile) :?>	
	<?php //debug($tuile);?>
	
		<?php if($tuile['full_row']==true) : ?>	
			<?php if(($index%$cols)!=0) echo '</div>';  $index=0; ?>
			<div class="row-fluid">
				<div class="captioned <?php echo $tuile['Couleur']['title'];?>">
					<h4 class="<?php echo $tuile['ajax'];?>"><?php 
					echo (empty($tuile['title_link'])) ? 
										$tuile['title'] : $this->Html->link($tuile['title'], $tuile['title_link']);?>
					<?php if($User['role']=='Admin'):?>
						<small class="pull-right pencil">
							<?php echo $this->Html->link('Editer', array('controller'=>'tiles', 'admin'=>true, 'action'=>'edit', $tuile['id']));?>
						</small>
					<?php endif;?>
				</h4>
					<div>
					<?php if(!empty($tuile['element'])) echo $this->element($tuile['element']);?>
					<?php echo $tuile['description'];?>
					</div>
				</div>
		<?php else: ?>
	
		<?php if(($index%$cols)==0) { echo '<div class="row">'; } ?>

		<div class="<?php echo sprintf('col-lg-%d', 12/$cols);?>">
			<div class="captioned <?php echo $tuile['Couleur']['title'];?>">
				<h4 class="<?php echo $tuile['ajax'];?>"><?php 
				echo (empty($tuile['title_link'])) ? 
										$tuile['title'] : $this->Html->link($tuile['title'], $tuile['title_link']);?>
					<?php if($User['role']=='Admin'):?>
						<small class="pull-right pencil">
							<?php echo $this->Html->link('Editer', array('controller'=>'tiles', 'admin'=>true, 'action'=>'edit', $tuile['id']));?>
						</small>
					<?php endif;?>				
				</h4>
				<div >
					<?php echo $tuile['description'];?>
				</div>
			</div>
		</div>

	<?php if($index && ($index%$cols)==$cols-1) {
		echo '</div>'; $index=0;
	} else { $index++; } ?>

	<?php endif;?>
<?php endforeach;?>

	</div>
	

</div>
<script>
	$( document ).ready(function() {
	
		$('.captioned h4 a').attr('target', '_blank');
			
});
</script>
