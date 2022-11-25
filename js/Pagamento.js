class Pagamento
{
    constructor(valorTotal, valorTotalPorExtenso)
    {
        this.valorTotal = valorTotal;
        this.valorTotalPorExtenso = valorTotalPorExtenso;
        this.valorEntrada = valorTotal * 0.3;
        
        /*
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
        */
    }
}