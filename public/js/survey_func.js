	/*  Wizard */
	jQuery(function ($) {
		"use strict";
		// Chose here which method to send the email, available:
		// Simple phpmail text/plain > survey.php
		// PHPmailer text/html > phpmailer/survey_phpmailer.php (default)
		// PHPmailer text/html SMPT > phpmailer/survey_phpmailer_smpt.php
		// PHPmailer with html template > phpmailer/survey_phpmailer_template.php
		// PHPmailer with html template SMTP> phpmailer/survey_phpmailer_template_smpt.php
		/*$('form#wrapped').attr('action', 'phpmailer/survey_phpmailer.php');
		$("#wizard_container").wizard({
			stepsWrapper: "#wrapped",
			submit: ".submit",
			beforeSelect: function (event, state) {
				if ($('input#website').val().length != 0) {
					return false;
				}
				if (!state.isMovingForward)
					return true;
				var inputs = $(this).wizard('state').step.find(':input');
				return !inputs.length || !!inputs.valid();
			}
		}).validate({
			errorPlacement: function (error, element) {
				if (element.is(':radio') || element.is(':checkbox')) {
					error.insertBefore(element.next());
				} else {
					error.insertAfter(element);
				}
			}
		});*/
		//  progress bar
		$("#progressbar").progressbar();
		$("#wizard_container").wizard({
			stepsWrapper: "#wrapped",
			submit: ".submit",
			afterSelect: function (event, state) {
				$("#progressbar").progressbar("value", state.percentComplete);
				$("#location").text("(" + state.stepsComplete + "/" + state.stepsPossible + ")");
			},
			beforeSelect: function (event, state) {
				if (!state.isMovingForward) return true;
				
				// Récupérer tous les champs de la question actuelle
				var currentStep = $(this).wizard('state').step;
				var inputs = currentStep.find('input, textarea, select');
				var isValid = true;
				
				// Vérifier chaque champ
				inputs.each(function() {
					if (!$(this).val()) {
						isValid = false;
						$(this).addClass('is-invalid');
					} else {
						$(this).removeClass('is-invalid');
					}
				});
				
				// Si invalide, afficher un message d'erreur
				if (!isValid) {
					if (!currentStep.find('.invalid-feedback').length) {
						currentStep.append('<div class="invalid-feedback d-block">Veuillez répondre à la question avant de continuer</div>');
					}
				}
				
				return isValid;
			}
		});
		// Validate select
		$('#wrapped').validate({
			ignore: [],
			rules: {
				'reponse[]': {
					required: true
				},
				select: {
					required: true
				}
			},
			errorPlacement: function (error, element) {
				if (element.is('select:hidden')) {
					error.insertAfter(element.next('.nice-select'));
				} else {
					error.insertAfter(element);
				}
			}
		});
		// Ajouter la classe required à tous les champs de réponse
		$('input[type="text"], textarea, select').addClass('required');

		// Gérer le clic sur le bouton submit
		$('.submit').on('click', function(e) {
			e.preventDefault();
			
			// Vérifier si tous les champs sont remplis
			var isValid = true;
			$('textarea[name^="additional_message_"]').each(function() {
				if (!$(this).val()) {
					isValid = false;
					$(this).addClass('is-invalid');
				} else {
					$(this).removeClass('is-invalid');
				}
			});
			
			if (isValid) {
				// Soumettre le formulaire
				var form = $('#wrapped');
				form.off('submit').on('submit', function(e) {
					e.preventDefault();
					this.submit();
				});
				form.submit();
			} else {
				alert('Veuillez répondre à toutes les questions avant d\'envoyer le formulaire');
			}
		});
	});

// Summary
function getVals(formControl, controlType) {
    var value = $(formControl).val();
    $("#" + controlType).text(value);
}
