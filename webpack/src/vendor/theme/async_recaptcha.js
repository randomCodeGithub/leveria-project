/**
 * Load Recaptcha when needed.
 */
var captchaLoaded = false;

// Load reCAPTCHA script when CF7 form field is focused
$( '.wpcf7-form input' ).on( 'focus', function() {
    // If we have loaded script once already, exit.
    if ( captchaLoaded ) {
        return;
    }

    // Variable Intialization
    console.log( 'reCAPTCHA script loading.' );

    var head = document.getElementsByTagName( 'head' )[0];
    var recaptchaScript = document.createElement( 'script' );
    var cf7script = document.createElement( 'script' );

    // Add the recaptcha site key here.
    var recaptchaKey = '6Leq4-ggAAAAANLmQvFA9qqEcHxYww2MTBxmhIgc';

    // Dynamically add Recaptcha Script
    recaptchaScript.type = 'text/javascript';
    recaptchaScript.src = 'https://www.google.com/recaptcha/api.js?render=' + recaptchaKey + '&#038;ver=3.0';

    // Dynamically add CF7 script 
    cf7script.type = 'text/javascript';
    cf7script.text = "!function(t,e){var n={execute:function(e){t.execute(\"" + recaptchaKey +"\",{action:e}).then(function(e){for(var t=document.getElementsByTagName(\"form\"),n=0;n<t.length;n++)for(var c=t[n].getElementsByTagName(\"input\"),a=0;a<c.length;a++){var o=c[a];if(\"_wpcf7_recaptcha_response\"===o.getAttribute(\"name\")){o.setAttribute(\"value\",e);break}}})},executeOnHomepage:function(){n.execute(e.homepage)},executeOnContactform:function(){n.execute(e.contactform)}};t.ready(n.executeOnHomepage),document.addEventListener(\"change\",n.executeOnContactform,!1),document.addEventListener(\"wpcf7submit\",n.executeOnHomepage,!1)}(grecaptcha,{homepage:\"homepage\",contactform:\"contactform\"});";

    // Add Recaptcha Script
    head.appendChild( recaptchaScript );
    // Add CF7 Script AFTER Recaptcha. Timeout ensures the loading sequence.
    setTimeout(function() {
        head.appendChild( cf7script );
    }, 1000 );
    //Set flag to only load once
    captchaLoaded = true;
} );