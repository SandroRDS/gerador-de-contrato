const botoes = document.querySelectorAll(".botao");
const validarModificacao = (botao) => {
    
    //opcao = executarConfirmModal()
    const opcao = true;

    if(opcao)
    {
        const query = botao.dataset.query;
        const id    = botao.dataset.id;

        switch(query)
        {
            case "edit":
                const estado = botao.dataset.value;
                const novoEstado = estado == 1 ? 0 : 1;
                window.location.assign(`/gerador-de-contratos/php/query/UPDATE_user.php?id=${id}&campos=ativo&valores=${novoEstado}`);
                break;
            case "delete":
                window.location.assign(`/gerador-de-contratos/php/query/DELETE_user.php?id=${id}`);
                break;
        }
    }
};

botoes.forEach((botao) => {
    botao.onclick = () => validarModificacao(botao);
})