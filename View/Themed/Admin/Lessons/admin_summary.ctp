	<div class="_cartouche">
		<?php //debug($cours);?>
	<h3><?php echo $cours['titre'];?> : <?php echo __('Liste des Leçons'); ?></h3>

	<table class="table table-striped" id="sort">
	<thead>
		<tr>
				<th>Index</th>
				<th><?php echo $this->Paginator->sort('jour', 'Date'); ?></th>
				<th><?php echo $this->Paginator->sort('titre'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1;?>
	<?php foreach ($lessons as $lesson): ?>
	
		<tr id="<?php echo $lesson['Lesson']['id'];?>">
		<td>Leçon <?php echo $i++;?></td>
		
			<td>
			<?php $englishdate = $this->Time->format($lesson['Lesson']['jour'],  '%A %e %B %Y');
			echo $this->Crud->display_french_date($englishdate);
			 ?>
			&nbsp;</td>

			<td><?php 
				echo $this->Html->link($lesson['Lesson']['titre'], 
					array('action'=>'view', $lesson['Lesson']['id']),  
					array('escape' => false)); ?>
				&nbsp;</td>

		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>

</div>



