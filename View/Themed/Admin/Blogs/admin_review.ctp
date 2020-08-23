<div class="panel wide-margins">
<h2>Les Blogs</h2>
<?php //debug($students); ?>

	<ul>
	<?php foreach($students as $id=>$name) :?>
			<li><span><?php echo $id;?></span>: <?php echo $this->Html->link($name, array('controller'=>'blogs', 'action'=>'journal', $id));?></li>
		<?php endforeach;?>
	</ul>
</div>
