  <style> 
	ul#letters { list-style: none; display: inline-block; }
	ul#letters li, ul#mot-cache li { width: 36px; height: 36px; padding: 4px 8px;  background: lightgray; text-align: center; font-size: 18px; border: 1px gray solid; 
		display: inline-block; float: left; margin: 4px;
	} 
	
	ul#mot-cache { list-style: none; display: block; width: 100%; float: none; }
	canvas { border: 1px solid gray; margin: 0 12px; background: #f4f4f4; float: none; display: block; float: left; clear: left; }
	canvas { background-image: url('images/pendu.png'); }
	h2 { text-align: center; border-bottom: 1px solid lightgray; }
	
	#clavier { height: 350px; }
	#definition { font-size: 18px; }
	#definition:before {
		content: 'Definition: ';
		font-weight: bold;
	}
	
	#image { float: left; max-width: 300px; margin-left: 12px;  }
	#wheel { text-align: center; margin: 0; padding: 0; background: #f9f9f9; overflow: auto; }
	#wheel img { width: 420px; height: 420px; }
	#wheel p { border-top: 1px solid black; }
	
	img.spin { 
		position: absolute;
		top: 75%;
		left: 50%;
		
		margin:-60px 0 0 -60px;
		-webkit-animation:spin 4s linear infinite;
		-moz-animation:spin 2s linear infinite;
		animation:spin 4s linear infinite;
	}
	
	@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
	@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
	@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }

	.pendu { background-image: url(/css/images/pendu-icon.png); background-position: top left; background-repeat: no-repeat; background-size: 32px; }
  </style>


<div class="row wide">
	 <h2 class="pendu">Le Pendu
	  <small class="pull-right">Question <span id="question-index"></span></small>
	  </h2>
	  <p id="definition">Voici la definition</p>
	
	<div class="col-lg-4" id="clavier">
		<ul id="letters"></ul>
		<button id="reset_button">Question suivante</button>
	</div>
	<div class="col-lg-8" id="answer">
	<canvas id="mycan" width="400" height="300"></canvas>
	<div id="image"> </div>

</div>


</div>


<script>
	var definitions = <?php echo json_encode($definitions);?>;
	<?php echo $this->element('pendu_script');?> 
	
</script>
