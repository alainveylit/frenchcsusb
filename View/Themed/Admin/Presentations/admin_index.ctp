<div class="row wide">
	<h2>Presentations: 
		<small class="pull-right"><?php echo $cours['titre'];?></small>
	</h2>	


	<table class="table table-striped">
		<tr><th>Auteur</th><th>Titre</th><th>Medium</th><th>Date</th></tr>
		<?php foreach($presentations as $presentation) :?>
			<tr>
				<td><?php echo $presentation['Creator']['name'];?></td>
				<td><?php echo $this->Html->link($presentation['Presentation']['titre'], array('action'=>'view', $presentation['Presentation']['id']));?></td>
				<td><?php echo $presentation['Presentation']['medium'];?></td>
				<td><?php echo $this->Time->niceShort($presentation['Presentation']['created']);?></td>
			</tr>
		<?php endforeach;?>
	</table>
	
</div>

<?php //debug($presentations);?>


</div>

