//Mascara do Form
$("#cpf").mask("000.000.000-00");
$("#cpf_login").mask("000.000.000-00");
$("#celular").mask("(00) 00000-0000");
$("#telefone").mask("(00) 0000-0000");
$("#cep").mask("00000-000");
$("#salario").mask('000.000.000.000.000,00', {reverse: true});

// Estilizar validação do formulario
(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()

                toastr.error("Verifique os campos obrigatórios");
                document.documentElement.scrollTop = 0;
            }



            form.classList.add('was-validated')
        }, false)

    })
})()

function exibeCamposCheckbox(checkboxId, dataFieldsId) {
    const checkbox = document.getElementById(checkboxId);
    const dataFields = document.getElementById(dataFieldsId);

    if (checkbox.checked) {
        dataFields.style.display = 'block';
    } else {
        dataFields.style.display = 'none';
    }
}

function limparCampoaoClicar(checkboxId, input1) {
    const checkbox = document.getElementById(checkboxId);

    if (!checkbox.checked) {
        const inp1 = document.getElementById(input1);

        inp1.value = ''
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

function limpar4CamposaoClicar(checkboxId, input1, input2, input3, input4) {
    const checkbox = document.getElementById(checkboxId);

    if (!checkbox.checked) {
        const inp1 = document.getElementById(input1);
        const inp2 = document.getElementById(input2);
        const inp3 = document.getElementById(input3);
        const inp4 = document.getElementById(input4);

        inp1.value = ''
        inp2.value = ''
        inp3.value = ''
        inp4.value = ''
    }
}

function exibirParenteIndicacaoEmpresa(checkboxId, nomeParente, setorParente, localTrabalhoParente, ) {
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

function limparCamposaoClicar(checkboxId, input1, input2, input3){
    const checkbox = document.getElementById(checkboxId);

    if (!checkbox.checked) {
        const inp1 = document.getElementById(input1);
        const inp2 = document.getElementById(input2);
        const inp3 = document.getElementById(input3);

        inp1.value = ''
        inp2.value = ''
        inp3.value = ''
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

function habilitaForm(button,form, buttonAdd, id) {

    const btnAdd = document.getElementById(buttonAdd);
    var inputs = document.getElementsByClassName(form+id);
    var buttons = document.getElementsByClassName(button+id);

    if (btnAdd.style.display === 'none') {
        btnAdd.style.display = 'inline-block';
    } else {
        btnAdd.style.display = 'none';
    }

    for (var i = 0; i < buttons.length; i++) {
        var elemento = buttons[i];

        if (elemento.style.display === 'none') {
            elemento.style.display = 'inline-block';
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

function submitForm(form, seletor, id) {

    var formDelete = document.getElementById(form);

    var inputExperienciaId = document.createElement('input');
         inputExperienciaId.type = 'hidden';
         inputExperienciaId.name = seletor+'_id';
         inputExperienciaId.value = id;

    formDelete.appendChild(inputExperienciaId);

    document.body.appendChild(formDelete);

     formDelete.submit();
}

function limpaFormularioCep() {
    //Limpa valores do formulário de cep.
    document.getElementById('endereco').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('estado_abreviacao').value=("");
    document.getElementById('pais_id').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('endereco').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('estado_abreviacao').value=(conteudo.uf);
        document.getElementById('pais_slug').value=('brasil');
    } //end if.
    else {
        //CEP não Encontrado.
        limpaFormularioCep();
        toastr.error("CEP não encontrado")
    }
}

function pesquisacep() {

    let valor = document.getElementById('cep').value

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('endereco').value="...";
            document.getElementById('bairro').value="...";
            document.getElementById('cidade').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpaFormularioCep();
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpaFormularioCep();
    }
}


function deleteExp(form, seletor,  id) {

    $('#deleteModal').modal('show');

    $('#deleteButtonModal').click(function() {

        submitForm(form, seletor, id);

        $('#deleteModal').modal('hide');
    });
}

function moveToNextInput(inputAtual, proxInput) {

    var inputA = document.getElementById(inputAtual)
    var inputB = document.getElementById(proxInput)

    inputB.focus();
}





