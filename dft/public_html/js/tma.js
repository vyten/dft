/**
 * sätter focus i fromulär
 */
function setFocus(formName,typeName) {
	window.document[formName][typeName].focus();
}

/**
 * inloggning form
*/
function logonForm(formName) {                                                                                                                                        
	var verifyInputValues = {
			'strAnvNamn' : {'error_message':'Du måste fylla i användarnamn', 'require_str_len': 1},
			'strLosen' : {'error_message':'Du måste fylla i lösenord', 'require_str_len': 1}
	}
	return 	verifyInputs(verifyInputValues, formName);
}

/**
 * verifierar form
*/
function verifyInputs(verifyInputValues, formName) {
	for (var inputName in verifyInputValues) {
		var config = verifyInputValues[inputName];
		if (window.document[formName][inputName].value.length < config.require_str_len) {
			alert(config.error_message);
			window.document[formName][inputName].focus();
			return false;
		}
	}
	return true;
}

/**
 * verifierar form
 * att det är siffror
*/

function verifyNumbers(formName,inputName) {
	/* inte tomt */ 
	if (window.document[formName][inputName].value == '') {
		alert('ange ett nummer, tack.');
		return false;
	}
	
	/* endast tecken i regexet nedan (bara tecken 0-9). */
	valuearray = document[formName][inputName].value.split('');
	
	for (var i=0; i < valuearray.length; i++) {
		if (valuearray[i].search(/[0-9]/) == -1) {
			alert('endast tecken 0-9, tack.');
			return false;
		}
	}
	alert('testet passerat!');
	
	/* Här ska man naturligtvis i skarpt läge ha 'return true'
	 * för att skicka formuläret.
	 */
	return false; 
}
