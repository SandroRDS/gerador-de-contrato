class Contrato
{
    constructor(cliente, quantidadeDeMoveis, dataFesta, tempoDuracaoFesta, pagamento)
    {
        
        this.cliente = cliente;
        this.quantidadeDeMoveis = quantidadeDeMoveis;
        this.dataFesta = dataFesta;
        this.tempoDuracaoFesta = tempoDuracaoFesta;
        
        this.valorTotal = pagamento.valorTotal;
        this.valorTotalPorExtenso = pagamento.valorTotalPorExtenso;
        this.valorEntrada = pagamento.valorEntrada;
        this.formasDePagamento = pagamento.formasDePagamento;
    }
}
