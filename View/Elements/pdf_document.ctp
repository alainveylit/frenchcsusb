<?php
	//debug($document);	
	/* *
	// Load PDF iframe -- check if MIDI file exists and output ogg audio 
	* */
	
	$document_directory =  WWW_ROOT . 'files' . DS . 'document' . DS  . 'document' . DS .  $document['document_dir']; 
	$document_path = $document_directory . DS . $document['document'];
	
	if(!file_exists($document_path)) {
		echo "File does not exist: ";
		return;
	}
	
	$DocumentURL = str_replace(WWW_ROOT, DS, $document_path);
	$midi_file = $document_directory . DS . $document['id'] . '.mid';
	$ogg_file="";

	if(file_exists($midi_file)) {	
		$audio_on=1;	
		$ogg_file = preg_replace("/\.mid$/", ".ogg", $midi_file);
		if(file_exists($ogg_file)) {
			$ogg_file = str_replace(WWW_ROOT, DS, $ogg_file);
		} else { $ogg_file = ""; }
		$midi_file = str_replace(WWW_ROOT, DS, $midi_file);
	} else {  $midi_file="";	$audio_on=0; }

?>

<?php if($audio_on): ?>
<script>
 var midi_file = "<?php echo $midi_file;?>";
 var ogg_file = "<?php echo $ogg_file;?>";
</script>
<?php endif;?>
	
	<h4><?php echo $document['title'];?>

	<small>
		<ul class="list-inline pull-right">
			<li><span class="glyphicon glyphicon-download"> </span> 
			<?php echo $this->Html->link(__('Full screen'), $DocumentURL, array('title'=>$DocumentURL));?></li>
			<?php if($User['id']==$document['creator']): ?>
				<li><span class="glyphicon glyphicon-edit"> </span> <?php echo $this->Html->link(__('Edit'), 
							array('controller'=>'documents', 'action'=>'edit', $document['id']));?></li>
			<?php endif;?>
		</ul>
	</small>
</h4>
	<div class="tall">
		<?php if(preg_match("/pdf/",$document['type']) || preg_match("/pdf/i",$document['document'])) :?>
			<iframe src="<?php echo $DocumentURL;?>" width="100%" height="800px">			
			</iframe>
		<?php else:?>
			<div class="centered">
				<img src="<?php echo $DocumentURL;?>" alt="Image not found">
			</div>

		<?php endif; ?>
		
	<?php if(!empty($midi_file)) :?>	
		<div id="audio-rendition">Audio: </div>
	<?php endif; ?>

</div>

<script>

<?php if($audio_on): ?>

var ogg_enabled=0;

function check_ogg_enabled() {
	
		var myAudio = document.createElement('audio');
		if (myAudio.canPlayType('audio/ogg')) {
			ogg_enabled=1;	
		}

}


$(document).ready(function() {
	
	if(midi_file.length > 0) {

		check_ogg_enabled();

		if(ogg_enabled && ogg_file.length>0) {
			
			var audio = $('<audio controls>');
				audio.attr('id', 'ogg-rendition');
				audio.css('height', '26px');
			var source=$('<source>');
				source.attr('type', "audio/ogg"); 
				source.attr('src', ogg_file);
				audio.append(source);
				$("#audio-rendition").append(audio);
			} else {		
				var midi = $('<a>');
				midi.attr('href', midi_file);
				midi.text("MIDI file");
				$("#audio-rendition").append(midi);
			}
	}

});
<?php endif;?>

</script>
