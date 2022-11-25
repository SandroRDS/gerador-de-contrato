const contrato = JSON.parse(localStorage.contrato)

const preencherInformacoesCliente = () => {
    const cliente = contrato.cliente;
    
    const outputNome = document.querySelector("#cliente-nome");
    const outputRg = document.querySelector("#cliente-rg");
    const outputCpf = document.querySelector("#cliente-cpf");
    const outputCelular = document.querySelector("#cliente-celular");
    const outputsEndereco = {
        rua: document.querySelector("#endereco-rua"),
        numero: document.querySelector("#endereco-numero"),
        cep: document.querySelector("#endereco-cep"),
    }

    outputNome.innerHTML = cliente.nome;
    outputRg.innerHTML = cliente.rg;
    outputCpf.innerHTML = cliente.cpf;
    outputCelular.innerHTML = cliente.celular;
    outputsEndereco.rua.innerHTML = cliente.endereco.rua;
    outputsEndereco.numero.innerHTML = cliente.endereco.numero;
    outputsEndereco.cep.innerHTML = cliente.endereco.cep;
}

const preencherInformacoesQuantidadeDeMoveis = () => {
    outputMesas = document.querySelector("#moveis-mesas");
    outputCadeiras = document.querySelector("#moveis-cadeiras");
    outputTampos = document.querySelector("#moveis-tampos");

    outputMesas.innerHTML = contrato.quantidadeDeMoveis.mesas;
    outputCadeiras.innerHTML = contrato.quantidadeDeMoveis.cadeiras;
    outputTampos.innerHTML = contrato.quantidadeDeMoveis.tampos;
}

const preencherDataDoEvento = () => {
    const outputDataEvento = document.querySelector("#data-evento");
    const dataBase = contrato.dataEvento.split("-");
    const dataFormatada = `${dataBase[2]}/${dataBase[1]}/${dataBase[0]}`;
    
    outputDataEvento.innerHTML = dataFormatada;
}

const preencherTempoDeDuracao = () => {
    const outputTempoDuracao = document.querySelector("#tempo-duracao");

    outputTempoDuracao.innerHTML = contrato.tempoDuracaoFesta;
}

const preencherInformacoesPagamento = () => {
    const outputValorTotal = document.querySelector("#pagamento-valor_total");
    const outputValorTotalExtenso = document.querySelector("#pagamento-valor_total_extenso");
    const outputValorEntrada = document.querySelector("#pagamento-valor_entrada");

    outputValorTotal.innerHTML = contrato.valorTotal.toFixed(2);
    outputValorTotalExtenso.innerHTML = contrato.valorTotalPorExtenso;
    outputValorEntrada.innerHTML = contrato.valorEntrada.toFixed(2);
}


preencherInformacoesCliente();
preencherInformacoesQuantidadeDeMoveis();
preencherDataDoEvento();
preencherTempoDeDuracao();
preencherInformacoesPagamento();