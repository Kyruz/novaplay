function validateValue(elementId, warnPlace){
    value = document.getElementById(elementId).value;
    if(value == null || value == ""){
        document.getElementById(warnPlace).innerHTML = "Este campo precisa ser preenchido.";
        return false;
    }
}

//Valida o formulario da pagina de cadastro de cliente.
function validarFormCadastro(warnElementId){
    var mens = "";
    var mens2 = "";
    var podeEnviar = true;
    var aviso = document.getElementById(warnElementId);
    aviso.innerHTML = "";
    for(var i = 0; i < document.forms["cliCadForm"].length; i++){
        if(document.forms["cliCadForm"][i].value == "" || document.forms["cliCadForm"][i].value == null){
            document.forms["cliCadForm"][i].style.borderColor = "red";
            mens2 = "Existem campos não preenchidos no formulário.";
            podeEnviar = false;
        }
    }
    if(document.getElementById("aceitoTermos").checked != true){
        mens = "É necessário aceitar os termos de serviço e condições de uso para cadastrar-se.<br>";
        podeEnviar = false;
    }
    if(podeEnviar == false){
       aviso.innerHTML = mens + mens2;
       return false;
    }else{
        return true;
    }
}

//-- Funções usada no menu principal para exibir e ocultar os submenus --//
function openSubmenu(id)
{
    document.getElementById(id).style.display = "table";
}
function closeSubmenus()
{
    var subMenus = document.getElementsByClassName("submenuStuff");
    for(i = 0; i < subMenus.length; i++)
    {
        subMenus[i].style.display = "none";
    }
    document.getElementById("sm02").style.display = "none";
}


//Reseta a borda de um elemento. Por omissão a borda será cinza claro, 1px e solid.
function resetBorder(elemento, essp = 1, cor = '#B2B2B2', tipo = 'solid'){
    document.getElementById(elemento).style.border = essp+'px '+tipo+' '+cor;
}
