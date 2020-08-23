<div class="panel wide">
<h2>Journal de : <?php echo $creator['Creator']['name'];?></h2>
<?php 
//debug($blogs);
//debug($creator);
if(empty($blogs)) {
	echo '<h3>No blog entries found.</h3>';
	return;
}
$owner_name = $blogs[0]['Creator']['name'];

//debug($owner);
?>


<table class="table table-striped">
	<tbody>
	<?php foreach ($blogs as $blog): ?>
	<tr>
		<td><?php echo $blog['Blog']['title']; ?>&nbsp;</td>
		<td><?php echo $blog['Blog']['creator']; ?>&nbsp;</td>
		<td><?php echo $blog['Blog']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $blog['Blog']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

	<div class="long-text">
	<?php foreach ($blogs as $blog): ?>
		<div class="row-fluid" style="overflow: auto;">

		<h4><?php echo h($blog['Blog']['title']); ?></h4>
			<?php 
			if(!empty($blog['Blog']['image'])):?> 
			<?php
				//debug($blog['Blog']);
				$path = '/files/blog/image/' . $blog['Blog']['image_dir'] . DS . $blog['Blog']['image'];
			?>
				<img class="inset" src="<?php echo $path;?>" alt="mon image" style="max-width: 250px;">
			<?php endif;?>
			<?php echo $blog['Blog']['text']; ?>
			</div>
			<?php if(!empty($blog['Comment'])):?>
				<div><strong>Commentaires: </strong>
					<?php foreach($blog['Comment'] as $comment) :?>
						<p><?php echo $comment['comment'];?></p>
					<?php endforeach;?>
				</div>
			<?php endif;?>
		<p style="text-align: right;">
			<?php echo $this->Html->link(__('Ajouter un commentaire'), array('action' => 'view', $blog['Blog']['id'])); ?>
		</p>

			<hr>
	<?php endforeach;?>
	</div>
	

</div>
<div id="comment"></div>
<script>
	
	$('document').ready( function() {
		var owner = <?php echo $owner;?>;

		// Add a comment feature
		$('.add-comment').click( function() {			
				var fkey = $(this).attr('rel');
				//alert(fkey);
				var model= '<?php echo Inflector::classify( $this->request->params['controller']);?>';
				//alert('commenting: ' + model + ' key: ' + fkey);
				$("#comment").load( '/comments/add_comment', { foreign_key: fkey, model: model, owner: owner } );
				/*
				$("#comment").bPopup({
					easing: 'easeOutBack', //uses jQuery easing plugin
					speed: 450,
					transition: 'slideDown'
				});*/
		});
			
	});

</script>
