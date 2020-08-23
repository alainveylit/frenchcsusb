<h3>Vous avez un message de votre classe de francais: </h3>
<?php 
//debug($recipient);
//debug($comment);
?>
<h4>
	<?php 	
		$model = $comment['Comment']['model'];
		$controller = Inflector::underscore(Inflector::pluralize($model));	
		$url = Router::url(array('controller'=>$controller, 'action'=>'view', $comment[$model]['id'], 'admin'=>false), true);
		echo $comment['Creator']['name'] , '  a ajouté un commentaire sur  : ' , $this->Html->link($comment[$model]['title'], $url); 
	?>
</h4>

<div style="background: #fdfdfd; padding: 12px; width: 100%;">
	<img src="http://french-csusb.org/img/corrections.jpg" style="float: left; margin-right: 24px;">
	<?php echo $comment['Comment']['comment'];?>
</div>

<hr>
