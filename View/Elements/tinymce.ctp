<script type="text/javascript">
	
// Create a new plugin class
tinymce.create('tinymce.plugins.ExamplePlugin', {
    init : function(ed, url) {
        // Register an example button
        /*
        ed.addButton('example', {
            title : 'example.desc',
            onclick : function() {
                 // Display an alert when the user clicks the button
                 ed.windowManager.alert('Hello world!');
                 ed.execCommand("mceInsertContent", 0, "♣");
            },
            'class' : 'gras' // Use the bold icon from the theme
        });*/
        
        ed.addShortcut('ctrl+e', 'E acute', function() {ed.execCommand("mceInsertContent", 0, "é")});
		ed.addShortcut('alt+e', 'E grave', function() {ed.execCommand("mceInsertContent", 0, "è")});
			
        ed.addShortcut('ctrl+shift+6', 'E circonflexe', function() { ed.execCommand("mceInsertContent", 0, "ê")});
		ed.addShortcut('ctrl+alt+e', 'E trema', function() { ed.execCommand("mceInsertContent", 0, "ë")});
		
		ed.addShortcut('alt+a', 'A grave', function() {ed.execCommand("mceInsertContent", 0, "à")});
		ed.addShortcut('ctrl+a', 'A circonflexe', function() {ed.execCommand("mceInsertContent", 0, "â")});
		
		ed.addShortcut('ctrl+c', 'C cedille', function() {ed.execCommand("mceInsertContent", 0, "ç")});
		ed.addShortcut('ctrl+shift+c', 'C cedille', function() {ed.execCommand("mceInsertContent", 0, "Ç")});
		
		ed.addShortcut('alt+u', 'U grave', function() {ed.execCommand("mceInsertContent", 0, "ù")});
		ed.addShortcut('ctrl+alt+u', 'U circonflexe', function() {ed.execCommand("mceInsertContent", 0, "û")});
		ed.addShortcut('ctrl+o', 'O circonflexe', function() {ed.execCommand("mceInsertContent", 0, "ô")});
		
		ed.addShortcut('ctrl+alt+i', 'I circonflexe', function() {ed.execCommand("mceInsertContent", 0,"î")});
		ed.addShortcut('alt+i', 'I trema', function() {ed.execCommand("mceInsertContent", 0,"ï")});
		
		ed.addShortcut('ctrl+0', 'Strike through', function(){
			ed.execCommand('Strikethrough', false);
		  });
		  
       ed.on('init', function() 
        {
            this.getDoc().body.style.fontSize = '11pt';
            this.getDoc().body.style.fontFamily = 'sans-serif';
        });
  }

});

// Register plugin with a short name
tinymce.PluginManager.add('example', tinymce.plugins.ExamplePlugin);

   tinymce.init({
	    selector: "textarea.PresentationVocabulaire, textarea.PresentationComments",
        theme : "modern",
  		language: 'fr_FR',
        mode : "textareas",
        menubar: false,
        plugins: "code, lists",
 	   toolbar: [
		'styleselect | bold italic underline strikethrough | charmap code |  numlist bullist',
	  ],
        convert_urls : false,
        height :"200px",
        width : "100%",
	});

<?php if(isset($simple)) : ?>
    tinymce.init({
        theme : "modern",
        mode : "textareas",
        convert_urls : false,
        height :"200px",
        width : "500px",
	});

<?php else: ?>
    tinymce.init({
		theme: 'modern',
		language: 'fr_FR',
		selector: "textarea",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste example"
		],
		editor_deselector : "mceNoEditor",
		skin: 'lightgray',
		convert_urls: false,
		
		height: "150px",
		//gecko_spellcheck : true,
		//browser_spellcheck : true,
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fullscreen | fontsizeselect | charmap",
		//external_plugins: { "nanospell": "http://squills/js/libraries/nanospell/plugin.js" },
		//nanospell_server:"php"
		//addShortcut('ctrl+alt+3', 'Date format', function(){  });
     });
    
 
   <?php endif;?>
</script>
