
	//**********************************************************************************
		//**********  IGOR A. BRANDÃO 2013 - 2016 ©
		//**********
		//**********  PGM: PHP GENERAL FUNCTIONS CLASS
		//**********
		//**********  CUSTOMER:	AIRES SOLUÇÕES CORPORATIVAS
		//**********
		//**********  IGOR AUGUSTO BRANDÃO
		//**********  VERSÃO:	1.0
		//**********  VERSÃO:	1.2
		//**********  VERSÃO:	1.3
		//**********
		//**********  APR/2014 - Creation
		//**********  OCT/2015 - Update
		//**********  DEC/2015 - Update
		//**********
	//**********************************************************************************

	//********************************** CONSTANTS *********************************
	const EPSILON = 0.000000001;
	//******************************************************************************

	//!*****************************************************************************
	//! GENERAL FUNCTIONS
	//!*****************************************************************************

	/*!
	 * Function to limit the character count in a textArea
	 * @Campo => the textArea field
	 * @qtd_ => the actual character count
	 * @contador_ => the html counter
	 * @padrao => the standard counter
	*/
	function contar( Campo, qtd_, contador_, padrao )
	{
		document.getElementById(contador_).innerHTML = "(" + (qtd_ - Campo.value.length) + " caracteres restantes)";
		if ( (qtd_ - Campo.value.length) <= 0 )
		{
			alert('Atenção, você atingiu o limite máximo de caracteres!');
			document.getElementById(contador_).innerHTML = "(0 caracteres restantes)";	
			Campo.value = Campo.value.substring(0, padrao);
		}

		Campo.value.length = qtd_;
	}

	//!*****************************************************************************
	//! STRING MANIPULATION FUNCTIONS
	//!*****************************************************************************

	/*!
	 * Function to convert a string in a numeric value
	 * @str_ => the value to be converted
	*/
	function val( str_ )
	{
		var value = parseFloat( String( str_ ).replace( /\./g , "" ).replace( /\,/ , "." ) );
		return isNaN( value ) ? 0 : value;
	}

	/*!
	 * Function to format values
	 * @str_ => the value to be converted
	*/
	function szFormataValor( str_ )
	{
		var valor = String(str_).replace(".",",");
		return FmtV( valor , 'V' , 2 );
	}

	/*!
	 * Function to accept only numeric values
	*/
	function vApenasNum() 
	{
		event.srcElement.value = event.srcElement.value.replace(/\D/gi, "");
		event.srcElement.select();
	}

	/*!
	 * Function to accept only numeric values from typing
	 * @e => typing event
	*/
	function vNum( e )
	{
		var tecla = (window.event)?event.keyCode:e.which;   
		if( (tecla>47 && tecla<58) ) return true;
		else{
			if ( tecla==8 || tecla==0 ) return true;
		else  return false;
		}
	}

	/*!
	 * Function to accept only numeric values, dot and comma
	 * @e => typing event
	*/
	function vNumPV(e)
	{
		var tecla=(window.event)?event.keyCode:e.which;   
		if ( (tecla>47 && tecla<58) ) return true;
		else {
			if (tecla==8 || tecla==0 || tecla==46) return true;
		else  return false;
		}
	}

	/*!
	 * Function to accept onlye alphanumeric values
	 * @str_ => the value to be converted
	*/
	function vChar( e )
	{
		var tecla=new Number();
		if ( window.event ) {
			tecla = e.keyCode;
		}
		else if(e.which) {
			tecla = e.which;
		}
		else {
			return true;
		}
		if( (tecla >= "48") && (tecla <= "57") ){
			return false;
		}
	}

	/*!
	 * Function to keep just number in a string
	 * @str_ => the string to be modified
	*/
	function szSoNumeros( str_ ) 
	{
		return String(str_).replace(/\D/g, "")
	}

	/*!
	 * Function to remove numbers from the string
	 * @str_ => the string to be modified
	*/
	function szChar( str_ ) 
	{
		return String(str_).replace(/\d+/g, "")
	}

	//!*****************************************************************************
	//! DATA VALIDATION FUNCTIONS
	//!*****************************************************************************

	/*!
	 * Function to validate cpf
	 * @cpf_ => the value to be validated
	*/
	function isCpf( cpf_ )
	{
		// Receive the value from the parameter
		var cpf = cpf_;

		// Check if the informed CPF is valid
		cpf = cpf.replace(/[^\d]+/g,'');

		// Check if the CPF was filles
    	if ( cpf.localeCompare("") == 0 ) return false;

    	// Eliminate the well known invalid CPFs
	    if ( cpf.length != 11 || 
	        cpf == "00000000000" || 
	        cpf == "11111111111" || 
	        cpf == "22222222222" || 
	        cpf == "33333333333" || 
	        cpf == "44444444444" || 
	        cpf == "55555555555" || 
	        cpf == "66666666666" || 
	        cpf == "77777777777" || 
	        cpf == "88888888888" || 
	        cpf == "99999999999" )
	    {
			return false;
		}

	    // Validate the first digit
	    add = 0;

	    // Sum-up the digits
	    for ( i = 0; i < 9; i++ )
	    {
			add += parseInt(cpf.charAt(i)) * (10 - i);
	    }

	    // Check the rest operation
	    rev = 11 - (add % 11);  

	    // To be valid, the rest should be divisible for 10 or 11
		if ( rev == 10 || rev == 11 )
		{
			rev = 0;    
		}

		// The rest must be different from the first digit
	    if (rev != parseInt(cpf.charAt(9)))
	    {
			return false;
		}

		// Validate the second digit
    	add = 0;

    	// Sum-up the digits
    	for ( i = 0; i < 10; i++ )
    	{
        	add += parseInt(cpf.charAt(i)) * (11 - i);  
        }

        // Check the rest operation
	    rev = 11 - (add % 11);  

	    // To be valid, the rest should be divisible for 10 or 11
		if ( rev == 10 || rev == 11 )
		{
			rev = 0;    
		}

		// The rest must be different from the second digit
	    if (rev != parseInt(cpf.charAt(10)))
	    {
			return false;
		}

		// CPF is valid
  	 	return true;
	}

	/*!
	 * Function to validate a cnpj
	 * @cnpj_ => the cnpj to be validated
	*/
	function isCnpj( cnpj_ )
	{
		// Remove all the cnpj mask
		cnpj = cnpj_.replace(/[^\d]+/g,'');

		// Check if the informed CNPJ is valid
		if(cnpj == '') return false;

		if (cnpj.length != 14)
			return false;

		// Eliminate the well known invalid CNPJs
		if ( cnpj == "00000000000000" || 
			cnpj == "11111111111111" || 
			cnpj == "22222222222222" || 
			cnpj == "33333333333333" || 
			cnpj == "44444444444444" || 
			cnpj == "55555555555555" || 
			cnpj == "66666666666666" || 
			cnpj == "77777777777777" || 
			cnpj == "88888888888888" || 
			cnpj == "99999999999999" )
		{
			return false;
		}

		// Check the CNPJ validity
		tamanho = cnpj.length - 2
		numeros = cnpj.substring(0,tamanho);
		digitos = cnpj.substring(tamanho);
		soma = 0;
		pos = tamanho - 7;
		for (i = tamanho; i >= 1; i--) {
		  soma += numeros.charAt(tamanho - i) * pos--;
		  if (pos < 2)
				pos = 9;
		}
		resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
		if (resultado != digitos.charAt(0))
			return false;
			 
		tamanho = tamanho + 1;
		numeros = cnpj.substring(0,tamanho);
		soma = 0;
		pos = tamanho - 7;
		for (i = tamanho; i >= 1; i--) {
		  soma += numeros.charAt(tamanho - i) * pos--;
		  if (pos < 2)
				pos = 9;
		}
		resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
		if (resultado != digitos.charAt(1))
			  return false;
			   
		return true;
	} // eCnpj

	/*!
	 * Function to validate a matrix cnpj
	 * @cnpj_ => the cnpj to be validated
	*/
	function isCnpjMatriz( cnpj_ )
	{
		// Auxiliary variable
		var suffix = "";

		// Remove all the cnpj mask
		cnpj = cnpj_.replace(/[^\d]+/g,'');

		// Check if the informed CNOJ is valid
		if(cnpj == '') return false;

		if (cnpj.length != 14)
			return false;

		// Eliminate the well known invalid CNPJs
		if ( cnpj == "00000000000000" || 
			cnpj == "11111111111111" || 
			cnpj == "22222222222222" || 
			cnpj == "33333333333333" || 
			cnpj == "44444444444444" || 
			cnpj == "55555555555555" || 
			cnpj == "66666666666666" || 
			cnpj == "77777777777777" || 
			cnpj == "88888888888888" || 
			cnpj == "99999999999999" )
		{
			return false;
		}

		// Validate the CNPJ matrix indicator
		cnpj_length = (cnpj.length - 2);
		suffix = cnpj.substring(8, cnpj_length);

		// Check if the informed CNPJ is related to matrix
		if ( suffix.localeCompare("0001") == 0 )
		{
			// It's a matrix
			return true;
		}
		else
		{
			// It's a branch
			return false;
		}
	} // eCnpjMatriz

	/*!
	 * Function to validate an e-mail
	 * @str_ => the e-mail to be validated
	*/
	function eEmail( str_ ) 
	{
		var reEmail = /^[\w!#$%&'*+\/=?^`{|}~-]+(\.[\w!#$%&'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
		return Boolean(str_.match(reEmail));
	}

	/*!
	 * Function to validate a name
	 * @str_ => the name to be validated
	*/
	function eNome( str_ ) 
	{
		var reNome = /^[a-z\u00C0-\u00ff A-Z]{3,50}$/;
		return Boolean(str_.match(reNome));
	}

	/*!
	 * Function to validate a password
	 * Rule: the password should contains between 6 and 30 characters,
	 * letters, numbers and special characters
	 *
	 * @str_ => the password to be validated
	*/
	function eSenha( str_ )
	{
		var reSenha = /^[A-Za-z0-9!@#$%^&*()_]{6,30}$/;
		return Boolean(str_.match(reSenha));
	}

	/*!
	 * Function to validate a cep
	 * @str_ => the name to be validated
	*/
	function eCep(str) 
	{
		var reCep = /^\d{5}-\d{3}$/;
		return Boolean(str.match(reCep));
	}

	/*!
	 * Function to validate a telephone number
	 * @str_ => the tell to be validated
	*/
	function eTelefone( str_ ) 
	{
		var reTel = /^\d{6}-\d{4}$/;
		return Boolean(str_.match(reTel));
	}

	/*!
	 * Function to validate dates
	 * @str_ => the date to be validated
	*/
	function eData( str_ ) 
	{
		var reData = /^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/;
		return Boolean(str_.match(reData));
	}

	/*!
	 * Function to validate file extensions
	 * @str_ => the extension to be validated
	*/
	function eExtensao( str_ ) 
	{
		var reExt = /\.[0-9a-z]+$/i;
		return Boolean(str_.match(reExt));
	}

	/*!
	 * Function to validate the uploader extension
	 * @element_ => the element that provides the file path
	 * @str_ => the file extension to be validated
	*/
	function checkFileName( element_, str_ ) 
	{
		var fileName = element_.value;

		if ( str_ == "" ) 
		{
			alert("Defina uma extensão válida");
			return false;
		}
		if ( fileName == "" )
		{
			element_.title = "Busque um arquivo com a extensão " + str_;
			alert("Busque um arquivo com a extensão " + str_);
			return false;
		}
		else if ( ("." + fileName.split(".")[1].toUpperCase()) == str_.toUpperCase())
			return true;
		else 
		{
			element_.title = "A extensão ." + fileName.split(".")[1] + " é inválida. Busque um arquivo com a extensão " + str_;
			alert("A extensão ." + fileName.split(".")[1] + " é inválida. Busque um arquivo com a extensão " + str_);
			return false;
		}
		return true;
	}

	//!*****************************************************************************
	//! DATA FORMAT FUNCTIONS
	//!*****************************************************************************

	/*!
	 * Generic function to format a value
	 * @str_ => the value to be formatted
	 * @format_ => the format to change the value
	*/
	function format( str_ , format_ )
	{
		if ( ! str_ ) str_ = "";
		else str_ = str_.toString();

		var retorno = str_;

		if ( format_ )
		{
			format_ = format_.toString();

			var i , j;

			j = str_.toString().length - 1;

			retorno = format_;

			for ( i = retorno.length - 1 ; i >= 0 ; i-- )
			{
				if ( j < 0 ) break;

				if ( retorno.substr( i , 1 ) == "#" && ! isNaN( str_.substr( j , 1 ) ) )
				{
					format_ = format_.substr( 0 , i )
							  + str_.substr( j , 1 )
							  + format_.substr( i + 1 , format_.length - i );
					j--;
				}
			}

			retorno = format_.substr( i + 1 , format_.length - i ).replace( /#/gi , "" );
		}

		return retorno;
	}

	/*!
	 * Generic function to format a value
	 * @str_ => the value to be formatted
	 * @format_ => the format to change the value
	*/
	function szFormatarCnpjCpf( szCnpjCpf_ )
	{
		if ( szCnpjCpf_ != "" )
		{
			szCnpjCpf_ = String( szLimparPontuacao( szCnpjCpf_ ) );
			var szFormato = ( szCnpjCpf_.length <= 11 ) ? "###.###.###-##" : "##.###.###/####-##";
		}

		return format( szCnpjCpf_ , szFormato );
	}

	function szFormatarTelefone( szTelefone_ )
	{
		if ( szTelefone_ != "" )
			szTelefone_ = String( szLimparPontuacao( szTelefone_ ) );

		return format( szTelefone_ , "(##)####-####" );
	}

	function szFormatarCelular( szTelefone_ )
	{
		if ( szTelefone_ != "" )
			szTelefone_ = String( szLimparPontuacao( szTelefone_ ) );

		return format( szTelefone_ , "(##)#####-####" );
	}

	function szFormatarData( szData_ )
	{
		if ( szData_ != "" )
			szData_ = String( szLimparPontuacao( szData_ ) );

		return format( szData_ , "##/##/####" );
	}

	function szFormatarDataUS( szData_ )
	{
		if ( szData_ != "" )
			szData_ = String( szLimparPontuacao( szData_ ) );

		return format( szData_ , "####-##-##" );
	}

	function szFormatarCep( szCep_ )
	{
		if ( szCep_ != "" )
			szCep_ = String( szLimparPontuacao( szCep_ ) );

		return format( szCep_ , "#####-###" );
	}

	function szFormatarValor( valor_ )
	{
		if ( typeof valor_ != "string" )
			var valor = String( valor_ ).replace( "." , "," );
		else
			var valor = valor_;

		return FmtV( valor , "V" , 2 , true );
	}

	function szLimparPontuacao( szExpressao_ )
	{
		return szExpressao_.replace( /\W/g , "" );
	}

	/*!
	 * Remove blank spaces from the beginning and the end from the string
	 * @str_ => the string to be changed
	*/
	function trim( str_ ) 
	{
		var str = str_.replace(/^\s\s*/, ''),
					  ws = /\s/,
			  i = str.length;
		while (ws.test(str.charAt(--i)));
		return str.slice(0, i + 1);
	}

	//!*****************************************************************************
	//! DATA MASK FUNCTIONS
	//!*****************************************************************************

	/*! 
	 * Função geradora de máscara automática 
	 * @src => campo a ser formatado
	 * @mask => formato da máscara
	*/
	function mascara_automatica(src, mask) 
	{
		var i = src.value.length;
		var saida = mask.substring(0,1);
		var texto = mask.substring(i)

		if (texto.substring(0,1) != saida) 
		{
			src.value += texto.substring(0,1);
		}
	}
	
	//!*****************************************************************************
	//! DATE AND TIME MANIPULATION FUNCTIONS
	//!*****************************************************************************

	function obter_data_atual()
	{
		hoje = new Date();
		dia = hoje.getDate();
		mes = hoje.getMonth();
		ano = hoje.getFullYear();
		
		if (dia < 10)
		  dia = "0" + dia
		
		if (ano < 2000)
		  ano = "19" + ano

		//O mes começa em Zero, então soma-se 1
		return (dia+"/"+(mes+1)+"/"+ano);
	}

	function obter_ano_atual()
	{
		hoje = new Date();
		ano = hoje.getFullYear();

		if (ano < 2000)
		  ano = "19" + ano;

		// retorno do ano
		return ano;
	}

	/*! 
	 * Function to compare dates
	 * @ini_ => initial date
	 * @final_ => final date
	 * @separator_ => separador das datas
	*/
	function compararDatas( ini_, final_, separator_ )
	{
		var Compara01 = parseInt(ini_.split(separator_)[2].toString() + ini_.split(separator_)[1].toString() + ini_.split(separator_)[0].toString());
		var Compara02 = parseInt(final_.split(separator_)[2].toString() + final_.split(separator_)[1].toString() + final_.split(separator_)[0].toString());

		if (Compara01 >= Compara02)
		{
			return false;
		}
		else 
		{
			return true;
		}
	}

	/*!
	 * Add working days to date
	 * @startingDate => the date itself
	 * @daysToAdjust => number of days to be adjusted
	*/
	function addWorkingDay( startingDate, daysToAdjust )
	{
		var newDate = new Date(startingDate.valueOf()),
			businessDaysLeft,
			isWeekend,
			direction;

		var dia = "", mes = "";
			
		// Timezones are scary, let's work with whole-days only
		/*if (daysToAdjust !== parseInt(daysToAdjust, 10)) {
			throw new TypeError('addBusinessDays can only adjust by whole days');
		}*/

		// short-circuit no work; make direction assignment simpler
		if (daysToAdjust === 0) {
			return startingDate;
		}
		direction = daysToAdjust > 0 ? 1 : -1;

		// Move the date in the correct direction
		// but only count business days toward movement
		businessDaysLeft = Math.abs(daysToAdjust);
		while (businessDaysLeft) {
			newDate.setDate(newDate.getDate() + direction);
			isWeekend = newDate.getDay() in {0: 'Sunday', 6: 'Saturday'};
			if (!isWeekend) {
				businessDaysLeft--;
			}
		}

		dia = newDate.getDate();
		mes = (newDate.getMonth() + 1);

		if ( dia < 10 )
			dia = "0" + dia;

		if ( mes < 10 )
			mes = "0" + mes;

		return dia + "/" + mes + "/" +  newDate.getFullYear();
	}

	//!*****************************************************************************
	//! REAL TIME ELEMENTS CHANGER FUNCTIONS
	//!*****************************************************************************

	/*! 
	 * Function to simulate a regressive timer
	 * @elemento_ => element to display time
	 * @tempo_ => time
	 * @url_ => url to redirect
	*/
	function regresseiveTime( elemento_, tempo_, url_ )
	{
		while ( tempo_ )
		{
			// Set element with initial time
			elemento_.innerHTML = tempo_;
			tempo_ -= 1;
		}
		// Redirect page
		window.location.href = url_;
	}

	//!*****************************************************************************
	//! COMPONENTS INITIALIZATION
	//!*****************************************************************************

	/*!
	* Initilize the calendar component
	* @obj_ => the calendar object itself
	*/
	var myCalendar;
	function startCalendar( obj_ )
	{
		myCalendar = new dhtmlXCalendarObject([obj_]);
		myCalendar.setDateFormat('%d-%m-%Y');
	}

	//!*****************************************************************************
	//! DATA CONVERSION
	//!*****************************************************************************

	/*!
		@brief Conjunto de funções para tratamento dos dados
		@date 2008
	*/

	/*! 
	 * Converte uma string em formato moeda para float
	 * @param valor(string) - o valor em moeda
	 * @return valor(float) - o valor em float
	*/
	function converteMoedaFloat( valor_ )
	{
		if ( valor_ === "" )
		{
			valor_ =  0;
		}
		else
		{
			valor_ = valor_.toString();
			valor_ = valor_.replace(".","");
			valor_ = valor_.replace(",",".");
			valor_ = parseFloat( valor_ );
		}
		return valor_;
	}

	/*!
	 * Converte um valor em formato float para uma string em formato moeda
	 * @param valor(float) - o valor float
	 * @return valor(string) - o valor em moeda
	*/
	function converteFloatMoeda( valor_ )
	{
		var inteiro = null, decimal = null, c = null, j = null;
		var aux = new Array();
		valor_ = "" + valor_;
		c = valor_.indexOf(".",0);

		// encontrou o ponto na string
		if ( c > 0 )
		{
			// separa as partes em inteiro e decimal
			inteiro = valor_.substring(0,c);
			decimal = valor_.substring(c+1,valor_.length);
		}
		else
		{
			inteiro = valor_;
		}

		// pega a parte inteiro de 3 em 3 partes
		for (j = inteiro.length, c = 0; j > 0; j-=3, c++)
		{
			aux[c]=inteiro.substring(j-3,j);
		}

		// percorre a string acrescentando os pontos
		inteiro = "";
		for(c = aux.length-1; c >= 0; c--)
		{
			inteiro += aux[c]+'.';
		}

		// retirando o ultimo ponto e finalizando a parte inteiro
		inteiro = inteiro.substring(0,inteiro.length-1);
		decimal = parseInt(decimal);

		if ( isNaN(decimal) )
		{
			decimal = "00";
		}
		else
		{
			decimal = ""+decimal;
			if ( decimal.length === 1 )
			{
				decimal = decimal+"0";
			}
		}

		valor_ = "R$ "+inteiro+","+decimal;
		return valor_;
	}

	/*! 
	 * Converte a float number in minutes
	 * @param value_(string) - the float value
	*/
	function convertFloatMinutes( value_ )
	{
		var result;
		var time = value_.split(".");
		var minutes = time[0];
		var seconds = time[1];

		if ( seconds > 60 )
		{
			seconds = (seconds / 60);
			+minutes + +(seconds % 60);

			if ( seconds.toString().indexOf(".") > -1 )
			{
				var seconds_aux = seconds.toString().split(".");
				seconds = seconds_aux[1].substring(0, 2);
			}
		}

		result = minutes + "." + seconds;
		return result;
	}

	//!*****************************************************************************
	//! CURRENCY MANIPULATION FUNCTIONS
	//!*****************************************************************************

	/**
	 * Number.prototype.number_format(n, x, s, c)
	 * 
	 * @param integer n => length of decimal
	 * @param integer x => length of whole part
	 * @param mixed   s => sections delimiter
	 * @param mixed   c => decimal delimiter
	 */
	Number.prototype.number_format = function( n, x, s, c )
	{
		var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
			num = this.toFixed(Math.max(0, ~~n));

		return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
	};

	/**
	 * Get the monetary part of a string
	 * @value => the value to be converted
	*/
	function getMoney( value )
	{
		if ( value != 0 )
			return parseInt( value.replace(/[\D]+/g,'') );
		else
			return "000";
	}

	/**
	 * Convert a to Brazilian real standards 
	 * @value => the value to be converted
	*/
	function format_real( value )
	{
		var tmp = value + '';
		tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
		if( tmp.length > 6 )
			tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

		return tmp;
	}

	/**
	 * Convert a currency to Brazilian real standards 
	 * @value => the value to be converted
	*/
	function real_currency( value )
	{
		return value.number_format(2, 3, ',', '.');
	}

	/**
	 * Convert a currency to American USD standards 
	 * @value => the value to be converted
	*/
	function usd_currency( value )
	{
		return value.number_format(2, 3, '.', ',');
	}

	/**
	 * Sum money in Brazilian real standards 
	 * @value01_ => value 01 to be summed
	 * @value02_ => value 02 to be summed
	 * @operator_ => define the opration to be executed
	*/
	function currency_operations( value01_, value02_, operator_ )
	{
		var value;
		var v1 = value01_.toString();
		var v2 = value02_.toString();

		// Remove the currency simbols and uncessary parts
		v1 = v1.replace(",", ".");
		v1 = v1.replace("R$", "");
		v1 = v1.replace("$", "");

		v2 = v2.replace(",", ".");
		v2 = v2.replace("R$", "");
		v2 = v2.replace("$", "");

		var count01 = v1.split(".").length - 1;
		var count02 = v2.split(".").length - 1;

		// Remove the dots from the value (keep just the decimal point)
		for ( var i = 0; i < (count01 - 1); i++ )
			v1 = v1.replace(".", "");

		for ( var i = 0; i < (count02 - 1); i++ )
			v2 = v2.replace(".", "");

		// SUM OPERATION
		if ( operator_ == "+" )
			value = (parseFloat(v1) + parseFloat(v2)).toFixed(2);
		// SUBTRACTION OPERATION
		else if ( operator_ == "-" )
			value = (parseFloat(v1) - parseFloat(v2)).toFixed(2);
		// MULTIPLICATION OPERATION
		else if ( operator_ == "*" )
			value = (parseFloat(v1) * parseFloat(v2)).toFixed(2);
		// DIVISION OPERATION
		else if ( operator_ == "/" )
			value = (parseFloat(v1) / parseFloat(v2)).toFixed(2);

		// Format in Brazilian real standards
		return value;
	}

	//!*****************************************************************************
	//! UTILS
	//!*****************************************************************************

	/** Function to generate binary value according to checkbox
	 * @param chk_ => group of checkboxes to be evaluated
	*/
	function checkToBinary( chk_ )
	{
		var checks = document.getElementsByName(chk_);
		var result = "";

		for ( var i = 0; i < checks.length; i++ )
		{
			if ( checks[i].checked == true )
				result += 1;
			else
				result += 0;
		}
		return result;
	}

	/** Function to get the parent element
	 * @param obj_ => the reference element
	 * @param tagName_ => the type of element to be searched
	*/
	function getParentByTagName( obj_, tagName_ )
	{
		tagName_ = tagName_.toLowerCase();

		while ( obj_ != null && obj_.tagName != null && obj_.tagName.toLowerCase() != tagName_ )
		{
			obj_ = obj_.parentNode;
		}

		return obj_;
	}

	/** Function to replace all of ocurrences in a string
	 * @param search => the substring to be searched
	 * @param replacement => the replacement to the substring
	*/
	String.prototype.replaceAll = function(search, replacement) {
		var target = this;
		return target.split(search).join(replacement);
	};

	//!*****************************************************************************
	//! SERVER-SIDE
	//!*****************************************************************************

	/** Function to handle the server response
	 * @param response_ => object containing the server response
	 * @param info_breaker_ => string to break the information from trash in server response
	 * @param elem_ => element to be modified
	 * @param action_ => action to be tacked accordling to the server returning
	*/
	function readServerResponse( response_, info_breaker_, elem_, action_ )
	{
		//! Variable to receive the result
		var data;
		var result;

		//! HTTP.RESPONSETEXT
		if ( !response_.responseType || response_.responseType === "text" )
			data = response_.responseText;
		//! HTTP.RESPONSEXML
		else if ( response_.responseType === "document" )
			data = response_.responseXML;
		//! HTTP.RESPONSE
		else
			data = response_.response;

		//! Remove the uncessary info from result
		result = data.split(info_breaker_);
		data = result[(result.length - 1)]; // the information will be in the last position

		//! Check the possible actions
		if ( action_ == "fill select" )
		{
			elem_.innerHTML = data;
		}
	}

	/** Function to generic send requests to the server
	 * @param url_ => the url to access the server-side function
	 * @param param_ => the params itself
	 * @param method_ => "POST" / "GET"
	 * @param info_breaker_ => string to break the information from trash in server response
	 * @param elem_ => element to be modified
	 * @param action_ => action to be tacked accordling to the server returning
	*/
	function sendRequest( url_, param_, method_, info_breaker_, elem_, action_ )
	{
		var http = new XMLHttpRequest();
		var url = url_;
		var params = param_;
		http.open(method_, url, true);

		//! Send the proper header information along with the request
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		//! Call a function when the state changes.
		http.onreadystatechange = function()
		{
			//! The application could reach the server an retrieve the informations
			if ( http.readyState == 4 && http.status == 200 )
			{
				try
				{
					if ( http != undefined )
					{
						//! Call a function to handle the return
						console.log(readServerResponse(http, info_breaker_, elem_, action_));
					}
				} 
				catch (e) {
					// Browser is IE6 or 7
				}
			}
		}

		http.send(params);
	}