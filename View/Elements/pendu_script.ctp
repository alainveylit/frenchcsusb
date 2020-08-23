
String.prototype.replaceAt=function(index, character) {
    return this.substr(0, index) + character + this.substr(index+character.length);
};



/**
 * Definition de la classe Pendu
 * @param {[type]} ctx Contexte graphique du canvas
 */
function Pendu(ctx) {
  this.etape = 0;
  this.etapeMax = 11;
  this.ctx = ctx;
  ctx.lineWidth=5;

  this.next = function() {
    this.etape++;
    if(this.etape >= this.etapeMax)
      return false;
    else {
      this.draw();
    }
    return true;
  };

  this.draw = function() {
    if(this.etape > 0)
      this.drawLine(10,290,50,290);
    if(this.etape > 1)
      this.drawLine(30,290,30,50);
    if(this.etape > 2)
      this.drawLine(30,50,250,50);
    if(this.etape > 3)
      this.drawLine(30,80,60,50); //
    if(this.etape > 4)
      this.drawLine(200,50,200,70); //
    if(this.etape > 5) {
      ctx.beginPath();
      ctx.arc(200,85,15,0,2*Math.PI);
      ctx.stroke();
    }
    if(this.etape > 6)
      this.drawLine(200,100,200,170);//
    if(this.etape > 7)
      this.drawLine(200,170,220,210);//
    if(this.etape > 8)
      this.drawLine(200,170,180,210);//
    if(this.etape > 9)
      this.drawLine(200,120,180,140);//
    if(this.etape > 10)
      this.drawLine(200,120,220,140);
  };

  this.drawLine = function(x1, y1, x2, y2) {
    this.ctx.beginPath();
    this.ctx.moveTo(x1, y1);
    this.ctx.lineTo(x2, y2);
    this.ctx.stroke();
  };

  this.reset = function() {
    this.etape = 0;
    clearCanvas(this.ctx);
  };
}



/**
 * Definition d'une classe représentant un mot mystère pour le pendu
 * @param {String} chaine La chaine de caractère représentant le mot mystère
 */
function UnMot(chaine) {
  this.mot = chaine.toUpperCase();
  this.taille = chaine.length;
  this.index = -1;

  this.next = function() {
    if(this.index < this.taille) {
      this.index++;
      return true;
    }
    else {
      this.index = -1;
      return false;
    }
  };

  this.getChar = function() {
    return this.mot.charAt(this.index);
  };

  this.getMot = function() {
    return this.mot;
  };

  this.getIndex = function() {
    return this.index;
  };
}


/**
 * Fonction qui efface le contenu du canvas
 * @param  {Context} ctx Le contexte graphique
 */
function clearCanvas(ctx) {
  // Store the current transformation matrix
  ctx.save();

  // Use the identity matrix while clearing the canvas
  ctx.setTransform(1, 0, 0, 1, 0, 0);
  ctx.clearRect(0, 0, 300, 300);

  // Restore the transform
  ctx.restore();
  ctx.beginPath();
}



/**
 * Fonction qui déssine le mot étoilé sur le canvas HTML5
 * @param  {String} mot_etoile Le mot_etoile à déssiner
 */
function dessinerMot(ctx, mot_etoile) {
  ctx.fillStyle = "#000000";
  ctx.font = "36px Arial";
  ctx.fillText(mot_etoile, 0, 40);
}


/**
 * Fonction qui s'occupe de nettoyer le canvas et de tout redessiner
 * @param  {[type]} ctx        Contexte graphique
 * @param  {String} mot_etoile Le mot caché
 * @param  {Pendu} pendu      Le pendu
 * @param  {Boolean} game_over  Is the game over ?
 * @param  {Boolean} gagner     La partie est elle gagnée ?
 */
 
function redessineTout(ctx, mot_etoile, pendu, game_over, gagner) {
  clearCanvas(ctx);
  dessinerMot(ctx, mot_etoile);
  pendu.draw();
  if(game_over)
    gameOver(ctx);
  if(gagner)
    afficherWin(ctx);
}


/**
 * Fonction qui s'occupe d'avertir l'utilisateur comme quoi la
 * partie est gagnée
 * @param  {[type]} ctx Contexte graphique
 */
function afficherWin(ctx) {
  ctx.fillStyle = "#168014";
  ctx.font = "36px Arial";
  var c=document.getElementById("mycan");

  var gradient=ctx.createLinearGradient(0,0,c.width,0);
	gradient.addColorStop("0","green");
	gradient.addColorStop("0.5","blue");
	gradient.addColorStop("1.0","green");
	// Fill with gradient
	ctx.fillStyle=gradient;
	ctx.fillText("GAGNÉ!", 100, 250);
}



/**
 * Fonction qui déssine sur le canvas que la partie
 * est terminée
 * @param  {[type]} ctx Contexte graphique
 */
