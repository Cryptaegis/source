/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

$(document).ready(function(){
	var oldId = null;

	$('.tabs-controls__link').click(function(e) {
		e.preventDefault();

		if ($(this).hasClass('tabs-controls__link--active')) {
			return false
		}

		var currentId = parseInt($(this).data('id'), 10);
		$('.tabs-controls__link--active').removeClass('tabs-controls__link--active');
		$(this).addClass('tabs-controls__link--active');

		if (currentId < oldId) { 
			var timing = $('.card.hidden').length * 100;
			$('.card').each(function(index) {
				if (index > (currentId - 1 ) || index == (currentId - 1)) {
					window.setTimeout(function() {
						$('.card').eq(index).removeClass('hidden');
					}, timing - (index * 100));
				}
			});
		} else {
			$('.card').each(function(index) {
				if (index < (currentId - 1)) {
					window.setTimeout(function() {
						$('.card').eq(index).addClass('hidden');
					}, index * 100);
				}
			});
		}

		oldId = currentId;
	});
});





//confirmation du mot de passe
//Vérifions si le mot de passe et la confirmation sont conformes
var mdp1 = document.querySelector('.mdp1');
var mdp2 = document.querySelector('.mdp2');
mdp2.onkeyup = function(){
    //évenement lorsqu'on écrit dans le champs : confirmation du mot de passe
    message_error = document.querySelector('.message_error');
    if(mdp1.value != mdp2.value){ //s'ils ne sont pas égaux
       //On affiche un message d'erreur
       message_error.innerText = "Les Mots de passes ne sont pas conformes";
    }else {//si non
       //On écrit rien dans message_error
       message_error.innerText=""
    }

}

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
