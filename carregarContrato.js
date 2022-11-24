const preencherInformacoesCliente = () => { 
    const cliente = JSON.parse(localStorage.cliente);
    
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

preencherInformacoesCliente();
