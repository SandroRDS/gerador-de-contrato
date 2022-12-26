const botoes = document.querySelectorAll(".botao");

const enviarRequisicao = (dados) => {
    const botao = dados[0];
    const query = botao.dataset.query;
    const id    = botao.dataset.id;
    const data  = { id: id };

    switch(query)
    {
        case "edit":
            const estado = botao.dataset.value;
            const novoEstado = estado == 1 ? 0 : 1;
            data.estado = novoEstado;

            fetch("/gerador-de-contratos/php/query/UPDATE_user.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
            });

            setTimeout(() => location.reload(true), 1000);
            break;

        case "delete":
            fetch("/gerador-de-contratos/php/query/DELETE_user.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
            });

            setTimeout(() => location.reload(true), 1000);
            break;
    }
}

botoes.forEach((botao) => {
    botao.onclick = () => executarConfirmModal(enviarRequisicao, botao);
})