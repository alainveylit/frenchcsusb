<?php 
//debug($index);
if($cols==0) $cols = 2;
?>

	<?php if($tuile['full_row']==true) : ?>
	
		<?php 
		//debug($tuile);
		//die("Full row");
		if(($index%$cols)!=0) echo '</div>'; ?>
		<div class="row-fluid">
			<div class="captioned <?php echo $tuile['Couleur']['title'];?>">
				<h4><?php echo $tuile['title'];?></h4>
				<div class="<?php echo $tuile['model_id'];?>">
				<?php echo $tuile['description'];?>
				</div>
				<?php if($User['role']='Admin') echo $this->Html->link('Editer...', array('controller'=>'tuiles', 'action'=>'edit', $tuile['id']));?>
			</div>
	<?php return; endif;?>
	
	<?php if(($index%$cols)==0) { echo '<div class="row">'; } ?>
	
	<div class="<?php echo sprintf('col-lg-%d', 12/$cols);?>">
	
		<div class="captioned <?php echo $tuile['Couleur']['title'];?>">
			<h4><?php echo $tuile['title'];?></h4>
			<div class="<?php echo $tuile['model_id'];?>">
					<?php echo $tuile['description'];?>
			</div>
			<?php if($User['role']='Admin') echo $this->Html->link('Editer...', array('controller'=>'tuiles', 'action'=>'edit', $tuile['id']));?>
		</div>
	</div>

	<?php if($index && ($index%$cols)==$cols-1) {
		echo '</div>';
	}?>

