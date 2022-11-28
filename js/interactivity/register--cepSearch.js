const searchCEP = () => {
    
    const cep = document.getElementById('endereco-cep').value;
    const url = `https://viacep.com.br/ws/${cep}/json/`;
  
    fetch(url).then((response) => {
        response.json().then((data) => {
            fillAddress(data);
        });
    });
  
    const fillAddress = (data) => {
      const inputRua     = document.getElementById('endereco-rua');
      const inputBairro  = document.getElementById('endereco-bairro')
      const inputUF      = document.getElementById('endereco-UF');
  
      inputRua.value    = data.logradouro === undefined ? "" : data.logradouro;
      inputBairro.value = data.bairro     === undefined ? "" : data.bairro;
      inputUF.value     = data.uf         === undefined ? "" : data.uf;
    }
}