function gameOver(ctx) {
  ctx.fillStyle = "#FF0000";
  ctx.font = "36px Arial";
	var c=document.getElementById("mycan");
    var gradient=ctx.createLinearGradient(0,0,c.width,0);
	gradient.addColorStop("0","magenta");
	gradient.addColorStop("0.5","blue");
	gradient.addColorStop("1.0","red");
	// Fill with gradient
	ctx.fillStyle=gradient;

  ctx.fillText("PERDU!...", 100, 250);
  //ctx.fillText("Over", 40, 220);
}


/**
 * Initialise et retourne le mot étoile grâce au mot mystère passé en
 * paramêtre
 * @param  {String} mot_mystere Le mot mystérieux
 * @return {String}             Le mot caché par des étoiles
 */
function initMotEtoile(mot_mystere) {
  var mot_etoile = "";
  for (var i = 0; i < mot_mystere.length; i++) {
    mot_etoile += "*";
  }
  return mot_etoile;
}

var clue_word;
var definition;
var active_index=0;
var current_definition;
  var mot_mystere = ""; //new UnMot("marron");
  var mot_etoile = ""; //initMotEtoile(mot_mystere.getMot());
  var game_over = false;
  var gagner = false;

function init(index)
{
	active_index=index;
	$("#image").empty();
	
	current_definition = definitions[index];
	clue_word  = current_definition.word.toUpperCase();
	definition = current_definition.definition;
	
	if(current_definition.image_url.length) {
		var img = $("<img>");
		img.attr('src', current_definition.image_url);
		$("#image").append(img);
	}
	
	mot_mystere = new UnMot(clue_word);
	$('#definition').html(definition);
	mot_etoile = initMotEtoile(mot_mystere.getMot());
	game_over = false;
    gagner = false;
	$('ul#letters li').show();
	$('#reset_button').hide();
	$('#question-index').text(active_index+1);
	var img = new Image();   // Create new img element
	img.src = '/css/images/pendu.png';
	var can = document.getElementById("mycan");
	var ctx = can.getContext("2d");
	ctx.drawImage(img, 0, 0);
	
}

	function spin()
{
	
  return Math.floor(Math.random() * Math.floor(100));
  
}

function ding()
{
	//yanp.mp3
	var audio = new Audio('/img/Ding.mp3');
	audio.play();

}

function show_score()
{
	$('#definition').hide();
	var div = $('<div></div>');
	div.attr('id', 'wheel');
	div.append('<h3>Ce test est fini! Faites tourner la roue de la fortune</h3><p>▼</p>');
	
	var img = $('<img>');
	img.attr('src', '/img/Wheel_of_Fortune.png');
	img.addClass('spin');
	div.append(img);
	$('#answer').html(div);
	ding();
}


$(document).ready(function() {
	
  var can = document.getElementById("mycan");
  var ctx = can.getContext("2d");
  var pendu = new Pendu(ctx);
  var questions = definitions.length;

  	var alphabet="ABCDEFGHIJKLMNOPQRSTUVWXYZÀÁÇÈÉÊËÔÙÛÜ- '";

	for(var i=0; i < alphabet.length; i++) {
		var li = $('<li></li>');
		li.text(alphabet[i]);
		$('ul#letters').append(li);
	}

		
	$('#letters li').wrapInner( '<a href="javascript:"></a>');		

	init(0);
	
	$('#answer').on('click',  '#wheel img.spin', function() {
		$(this).removeClass('spin');
		var val = spin();
		//$(this).style.transform = "rotate(7deg)";
		$(this).css({
            '-webkit-transform': 'scale(' + val + 'deg)',
            '-moz-transform': 'scale(' + val + 'deg)',
            '-ms-transform': 'scale(' + val + 'deg)',
            '-o-transform': 'scale(' + val + 'deg)',
            'transform': 'rotate(' + val + 'deg)'
        });
        ding();

	});

   $("#letters").on('click', 'li', function() {
    var carac = $(this).text();
    carac = String(carac).trim().toUpperCase();
    $(this).hide();

    if(carac.length === 1 && !game_over && !gagner) {
      var found = false;
      while(mot_mystere.next()) {
        if(mot_mystere.getChar() === carac) { // lettre présente :
          mot_etoile = mot_etoile.replaceAt(mot_mystere.getIndex(), mot_mystere.getChar());
          found = true;
        }
      }
      if(!found && !pendu.next()) {
        game_over = true;
        	$('#reset_button').show();
 			var audio = new Audio('/img/yanp.mp3');
			audio.play();

		}
      if(mot_mystere.getMot() === mot_etoile) {
          gagner = true;
          ding();
          $('#reset_button').show();
		}

      redessineTout(ctx, mot_etoile, pendu, game_over, gagner);
    }
  });

  $("#reset_button").click(function() {
    if(active_index==definitions.length-1) {
		show_score();
	} else {
		pendu.reset();
 		init(active_index+1);
		redessineTout(ctx, mot_etoile, pendu, game_over);
	}
  });
  
});
