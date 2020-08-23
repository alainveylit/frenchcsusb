<div class="panel white">
	<?php //debug($category);?>
		<h2><?php echo $category['Category']['title'];?> 	
			<small class="pull-right"><?php echo count($quizzes);?> exercices</small>
		</h2>
	<hr>
	
	<table class="table table-striped">
		<thead>		
			<tr>
				<th>Titre</th>
				<th>Difficult&eacute;</th>
				<th>Cours</th>
			</tr>
		</thead>
	<?php foreach($quizzes as $id=>$quiz): ?>
		<tr>
			<td><?php echo $this->Html->link($quiz['Quiz']['title'], array('action'=>'view', $quiz['Quiz']['id']));?></td>
			<td><span class="badge"><?php echo $quiz['Quiz']['difficulty'];?></span></td>	
			<td><?php echo $quiz['Quiz']['cours_id'];?></td>	
		</tr>
	<?php endforeach;?>
	</table>
</div>
<?php //debug($quizzes);?>
