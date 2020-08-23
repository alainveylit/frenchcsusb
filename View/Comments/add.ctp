<style>
#comment-form-inner  {
	margin: 0;
	padding: 0 12px;
	width: 100%;
	background-color: lightgray;
	border: 1px solid gray;
	border-radius: 8px; 
	 box-shadow: 0 0 25px 5px #999;
}
.button {
    background-color: #2b91af;
    border-radius: 10px;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.3);
    color: #fff;
    cursor: pointer;
    display: inline-block;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
}
.button.small {
    border-radius: 15px;
    float: right;
    margin: 22px 5px 0;
    padding: 6px 15px;
}
.button:hover {
    background-color: #1e1e1e;
}
.button > span {
    font-size: 84%;
}
.button.b-close, .button.bClose {
    border-radius: 7px;
    box-shadow: none;
    font: bold 131% sans-serif;
    padding: 0 6px 2px;
    position: absolute;
    right: -7px;
    top: -7px;
}

fieldset { width: 80%; margin: auto; }
textarea { width: 100%; }
</style>

	<div id="comment-form-inner" class="cartouche light-gray">
	<span class="button b-close"><span>X</span></span>

		<?php
		//debug($model);
						$user_id = $model['user_id'];
						$foreign_key = $model['foreign_key'];
		?>

		<?php echo $this->Form->create('Comment', array('url'=>'add'));?>

		<h4><?php echo  $model['title']; ?></h4>	
		<hr>	

			<!---p><legend><?php echo __($model['user_name'] . ' is adding a comment');?></p></legend-->

			<p>Your comment:</p>
			<fieldset class="light-gray">
			<?php
				echo $this->Form->input('comment', array('label'=>false));
				echo $this->Form->input('user_id', array('value'=>$user_id, 'type'=>'hidden'));
				echo $this->Form->input('foreign_key', array('value'=>$model['foreign_key'], 'type'=>'hidden'));
				echo $this->Form->input('model', array('type'=>'hidden', 'value'=>$model['alias']));
				echo $this->Form->input('owner', array('type'=>'hidden','value'=>$model['owner']));
			?>

		</fieldset>
			
			<?php echo $this->Form->end('Submit');?>


</div>

