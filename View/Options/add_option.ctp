<div class="wide" style="background: lightgray;">
<style>
	label { width: auto; color: #335; }
	form { width: 100%; margin: auto; }
	#close-box {  margin-right: 12px; }
</style>

<p><span class="pull-right" > <a id="close-box" href="javascript:"><img src="/css/images/remove.png"> </a></span></p>

	<?php echo $this->Form->create('Option', array('url'=>'add')); ?>
	 
	<?php 
		echo $this->Form->hidden('question_id', array('value'=>$this->request->data['question_id']));
		echo $this->Form->hidden('creator', array('value'=>$this->request->data['creator']));
	?>
	<table class="table">
		<tr>
			<td>
				<?php echo $this->Form->input('title', array('placeholder'=>'texte de cette option'));?>
			</td>
			<td>
				<?php echo $this->Form->input('correct_answer');?>
			</td>
			<td><?php echo $this->Form->end("Ajouter");?></td>
      </tr>
   </table>	
</div>
<script>

        $(document).ready(function() { 
            $('#OptionEditTitleForm').ajaxForm(function() { 
                $('#update-title').text("Option updated");
                return false;
            }); 
            $('#close-box').click( function() { $(this).parent().parent().parent().empty(); });
        }); 

</script>
