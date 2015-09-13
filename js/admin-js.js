/**
 * JS class for admin login passphrase strength check
 * @uses wp.passwordStrength
 * @since 1.0.0
 **/
var adminLoginPhrases = {

	// local object
	l : null



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

		// Add local to class
		adminLoginPhrases.l = passPhraseObj;
		// disable publish button
		jQuery('#publish').attr('disabled','disabled');

		this.setRandomPhrase();
		this.onClickCheck();
		this.onKeyUp();

		setTimeout( adminLoginPhrases.doCheckPassPhrase, 1000 );

	} // end init : function



	,setRandomPhrase : function() {

		jQuery( '#wplslr-set-random-phrase' ).click( function( event ) {
			event.preventDefault();

			var strings = adminLoginPhrases.l.random_phrase_strings
			var phrase = [];
			var rand = [];

			rand.push(Math.floor( Math.random() * 4 ));
			rand.push(Math.floor( Math.random() * 4 ));
			rand.push(Math.floor( Math.random() * 4 ));
			rand.push(Math.floor( Math.random() * 4 ));

			phrase.push(strings.name[rand[0]]);
			phrase.push(strings.verb[rand[1]]);
			phrase.push(strings.color[rand[2]]);
			phrase.push(strings.object[rand[3]]);

			jQuery('textarea[name=content]').val(phrase.join(' '));
			adminLoginPhrases.doCheckPassPhrase();
		} );

	}



	,getCurrentPhrase : function() {
		return jQuery('textarea[name=content]').val();
	}



	,onClickCheck : function() {

		jQuery( '#wplslr-check-password-strength' ).click( function( event ) {
			event.preventDefault();
			adminLoginPhrases.doCheckPassPhrase();
		} );

	}



	,onKeyUp : function() {

		jQuery( 'body' ).on( 'keyup', 'textarea[name=content]',
			function( event ) {
				adminLoginPhrases.doCheckPassPhrase();
			}
		);

	}



	,doCheckPassPhrase : function() {

		adminLoginPhrases.checkPassPhrase(
			adminLoginPhrases.getCurrentPhrase(), // First password field
			jQuery('#wplslr-password-strength'), // Strength meter
			jQuery('#publish'), // Submit button
			[] // Blacklisted words
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
