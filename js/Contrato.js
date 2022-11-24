class Contrato
{
    constructor(cliente, quantidadeDeMoveis, dataEvento, tempoDuracaoFesta, pagamento)
    {
        
        this.cliente = cliente;
        this.quantidadeDeMoveis = quantidadeDeMoveis;
        this.dataEvento = dataEvento;
        this.tempoDuracaoFesta = tempoDuracaoFesta;
        
        this.valorTotal = pagamento.valorTotal;
        this.valorTotalPorExtenso = pagamento.valorTotalPorExtenso;
        this.valorEntrada = pagamento.valorEntrada;
        this.formasDePagamento = pagamento.formasDePagamento;
    }
}
