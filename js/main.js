const inputNome = document.querySelector("#cliente-nome");
const inputRg = document.querySelector("#cliente-rg");
const inputCpf = document.querySelector("#cliente-cpf");
const inputCelular = document.querySelector("#cliente-celular");
const inputsEndereco = {
    rua: document.querySelector("#endereco-rua"),
    numero: document.querySelector("#endereco-numero"),
    cep: document.querySelector("#endereco-cep"),
}

const criarNovoCliente = () => {
   
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

const gerarContrato = () => {
    const cliente = criarNovoCliente();
    localStorage.cliente = JSON.stringify(cliente);

    abrirPaginaDownloadPdf();
}

const abrirPaginaDownloadPdf = () => {
    const url = "pdf.html";
    const aba = window.open(url, '_self');
    aba.focus();
}
