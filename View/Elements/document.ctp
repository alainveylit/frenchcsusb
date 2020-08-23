<?php
	//debug($document);
	$type = (isset($type)) ? $type : 'document';
	if($document['model']=='Post') $type='attachment';
	
	$DocumentURL = 'files' . DS . $type . DS  . 'document' . DS .  $document['document_dir'] . DS . $document['document'];
	if(!file_exists(WWW_ROOT . $DocumentURL)) {
		echo "File does not exist: ";
		debug(WWW_ROOT . $DocumentURL);
		return;
	}
?>
<h4>&nbsp;<?php //echo $document['title'];?>
	<small>
		<ul class="list-inline pull-right">
			<li><span class="glyphicon glyphicon-download"> </span> <?php echo $this->Html->link(__('Save it'), Router::url('/', true) . DS . $DocumentURL, array('title'=>$DocumentURL));?></li>
			<?php if($User['id']==$document['creator']): ?>
			<li><span class="glyphicon glyphicon-edit"> </span> <?php echo $this->Html->link(__('Edit'), array('controller'=>'documents', 'action'=>'edit', $document['id']));?></li>
			<?php endif;?>
		</ul>
	</small>
</h4>
	<div class="tall">
		<?php if(preg_match("/pdf/i",$document['type'])) :?>
			<iframe src="<?php echo Router::url('/', true) . DS . $DocumentURL;?>" width="100%" height="800px">
			
			</iframe>
			<?php elseif(preg_match("/image/",$document['type'])) :?>
					<?php echo $this->Html->image(DS . $DocumentURL, array('alt'=>'Image', 'class'=>'thumbnail document-image'));?>
			<?php else:?>
				<b><?php echo $this->Html->link($document['document'], array('controller'=>'documents', 'action'=>'download', 'admin'=>false, $document['id']));?></b>
		<?php endif; ?>
</div>
