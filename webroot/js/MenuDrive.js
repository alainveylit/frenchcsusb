  var MenuDrive = function( options ) // Object { menu_id: ,  dom_id: , ...  }
{
	options.menuClassName="trigger";	
	if(jQuery===undefined) return undefined; 	// jQuery must be loaded
	this.instantiate(options);					// initialize values
}

 MenuDrive.prototype = { 
	
	 menu_id: '',				// ul menu  id
	 target: '',				// target div to manipulate
	 default_html: '',			// html data file to load by default
	 root_document:'',			// calling page - without hash
	 menu_functions: {},		// functions associated with menu ids
	 exit_url: '/',
	 action_page: '',
	 active_id: -1,
	 history: false,

	instantiate : function(options) {
		//console.log(options);

		this.menu_id = options.menu_id;
		var node_name = '#' + options.dom_id;
		this.target = $(node_name);
		this.default_html = options.default_html;
		this.root_document = window.location.href.split('#')[0];
		this.exit_url = options.exit_url;
		if(options.history!==undefined) this.history = true;
		
		var app=this;
		
		$('#' + this.menu_id + ' li.' + options.menuClassName ).wrapInner( '<a href="javascript:"></a>');		
		$('#' + this.menu_id + ' li a').click( function() {	app.openMenu( $(this).parent());});
		
		$(node_name).on('click', 'a.initial-state', function() {
				 app.initial_state(); 
		});
		  
		$(node_name).on('click', 'a.menu-link', function() {
			app.triggerLink($(this).attr('rel'));
		});
			
		$('a#exit').click( function() { 
			app.close(); 
		} );

		
		this.open();
		
		window.onpopstate = function(event) {
				app.check_history(event);
		};

		window.addEventListener("load", function load(event){ 			// allow external links to menu_id target
					window.removeEventListener("load", load, false); 	//remove listener, no longer needed
						//console.log( 'Hash Action=' + action);
						setTimeout( function() {  }, 500);
						var action = app.check_get_param( event );
		},false);

		
	},
	open() {
		if(this.default_html!==undefined) this.target.load(this.default_html);	
		//console.log("Opening:" + this.default_html );		
	},
	
	close() {
		window.location=this.exit_url;
	},
	
	initial_state: function() {
		window.location = this.root_document;
	},
	
	set_functions: function( my_funcs) { this.menu_functions = my_funcs; },
	
	 openMenu : function(call_id) {		
		var id = call_id.attr('id');
		console.log("Open menu called with id:" + id);
		if(id!==undefined && this.menu_functions[id]!==undefined) {
			this.menu_functions[id]();
			this.set_history(id);
		}
	},
	
	triggerLink(rel_id, event) {
		if(rel_id==null) return;
		var id = rel_id;
		var hash=undefined;
		if(rel_id.indexOf("#") > -1) {
			var nodes = rel_id.split('#');
			id = nodes[0];
			hash=nodes[1];
		}
		
		if(this.menu_functions[id]!==undefined) this.menu_functions[id]();
		this.set_history(id);
		if(hash!==undefined) {	
			setTimeout( function() { window.location.hash = hash; }, 500);
		}		
		//console.log("Triggered: " + rel_id);
	},
	
	 redirectPage(address)
	{
		history.replaceState({}, "menu-driven", this.root_document);
		window.location.hash='';
		this.history=undefined;
		window.location=address;
	},
	
	  set_history(action_id)
	{
			this.active_id=action_id;
			if(this.history==true) {
				var stateObj = { 'menu_id': this.menu_id, 'menu_action': action_id };
				history.replaceState(stateObj, "menu-driven", this.root_document + "#!" + action_id);
			}
	},
	
	 check_history(event)
	{
		//console.log("OnPopState: location: " + document.location + ", state: " + JSON.stringify(event.state));
		if(event.state && event.state.menu_id==this.menu_id) {
			var action_id = event.state.menu_action;
			//console.log(event.state.menu_action);
			this.triggerLink(action_id);
			//this.set_history(action_id);
			event.preventDefault();
		} 

	},
	get_active_id() {
		return this.active_id;
	},
	
	set_active_id(action_id) {
		this.active_id = action_id;
	},

	setHtml : function( my_html) {
		this.target.html( my_html );
	},
	
	openImage:	function (image) 	{
		var img =  '<img src="'+image+'" alt="image">';
		//console.log(img);
		this.target.html( img);
	},

	openFile:	function (file)	{
		this.target.load(file);
		window.location.hash = "";
		//console.log('Opening file: ' + file);
	},
	
	dialog : function( options ) {	
		if(options.url===undefined) {
			alert("No url given");
			return;
		}
		
		var width = (options.width===undefined) ? "500px" : options.width;
		var title = (options.title===undefined) ? "Untitled" : options.title;
		
		var dialog = $('<div  class="loading"></div>').appendTo('body');
		var callback = options.callback;
		
            	dialog.dialog({
                close: function(event, ui) {
                    dialog.remove();
                    if(callback!==undefined) callback();
                },
                title: options.title,
                width: options.width,
                modal: true
            });
		   
		   dialog.load(
                options.url,
                options.params, 
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.removeClass('loading');
                }
            );		
	},
	
	jget: function(options) {
		var callback = options.callback;
		if(options.url===undefined) {
			alert("No url given");
			return;
		}
		
		var tgt = this.target;
		//options.params.action = this.getCookie();
		$.get( options.url, options.params )
		  .done(function( data ) {
			(callback!==undefined) ? callback(data) : tgt.html( data );
		  })  .fail(function() {
			alert( "error" );
		  });
	},

		check_get_param( event )
	{
		
		var hash = window.location.hash; /* check for #!menu_action */
		if(hash.length > 1 && hash[1]=='!') {
			var action = hash.substr(2);
			if(this.menu_functions[action]!==undefined) {
				this.menu_functions[action]();
				event.preventDefault();
				return action;
			}
		}
			
		return null;

	},

	showNode:	function  (oNode) {
		  var nLeft = 0, nTop = 0;
		  for (var oItNode = oNode; oItNode; nLeft += oItNode.offsetLeft, nTop += oItNode.offsetTop, oItNode = oItNode.offsetParent);
		  document.documentElement.scrollTop = nTop;
		  document.documentElement.scrollLeft = nLeft;
		}

	
}
	
	
