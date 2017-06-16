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