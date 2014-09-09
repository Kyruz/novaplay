function validateValue(elementId, warnPlace){
    value = document.getElementById(elementId).value;
    if(value == null || value == ""){
        document.getElementById(warnPlace).innerHTML = "Este campo precisa ser preenchido.";
        return false;
    }
}