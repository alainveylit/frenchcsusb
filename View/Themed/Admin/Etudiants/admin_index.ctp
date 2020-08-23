<div class="fatty index">
	<h3><?php echo __('Etudiants du cours de: '); ?><?php echo $cours['titre'];?></h3>
	<?php //debug($cours);?>
	<h4><small class="pull-right">
		<?php echo $this->Html->link('Contacter tous les étudiants', array('action'=>'contact'), ['class'=>'mail']);?></small>
	</h4>
<div class="row">
	<table class="table table-striped">
	<thead>
	<tr>
			<th>Enrolled</th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th><?php echo $this->Paginator->sort('prenom'); ?></th>
			<th><?php echo $this->Paginator->sort('courriel'); ?></th>
			<th><?php echo $this->Paginator->sort('major'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($etudiants as $etudiant): ?>
	<tr>
		<?php //echo h($etudiant['Etudiant']['id']); ?>
				<td>
				<?php $active_class = $etudiant['Etudiant']['enrolled'] ? 'checked' : 'unchecked';?>
					<a class="activate <?php echo $active_class;?>" href="javascript:" rel="<?php echo $etudiant['Etudiant']['id'];?>">
					<?php echo ($active_class=="checked") ? " " : "Not enrolled"?>
					</a> 
			</td>

		<td><?php echo $this->Html->link($etudiant['Etudiant']['nom'],  
				array('action' => 'view', $etudiant['Etudiant']['id'])); ?>&nbsp;</td>
		<td><?php echo h($etudiant['Etudiant']['prenom']); ?>&nbsp;</td>
		<td><?php echo h($etudiant['Etudiant']['courriel']); ?>&nbsp;</td>
		<td><?php echo h($etudiant['Etudiant']['major']); ?>&nbsp;</td>
		
			<?php /* echo $this->Html->link($etudiant['User']['name'], 
					array('controller' => 'users', 'action' => 'view', $etudiant['User']['id']));*/ ?>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $etudiant['Etudiant']['id']), ['class'=>'edit']); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $etudiant['Etudiant']['id']), 
						array('class'=>'erase', 'confirm' => __('Are you sure you want to delete # %s?', $etudiant['Etudiant']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
</table>

</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Ajouter un Etudiant'), array('action' => 'add')); ?></li>
		</ul>
	</div>

</div>	


<script>

	$('document').ready( function() {	
				
		$('.activate').click( function() {
				var student_id = $(this).attr('rel');
				var node = $(this);
				$.get( "/admin/etudiants/toggle_active", { id: student_id },  function( data ) {
					console.log(data);
					node.removeClass('checked' ).removeClass('unchecked' );
					if(data=='checked') {
						node.addClass('checked' ).text("In");
					} else { node.text("Out"); }				
				});
			});
	
	});
</script>
