let doc = $(document).height();
let win = $(window).height();
const footer = document.getElementById("rodape");

if (doc > win) {
    footer.classList.remove("fixed-bottom");
} else {
    footer.classList.add("fixed-bottom");
}

function exibeCamposCheckbox(checkboxId, dataFieldsId) {
    const checkbox = document.getElementById(checkboxId);
    const dataFields = document.getElementById(dataFieldsId);

    if (checkbox.checked) {
        dataFields.style.display = 'block';
    } else {
        dataFields.style.display = 'none';
    }
}

function exibirTrabalhouEmpresa(checkboxId, dataEntrada, dataSaida, setor, localTrabalhou) {
    const checkbox = document.getElementById(checkboxId);
    const dataEntradaEmpresa = document.getElementById(dataEntrada);
    const dataSaidaEmpresa = document.getElementById(dataSaida);
    const setorEmpresa = document.getElementById(setor);
    const localTrabalhouEmpresa = document.getElementById(localTrabalhou);

    if (checkbox.checked) {
        dataEntradaEmpresa.style.display = 'block';
        dataSaidaEmpresa.style.display = 'block';
        setorEmpresa.style.display = 'block';
        localTrabalhouEmpresa.style.display = 'block';
    } else {
        dataEntradaEmpresa.style.display = 'none';
        dataSaidaEmpresa.style.display = 'none';
        setorEmpresa.style.display = 'none';
        localTrabalhouEmpresa.style.display = 'none';
    }
}

function exibirParenteIndicacaoEmpresa(checkboxId, nomeParente, setorParente, localTrabalhoParente) {
    const checkbox = document.getElementById(checkboxId);
    const nomeParenteEmpresa = document.getElementById(nomeParente);
    const setorParenteEmpresa = document.getElementById(setorParente);
    const localTrabalhoEmpresa = document.getElementById(localTrabalhoParente);


    if (checkbox.checked) {
        nomeParenteEmpresa.style.display = 'block';
        setorParenteEmpresa.style.display = 'block';
        localTrabalhoEmpresa.style.display = 'block';
    } else {
        nomeParenteEmpresa.style.display = 'none';
        setorParenteEmpresa.style.display = 'none';
        localTrabalhoEmpresa.style.display = 'none';
    }
}

function exibirAddExperiencia(botaoAdd, formAdd) {
    const botao = document.getElementById(botaoAdd);
    const form = document.getElementById(formAdd);

    botao.style.display = 'none';
    form.style.display = 'block';

}

function ocultarAddExperiencia(botaoAdd, formAdd) {
    const botao = document.getElementById(botaoAdd);
    const form = document.getElementById(formAdd);

    botao.style.display = 'block';
    form.style.display = 'none';

}


function habilitaForm(id) {

    const buttonEditar = document.getElementById('buttonEditar'+id);
    const buttonSalvar = document.getElementById('buttonSalvar'+id);
    const buttonCancelar = document.getElementById('buttonCancelar'+id);

    var inputs = document.getElementsByClassName('form'+id);
    var buttons = document.getElementsByClassName('button'+id);

    for (var i = 0; i < buttons.length; i++) {
        var elemento = buttons[i];

        if (elemento.style.display === 'none') {
            elemento.style.display = 'block';
        } else {
            elemento.style.display = 'none';
        }
    }

    for (var i = 0; i < inputs.length; i++) {
        var elemento = inputs[i];

        if (elemento.disabled) {
            elemento.disabled = false
        } else {
            elemento.disabled = true
        }
    }
}

function submitForm(id, token) {







     const inputDelete = document.getElementById('delete'+id);
     var formDelete = document.getElementById('formDelete');


     inputDelete.setAttribute('value', id)

     console.log(formDelete)
     formDelete.submit();
}

