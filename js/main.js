const criarNovoCliente = () => {
    const inputNome = document.querySelector("#cliente-nome");
    const inputRg = document.querySelector("#cliente-rg");
    const inputCpf = document.querySelector("#cliente-cpf");
    const inputCelular = document.querySelector("#cliente-celular");
    const inputsEndereco = {
        rua: document.querySelector("#endereco-rua"),
        numero: document.querySelector("#endereco-numero"),
        cep: document.querySelector("#endereco-cep"),
    }

    const criarNovoEndereco = () => {
        rua = inputsEndereco.rua.value;
        numero = inputsEndereco.numero.value;
        cep = inputsEndereco.cep.value;

        return new Endereco(rua, numero, cep);
    }
    
    const nome = inputNome.value;
    const rg = inputRg.value;
    const cpf = inputCpf.value;
    const celular = inputCelular.value;
    const endereco = criarNovoEndereco();

    return new Cliente(nome, rg, cpf, celular, endereco);
}

const buscarQuantidadeDeMoveis = () => {
    const inputQuantMesas = document.querySelector("#moveis-mesas");
    const inputQuantCadeiras = document.querySelector("#moveis-cadeiras");
    const inputQuantTampos = document.querySelector("#moveis-tampos");

    const quantidadeDeMoveis = {
        mesas: inputQuantMesas.value,
        cadeiras: inputQuantCadeiras.value,
        tampos: inputQuantTampos.value,
    }

    return quantidadeDeMoveis;
}

const buscarDataDoEvento = () => {
    const inputData = document.querySelector("#data-evento");

    return inputData.value;
}

const buscarTempoDeDuracao = () => {
    const inputTempoDuracao = document.querySelector("#tempo-duracao");

    return inputTempoDuracao.value;
}

const definirPagamento = () => {
    const inputValorTotal = document.querySelector("#pagamento-valor_total");
    const inputValorTotalExtenso = document.querySelector("#pagamento-valor_total_extenso");
    // const inputFormasDePagamento = document.querySelectorAll(".pagamento-formas:checked");

    const valorTotal = Number(inputValorTotal.value);
    const valorTotalExtenso = inputValorTotalExtenso.value;
    // const formasDePagamento = [];

    // inputFormasDePagamento.forEach((input) => {
    //     formasDePagamento.push(input.value);
    // })
    
    return new Pagamento(valorTotal, valorTotalExtenso);
}

const abrirPaginaDownloadPdf = () => {
    const url = "pdf.html";
    const aba = window.open(url, '_blank');
    aba.focus();
}

const gerarContrato = () => {
    const cliente = criarNovoCliente();
    const quantidadeDeMoveis = buscarQuantidadeDeMoveis();
    const dataEvento = buscarDataDoEvento();
    const tempoDuracao = buscarTempoDeDuracao();
    const pagamento = definirPagamento();

    const contrato = new Contrato(cliente, quantidadeDeMoveis, dataEvento, tempoDuracao, pagamento);
    localStorage.contrato = JSON.stringify(contrato);

    abrirPaginaDownloadPdf();
}

