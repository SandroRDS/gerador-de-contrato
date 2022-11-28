const inputCep     = document.querySelector("#endereco-cep");
const inputCpf     = document.querySelector("#usuario-cpf");
const inputCnpj    = document.querySelector("#usuario-cnpj");
const inputCelular = document.querySelector("#usuario-celular");

const caracterSeparador = "_";

const cepFormatMask     = "_____-___";
const cpfFormatMask     = "___.___.___-__";
const cnpjFormatMask    = "__.___.___/____-__";
const celularFormatMask = "(__)_____-____";

const caracteresIgnoradosCep     = ["-"];
const caracteresIgnoradosCpf     = [".", "-"];
const caracteresIgnoradosCnpj    = [".", "/", "-"];
const caracteresIgnoradosCelular = ["(", ")", "-"];

new FormMask(inputCep, cepFormatMask, caracterSeparador, caracteresIgnoradosCep);
new FormMask(inputCpf, cpfFormatMask, caracterSeparador, caracteresIgnoradosCpf);
new FormMask(inputCnpj, cnpjFormatMask, caracterSeparador, caracteresIgnoradosCnpj);
new FormMask(inputCelular, celularFormatMask, caracterSeparador, caracteresIgnoradosCelular);