/**
 * adminLoginPhrases
 *
 * @version 1.0
 * @updated 00.00.00
 **/
var adminLoginPhrases = {


	l : 0



	,init : function() {

		if ( typeof passPhraseObj == 'undefined' ) {
			return;
		}
		if ( typeof passPhraseObj.active == 'undefined' ) {
			return;
		}
		if ( passPhraseObj.active != 1 ) {
			return;
		}

		adminLoginPhrases.l = passPhraseObj;

		jQuery('#publish').attr('disabled','disabled');

		this.onClickCheck();

	} // end init : function



	,getCurrentPhrase : function() {
		return 'Cindy jump brown trains';
	}



	,onClickCheck : function() {

		jQuery( '#wplslr-check-password-strength' ).click( function( event ) {
			event.preventDefault();
			var currentPhrase = adminLoginPhrases.getCurrentPhrase();
			adminLoginPhrases.checkPassPhrase(
				currentPhrase, // First password field
				jQuery('#wplslr-password-strength'), // Strength meter
				jQuery('#publish'), // Submit button
				[] // Blacklisted words
			);
		} );

	}



	,onKeyUp : function() {

		jQuery( 'body' ).on( 'keyup', 'textarea[name=content]',
			function( event ) {
				var currentPhrase = adminLoginPhrases.getCurrentPhrase();
				adminLoginPhrases.checkPassPhrase(
					currentPhrase, // First password field
					jQuery('#wplslr-password-strength'), // Strength meter
					jQuery('#publish'), // Submit button
					[] // Blacklisted words
				);
			}
		);

	}



	,checkPassPhrase : function( pass1, strengthResult, submitButton, blacklistArray ) {

		// Reset the form & meter
		submitButton.attr( 'disabled', 'disabled' );
		strengthResult.removeClass( 'short bad good strong' );

		// Extend our blacklist array with those from the inputs & site data
		blacklistArray = blacklistArray.concat( wp.passwordStrength.userInputBlacklist() )

		// Get the password strength
		var strength = wp.passwordStrength.meter( pass1, blacklistArray, pass1 );

		// Add the strength meter results
		switch ( strength ) {

			case 2 :
				strengthResult.addClass( 'bad' ).html( adminLoginPhrases.l.bad );
				break;
			case 3 :
				strengthResult.addClass( 'good' ).html( adminLoginPhrases.l.good );
				break;
			case 4 :
				strengthResult.addClass( 'strong' ).html( adminLoginPhrases.l.strong );
				break;
			case 5 :
				strengthResult.addClass( 'short' ).html( adminLoginPhrases.l.mismatch );
				break;
			default:
				strengthResult.addClass( 'short' ).html( adminLoginPhrases.l.short );
		}

		// enable only the submit button if the password is strong and
		if ( 4 === strength ) {
			submitButton.removeAttr( 'disabled' );
		}

		return strength;

	} // end checkPassPhrase : function



}; // end var adminLoginPhrases


// init
jQuery(document).ready(function() {
	adminLoginPhrases.init();
});
