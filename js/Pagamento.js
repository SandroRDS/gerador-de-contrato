class Pagamento
{
    constructor(valorTotal, valorTotalPorExtenso, valorEntrada, formasDePagamento)
    {
        this.valorTotal = valorTotal;
        this.valorTotalPorExtenso = valorTotalPorExtenso;
        this.valorEntrada = valorEntrada;
        this.formasDePagamento = formasDePagamento.reduce((textoConcatenado, formaAtual, indice, arrayFormasDePagamento) => {
            textoConcatenado += formaAtual;

            if(indice == arrayFormasDePagamento.length - 2)
            {
                textoConcatenado += " e ";
            }
            else if(indice <= arrayFormasDePagamento.length - 3)
            {
                textoConcatenado += ", ";
            }

            return textoConcatenado;

        }, "");

    }
}