<?php foreach($comments as $comment) :?>
	<div class="row-fluid cartouche">
			<p class="light-blue"><?php echo $comment['Creator']['name'];?> <small class="pull-right"><?php echo $comment['created'];?></small></p>
			<div><?php echo $comment['comment'];?>
			</div>
	</div>
<?php endforeach;?>
