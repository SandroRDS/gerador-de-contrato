class RegisterInputValidation
{
    constructor()
    {
        this.inputsUsuario = {
            nome       : document.getElementById('usuario-nome'),
            sobrenome  : document.getElementById('usuario-sobrenome'),
            email      : document.getElementById('usuario-email'),
            senha      : document.getElementById('usuario-senha'),
            senhaRepeat: document.getElementById('usuario-senha-repeat'),
            celular    : document.getElementById('usuario-celular'),
            cpf        : document.getElementById('usuario-cpf'),
            cnpj       : document.getElementById('usuario-cnpj'),
            cep        : document.getElementById('endereco-cep'),
            rua        : document.getElementById('endereco-rua'),
            numero     : document.getElementById('endereco-numero'),
            uf         : document.getElementById('endereco-UF'),
            bairro     : document.getElementById('endereco-bairro'),
            referencia : document.getElementById('endereco-referencia'),
        }

        this.alerts = {
            nome       : document.getElementById('name--alert'),
            sobrenome  : document.getElementById('sobrenome--alert'),
            email      : document.getElementById('email--alert'),
            senha      : document.getElementById('password--alert'),
            senhaRepeat: document.getElementById('passwordRepeat--alert'),
            cep        : document.getElementById('cep--alert'),
            rua        : document.getElementById('rua--alert'),
            numero     : document.getElementById('numero--alert'),
            uf         : document.getElementById('uf--alert'),
            bairro     : document.getElementById('bairro--alert'),
            referencia : document.getElementById('referencia--alert'),
        }

        this.buttonSteps = {
            step1: {next: document.getElementById('step1next')},
            step2: {next: document.getElementById('step2next'), back:document.getElementById('step2back')},
            step3: {next: document.getElementById('step3next'), back:document.getElementById('step3back')},
        }

        this.regex = {
            nome      : /^[a-zA-Zá-üÁ-Ü]+(( [a-zA-Zá-üÁ-Ü]+)+)?$/,
            email     : /^.+@\w+(\.\w+)+$/,
            senha     : /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#-.])[0-9a-zA-Z$*&@#-.]{8,24}$/,
            cep       : /^\d{5}-\d{3}$/,
            endereco  : /^[\wá-üÁ-Ü.]+((\s[\wá-üÁ-Ü.]+)+)?$/,
            numero    : /^\d{1,6}$/,
            uf        : /^[A-Z]{2}$/,
            referencia: /^([\wá-üÁ-Ü]+)?((\s[\wá-üÁ-Ü]+)+)?$/,
            celular   : /^\(\d{2}\)\d{5}-\d{4}$/,
            cpf       : /^(\d{3}\.){2}\d{3}-\d{2}$/,
            cnpj      : /^\d{2}(\.\d{3}){2}\/\d{4}-\d{2}$/,
        }

        this.errosStep1 = {
            nome       : false,
            sobrenome  : false,
            email      : false, 
            senha      : false, 
            senhaRepeat: false,
        };

        this.errosStep2 = { 
            cep        : false, 
            rua        : false, 
            numero     : false,
            uf         : false,
            bairro     : false,
            referencia : false,
        }

        this.errosStep3 = {
            celular    : false,
            cpf        : false,
            cnpj       : false,
        }

        this.inputsUsuario.nome.onblur        = () => this.validarNome();
        this.inputsUsuario.sobrenome.onblur   = () => this.validarSobrenome();
        this.inputsUsuario.email.onblur       = () => this.validarEmail();
        this.inputsUsuario.senha.onblur       = () => this.validarSenha();
        this.inputsUsuario.senhaRepeat.onblur = () => this.validarSenhaRepeat();
        this.buttonSteps.step1.next.onclick   = () => this.avancarEtapa1();

        this.inputsUsuario.cep.onblur    = () => {
            this.validarCep();
            
            if(!this.errosStep2.cep)
            {
                searchCEP();
            }
        }
        this.inputsUsuario.rua.onblur        = () => this.validarRua();
        this.inputsUsuario.numero.onblur     = () => this.validarNumeroRua();
        this.inputsUsuario.uf.onblur         = () => this.validarUf();
        this.inputsUsuario.bairro.onblur     = () => this.validarBairro();
        this.inputsUsuario.referencia.onblur = () => this.validarReferencia();
        this.buttonSteps.step2.back.onclick  = () => this.voltarEtapa2();
        this.buttonSteps.step2.next.onclick  = () => this.avancarEtapa2();

        this.inputsUsuario.celular.onblur    = () => this.validarCelular();
        this.inputsUsuario.cpf.onblur        = () => this.validarCpf();
        this.inputsUsuario.cnpj.onblur       = () => this.validarCnpj();
        this.buttonSteps.step3.back.onclick  = () => this.voltarEtapa3();
    }

    validarInput(input, alert, regex, tamanhoMin)
    {
        const inputValue = input.value;

        if(this.verificarRegex(inputValue, regex) && this.verificarTamanho(inputValue, tamanhoMin))
        {
            this.estilizarAlert(input, alert, true);
            return true;
        }
        else
        {
            this.estilizarAlert(input, alert, false);
            return false;
        }
    }

    verificarRegex(inputValue, regex)
    {
        return inputValue.match(regex);
    }

    verificarTamanho(inputValue, tamanhoMin)
    {
        return inputValue.length >= tamanhoMin;
    }

    estilizarAlert(input, inputAlert, inputValido)
    {
        if(inputValido)
        {
            input.style.borderBottom = '1px solid blueviolet';
            inputAlert.style.display = 'none';
        }
        else
        {
            input.style.borderBottom = '1px solid red';
            inputAlert.style.display = 'flex';
        }

        this.updateSwiper();
    }

    updateSwiper()
    {
        swiper.on('update');
        swiper.update();
    }

    //Métodos de Validação - Step 1

    validarNome()
    {
        if(this.validarInput(this.inputsUsuario.nome, this.alerts.nome, this.regex.nome, 3))
        {
            this.errosStep1.nome = false;
        }
        else
        {
            this.errosStep1.nome = true;
        }
    }

    validarSobrenome()
    {
        if(this.validarInput(this.inputsUsuario.sobrenome, this.alerts.sobrenome, this.regex.nome, 3))
        {
            this.errosStep1.sobrenome = false;
        }
        else
        {
            this.errosStep1.sobrenome = true;
        }
    }

    validarEmail()
    {
        if(this.validarInput(this.inputsUsuario.email, this.alerts.email, this.regex.email, 0))
        {
            this.errosStep1.email = false;
        }
        else
        {
            this.errosStep1.email = true;
        }
    }

    validarSenha()
    {
        if(this.validarInput(this.inputsUsuario.senha, this.alerts.senha, this.regex.senha, 8))
        {
            this.errosStep1.senha = false;
        }
        else
        {
            this.errosStep1.senha = true;
        }
    }

    validarSenhaRepeat()
    {
        const senha       = this.inputsUsuario.senha.value;
        const senhaRepeat = this.inputsUsuario.senhaRepeat.value;

        if(senha === senhaRepeat)
        {
            this.estilizarAlert(this.inputsUsuario.senhaRepeat, this.alerts.senhaRepeat, true);
            this.errosStep1.senhaRepeat = false;
        }
        else
        {
            this.estilizarAlert(this.inputsUsuario.senhaRepeat, this.alerts.senhaRepeat, false);
            this.errosStep1.senhaRepeat = true;
        }
    }

    avancarEtapa1()
    {
        this.validarNome();
        this.validarSobrenome();
        this.validarEmail();
        this.validarSenha();
        this.validarSenhaRepeat();

        const arrayErros = Object.values(this.errosStep1);

        if(!arrayErros.includes(true))
        {
            this.estilizarEtapa1Concluida();
            swiper.slideNext();
        }
    }

    estilizarEtapa1Concluida()
    {
        const step1 = document.getElementById('step1');
        const separationStep1 = document.getElementById('separation--step1');
        
        step1.style.borderColor = 'blueviolet';
        separationStep1.classList.add('ativo');
    }

    estilizarEtapa1Retrocedida()
    {
        const step1 = document.getElementById('step1');
        const separationStep1 = document.getElementById('separation--step1');
        
        step1.style.borderColor = '#1D1D1D';
        separationStep1.classList.remove('ativo');
    }

    //Métodos de Validação - Step 2

    validarCep()
    {
        if(this.validarInput(this.inputsUsuario.cep, this.alerts.cep, this.regex.cep, 9))
        {
            this.errosStep2.cep = false;
        }
        else
        {
            this.errosStep2.cep = true;
        }
    }

    validarRua()
    {
        if(this.validarInput(this.inputsUsuario.rua, this.alerts.rua, this.regex.endereco, 6))
        {
            this.errosStep2.rua = false;
        }
        else
        {
            this.errosStep2.rua = true;
        }
    }

    validarNumeroRua()
    {
        if(this.validarInput(this.inputsUsuario.numero, this.alerts.numero, this.regex.numero, 1))
        {
            this.errosStep2.numero = false;
        }
        else
        {
            this.errosStep2.numero = true;
        }
    }

    validarUf()
    {
        if(this.validarInput(this.inputsUsuario.uf, this.alerts.uf, this.regex.uf, 2))
        {
            this.errosStep2.uf = false;
        }
        else
        {
            this.errosStep2.uf = true;
        }
    }

    validarBairro()
    {
        if(this.validarInput(this.inputsUsuario.bairro, this.alerts.bairro, this.regex.endereco, 5))
        {
            this.errosStep2.bairro = false;
        }
        else
        {
            this.errosStep2.bairro = true;
        }
    }

    validarReferencia()
    {
        if(this.validarInput(this.inputsUsuario.referencia, this.alerts.referencia, this.regex.referencia, 0))
        {
            this.errosStep2.referencia = false;
        }
        else
        {
            this.errosStep2.referencia = true;
        }
    }

    voltarEtapa2()
    {
        this.estilizarEtapa1Retrocedida();
        swiper.slidePrev();
    }

    avancarEtapa2()
    {
        this.validarCep();
        this.validarRua();
        this.validarNumeroRua();
        this.validarUf();
        this.validarBairro();
        this.validarReferencia();

        const arrayErros = Object.values(this.errosStep2);

        if(!arrayErros.includes(true))
        {
            this.estilizarEtapa2Concluida();
            swiper.slideNext();
        }
    }

    estilizarEtapa2Concluida()
    {
        const step2 = document.getElementById('step2');
        const separationStep2 = document.getElementById('separation--step2');
        
        step2.style.borderColor = 'blueviolet';
        separationStep2.classList.add('ativo');
    }

    estilizarEtapa2Retrocedida()
    {
        const step2 = document.getElementById('step2');
        const separationStep2 = document.getElementById('separation--step2');
        
        step2.style.borderColor = '#1D1D1D';
        separationStep2.classList.remove('ativo');
    }

    //Métodos de Validação - Step 3

    validarCelular()
    {
        if(this.validarInput(this.inputsUsuario.celular, this.alerts.celular, this.regex.celular, 14))
        {
            this.errosStep3.celular = false;
        }
        else
        {
            this.errosStep3.celular = true;
        }
    }

    validarCpf()
    {
        if(this.validarInput(this.inputsUsuario.cpf, this.alerts.cpf, this.regex.cpf, 14))
        {
            this.errosStep3.cpf = false;
        }
        else
        {
            this.errosStep3.cpf = true;
        }
    }

    validarCnpj()
    {
        if(this.validarInput(this.inputsUsuario.cnpj, this.alerts.cnpj, this.regex.cnpj, 18))
        {
            this.errosStep3.cnpj = false;
        }
        else
        {
            this.errosStep3.cnpj = true;
        }
    }

    voltarEtapa3()
    {
        this.estilizarEtapa2Retrocedida();
        swiper.slidePrev();
    }
}

const inputValidation = new RegisterInputValidation();