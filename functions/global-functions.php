<?php

	//**********************************************************************************
		//**********  IGOR A. BRANDÃO 2020 - 2021 ©
		//**********
		//**********  PGM: PHP GENERAL FUNCTIONS CLASS
		//**********
		//**********  PROJECT:	KEGG NETWORK VIEWER
		//**********
		//**********  IGOR AUGUSTO BRANDÃO
		//**********  VERSÃO:	1.0
		//**********  VERSÃO:	1.2
		//**********
		//**********  ABR/2020 - Creation
		//**********  MAR/2021 - Update
		//**********
	//**********************************************************************************

	//********************************** CONSTANTS *********************************
	define("EPSILON", 0.000000001);
	//******************************************************************************

	//!*****************************************************************************
	// GENERAL FUNCTIONS
	//!*****************************************************************************

	/**
	 * Function to validate values
	 * @value => the value to be tested
	*/
	function iif ( $value )
	{
		// Check if the key exists inside the array
		if ( isset( $value ) && strcmp($value, "") != 0 ) 
		{
			// Return the value
			return $value;
		}

		// Return empty for default
		return "";
	} // iif

	/**
	 * Validate array's key
	 *
	 * Check if the key exists inside the array and if it's different from null.
	 *
	 * @param array  $array The array
	 * @param string $key   The array's key
	 * @return string|null  The key's value or null
	*/
	function chk_array($array, $key)
	{
		// Check if the key exists inside the array
		if ( isset( $array[ $key ] ) && ! empty( $array[ $key ] ) ) 
		{
			// Return the key's value
			return $array[ $key ];
		}

		// Return null for default
		return null;
	} // chk_array

	/**
	 * Function to load automatically all standard classes
	 * @class_name => the filename should be class-ClassName.php.
	*/
	spl_autoload_register(function($class_name) {
		$file = ABSPATH . '/classes/class-' . $class_name . '.php';

		if (!file_exists($file)) 
		{
			//require_once ABSPATH . '/includes/404.php';
			return;
		}

		// Include class file
		require_once $file;
	}); // spl_autoload_register

	/**
	 * Function to return the file extension
	 * @filename_ => the filename
	*/
	function file_ext( $filename_ ) 
	{
		return pathinfo( $filename_, PATHINFO_EXTENSION );
	} // file_ext

	/**
	 * Function to return the file basename
	 * @filename_ => the filename
	*/
	function file_basename($filename_) 
	{
		$basename = basename( $filename_, file_ext( $filename_ ) );
		return substr( $basename, 0, (strlen($basename) - 1) );
	} // file_basename

	//!*****************************************************************************
	// NETWORK FUNCTIONS
	//!*****************************************************************************

	/**
	 * Function to return automatically the client ip
	*/
	function get_client_ip() 
	{
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	} // get_client_ip

	//!*****************************************************************************
	// INFORMATION SECURITY MANAGEMENT FUNCTIONS
	//!*****************************************************************************

	/**
	 * Function generate a hash pattern of encryption
	 * @password => the password to be encrypted.
	*/
	function hashSSHA( $password ) 
	{
		$key = sha1(rand());
		$key = substr($key, 0, 10);
		$encrypted = base64_encode(sha1($password . $key, true) . $key);
		$hash = array("salt" => $key, "encrypted" => $encrypted);

		// Return the encryption
		return $hash;
	}

	/**
     * Decrypting password
     * @param salt, password
     * returns hash string
    */
    function checkhashSSHA( $salt, $password )
    {
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
        return $hash;
    }

	/**
	 * Function generate an encrypted URI
	 * @value_ => the password to be encrypted
	 * @path_ => the final URI
	*/
	function encrypted_url( $value_, $path_ )
	{
		// Define variable related to encrypted content
		$hash = hashSSHA($value_);	// HASH
		$encrypted_id = $hash["encrypted"]; // Encrypted ID
		$key = $hash["salt"]; 				// KEY
		$qtd_char = strlen($value_);		// LENGTH

		//**********************************************
		// Generate a random array without repetitions
		$posics = range(0, 9);
		shuffle( $posics );

		for ( $z = 0; $z <= $qtd_char; $z++ )
			$randomico[$z] = array_shift( $posics );
		//**********************************************

		// Update the encrypted string
		for ( $z = 0; $z < $qtd_char; $z++ )
			$encrypted_id{$randomico[$z]} = (string)$value_[$z];

		// PATH's value
		$path = $path_ . $encrypted_id . "//" . $key . "**" . $qtd_char;

		// Add positions
		for ( $z = 0; $z < $qtd_char; $z++ )
			 $path = $path . $randomico[$z];

		// Function's return
		return $path;
	}

	/**
	 * Function to decrypt an encrypted URI
	 * @param_ => the URI to be decrypted
	 * @pattern_ => the pattern used to encrypt
	*/
	function decrypted_url( $param_, $pattern_ )
	{
		try
		{
			// Define the URI length
			$url = explode($pattern_, $param_);
			$qtd_char = substr($url[1], 0, 1);
			$retorno = "";

			// Get the necessary information
			for ( $i = 1; $i <= $qtd_char; $i++ )
			{
				$posic = substr($url[1], $i, 1);
				$retorno = $retorno . substr($url[0], $posic, 1);
			}

			// Return the clean value
			return $retorno;
		}
		catch ( Exception $e )
		{
			return "";
		}
	}

	/**
	 * simple method to encrypt or decrypt a plain text string
	 * initialization vector(IV) has to be the same when encrypting and decrypting
	 * PHP 5.4.9
	 *
	 * this is a beginners template for simple encryption decryption
	 * before using this in production environments, please read about encryption
	 *
	 * @param string $action: can be 'encrypt' or 'decrypt'
	 * @param string $string: string to encrypt or decrypt
	 *
	 * @return string
	*/
	function encrypt_decrypt($action, $string)
	{
		$output = false;

		$encrypt_method = "AES-256-CBC";
		$secret_key = 'This is my secret key';
		$secret_iv = 'This is my secret iv';

		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		}
		else if( $action == 'decrypt' ){
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}

		return $output;
	}

	// Generates a strong password of N length containing at least one lower case letter,
	// one uppercase letter, one digit, and one special character. The remaining characters
	// in the password are chosen at random from those four sets.
	//
	// The available characters in each set are user friendly - there are no ambiguous
	// characters such as i, l, 1, o, 0, etc. This, coupled with the $add_dashes option,
	// makes it much easier for users to manually type or speak their passwords.
	//
	// Note: the $add_dashes option will increase the length of the password by
	// floor(sqrt(N)) characters.
	function generateStrongPassword( $length = 9, $add_dashes = false, $available_sets = 'luds' )
	{
		$sets = array();
		if(strpos($available_sets, 'l') !== false)
			$sets[] = 'abcdefghjkmnpqrstuvwxyz';
		if(strpos($available_sets, 'u') !== false)
			$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
		if(strpos($available_sets, 'd') !== false)
			$sets[] = '23456789';
		if(strpos($available_sets, 's') !== false)
			$sets[] = '!@#$%&*?';
		$all = '';
		$password = '';
		foreach($sets as $set)
		{
			$password .= $set[array_rand(str_split($set))];
			$all .= $set;
		}
		$all = str_split($all);
		for($i = 0; $i < $length - count($sets); $i++)
			$password .= $all[array_rand($all)];
		$password = str_shuffle($password);
		if(!$add_dashes)
			return $password;
		$dash_len = floor(sqrt($length));
		$dash_str = '';
		while(strlen($password) > $dash_len)
		{
			$dash_str .= substr($password, 0, $dash_len) . '-';
			$password = substr($password, $dash_len);
		}
		$dash_str .= $password;
		return $dash_str;
	}

	/** 
	 * Function to handle malicious input
	 * @sql => sql to be used
	*/
	function anti_injection( $sql )
	{
		// remove palavras que contenham sintaxe sql
		$sql = preg_replace(my_sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$sql);
		$sql = trim($sql);//limpa espaços vazio
		$sql = strip_tags($sql);//tira tags html e php
		$sql = addslashes($sql);//Adiciona barras invertidas a uma string
		return $sql;
	}

	/** 
	 * Function to start the user session
	 * @id_user => user ID
	 * @user_info => user information
	 * @session_name => session name
	*/
	function start_session($id_user, $user_info, $session_name)
	{
		// Iniciando a sessão
		session_start();

		// Verificando se a sessão já existe
		if(!isset($_SESSION["$session_name"]))
		{
			$_SESSION["$session_name"] = $user_info;
		}
	}

	/** 
	 * Function to destroy the user session
	 * @id_user => user ID
	 * @session_name => session name
	*/
	function destroy_session($id_user, $session_name)
	{	
		// Iniciando a sessão
		session_start();

		// Verificando se a sessão já existe
		if(isset($_SESSION[$session_name]))
		{
			unset($_SESSION[$session_name]);
		}
	}

	/** 
	 * Function to create a user cookie
	 * @id_user => user ID
	 * @cookie_name => cookie name
	*/
	function create_cookie( $id_user, $cookie_name )
	{
		// Verificando se a sessão já existe
		if ( isset($_COOKIE["$cookie_name"]) )
		{
			setcookie($cookie_name, "", time()-10, "/");
		}

		setcookie($cookie_name, $id_user, 0, '/');
	}

	/** 
	 * Function to destroy a user cookie
	 * @cookie_name => session name
	*/
	function destroy_cookie( $cookie_name )
	{
		// Verificando se a sessão já existe
		if ( isset($_COOKIE[$cookie_name]) )
		{
			setcookie($cookie_name, "", time()-10, "/");
		}
	}

	//!*****************************************************************************
	// PDF HANDLER FUNCTIONS
	//!*****************************************************************************

	/**
	 * Function to count a PDF's number of pages
	 * @file => the file to be read
	*/
	function count_pages_pdf( $file )
	{
		$pdftext = file_get_contents($file);
		$num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
		return $num;
	}

	//!*****************************************************************************
	// STRING MANIPULATION FUNCTIONS
	//!*****************************************************************************

	function delete_all_between($beginning, $end, $string) {
		$beginningPos = strpos($string, $beginning);
		$endPos = strpos($string, $end);
		if ($beginningPos === false || $endPos === false) {
		return $string;
		}

		$textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

		return delete_all_between($beginning, $end, str_replace($textToDelete, '', $string)); // recursion to ensure all occurrences are replaced
	}

	function my_sql_regcase( $str )
	{
	    $res = "";
	    $chars = str_split($str);

	    foreach( $chars as $char )
	    {
	        if ( preg_match("/[A-Za-z]/", $char) )
	            $res .= "[".mb_strtoupper($char, 'UTF-8').mb_strtolower($char, 'UTF-8')."]";
	        else
	            $res .= $char;
	    }

	    return $res;
	}

	/**
	 * Simulate the function in_array in a multidimensional array
	 * @needle 		=> the info to be searched
	 * @haystack 	=> the array where the info should be contained
	 * @strict 		=> this parameter define if the value should exaclty equal
	*/
	function in_array_r( $needle, $haystack, $strict = true )
	{
		foreach ( $haystack as $item )
		{
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict)))
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Apply generically mask to values
	 * @mask => the file to be read
	 * @string => the file to be read
	*/
	function mask_string( $mask, $string )
	{
	   $string = str_replace(" ", "", $string);
	   for( $i = 0; $i < strlen($string); $i++ )
	   {
		  $mask[strpos($mask,"#")] = $string[$i];
	   }
	   return $mask;
	}

	/**
	 * Function to remove all accents variations
	 * @str => the string to be changed
	*/
	function remove_accent( $str )
	{
		$unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
							'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
							'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
							'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
							'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
		$str = strtr( $str, $unwanted_array );
		return $str;
	}

	/**
	 * Replace the last occurrence of a string
	 * @search => the term to be searched
	 * @replace => the term that replaces the search
	 * @str => the string itself
	*/
	function str_replace_last( $search , $replace , $str )
	{
		if ( ( $pos = strrpos( $str , $search ) ) !== false )
		{
			$search_length  = strlen( $search );
			$str    = substr_replace( $str , $replace , $pos , $search_length );
		}
		return $str;
	}

	/**
	 * Remove all alphanumeric characters in a string with numbers
	 * @value => the value to be converted
	*/
	function v_num( $value )
	{
	   	$value = preg_replace(
			array(
				'/[^\d,]/',    // Matches anything that's not a comma or number.
				'/(?<=,),+/',  // Matches consecutive commas.
				'/^,+/',       // Matches leading commas.
				'/,+$/'        // Matches trailing commas.
			),
			'',                // Remove all matched substrings.
			$value
		);

	   	return $value;
	}

	/**
	 * Simulate the explode function using an array as a delimiter
	 * @delimiters => array with multiple delimiters
	 * @str => the string to be exploded
	 * @keep_delimiter => true -> keep delimiters, false -> exclude delimiters
	*/
	function multi_explode( $delimiters, $str, $keep_delimiter )
	{
		// Check if it's necessary keep delimiters
		if ( $keep_delimiter == false )
		{
			$ready = str_replace($delimiters, $delimiters[0], $str);
			$result = explode($delimiters[0], $ready);
		}
		else
		{
			// Generate a preg with multiple delimiters
			$preg_delimiter = '/(';
			for ( $i = 0; $i < sizeof($delimiters); $i++ )
			{
				$preg_delimiter .= $delimiters[$i] . '|';
			}
			$preg_delimiter = substr($preg_delimiter, 0, (strlen($preg_delimiter) - 1)) . ')/';

			// Delimite the string
			$result = preg_split($preg_delimiter, $str, -1, PREG_SPLIT_DELIM_CAPTURE);
		}
		return $result;
	}

	function multi_explode_keep_delimiter( $str )
	{
		$arr = preg_split("/(Dados GPRS|Navegação Web|Torpedo|Interatividade Globo)/", $str, -1, PREG_SPLIT_DELIM_CAPTURE);
		return $arr;
	}

	/**
	 * Function to perform an strpos function with an array as a parameter
	 *
	 * @haystack => block of content
	 * @needle 	 => the array containing the strings to be tested
	*/
	function strposArray( $haystack, $needle, $offset = 0 )
	{
		//! Check if the needle is an array
    	if ( !is_array($needle) )
    	{
    		$needle = array($needle);
    	}

    	//! Run trough all needle itens to test with it exists
    	foreach ( $needle as $query )
    	{
        	if ( strpos($haystack, $query, $offset) !== false )
        		return true; // stop on first true result
    	}

    	return false;
	}

	/**
	 * Function to replace the nth occurrence in a string
	 * @search => the term to be replaced
	 * @replace => the term that'll replace
	 * @subject => true -> the string itself
	 * @nth => true -> the occurrence to be replaced
	*/
	function str_replace_nth ( $search, $replace, $subject, $nth )
	{
		$found = preg_match_all('/'.preg_quote($search).'/', $subject, $matches, PREG_OFFSET_CAPTURE);
		if ( false !== $found && $found > $nth )
		{
			return substr_replace($subject, $replace, $matches[0][$nth][1], strlen($search));
		}
		return $subject;
	}

	/**
	 * Function to reverse the word position in a sentence
	 * @str_ => string to be reversed
	*/
	function reverse_sentence ( $str_ )
	{
		//! Reverse the sentence
		$aux_str = preg_split('/\s+/', rtrim(ltrim($str_)));

		$final_str = "";
		for ( $i = sizeof($aux_str) - 1; $i >= 0; $i-- )
			$final_str .= trim($aux_str[$i]) . " ";

		return $final_str;
	}

	/**
	 * Function to explode just the last occurence from a string
	 * @str_ => string to be exploded
	 * @delimiter_ => the pattern to explode the string
	 * @regex_ => true: uses preg split / false: uses explode
	*/
	function explode_last_occurrence ( $delimiter_, $str_, $regex_ )
	{
		//! Auxiliary variables
		$begin = "";
		$end = "";

		//! Split the string
		if ( $regex_ == false )
		{
			//! Without regex
			$explode = explode($delimiter_, $str_);
		}
		else
		{
			//! With regex
			$explode = preg_split($delimiter_, $str_);
			preg_match_all($delimiter_, $str_, $match_values);
		}

		if ( count($explode) > 0 )
		{
			//! Removes the last element, and returns it
			$end = array_pop($explode);

			//! Glue the remaining pieces back together
			if ( count($explode) > 0 )
			{
				if ( $regex_ == false )
					$begin = implode($delimiter_, $explode);
				else
				{
					//! Run through regex array result and glue all dynamic delimiters
					for ( $i = 0; $i < sizeof($match_values[0]); $i++ )
					{
						$begin .= $explode[$i] . " " . $match_values[0][$i];
					}
				}
			}
		}

		return $begin;
	}

	/**
	 * Function that replaces html entities with ascii near-equivalents
	 * @text => the float point value to be compared
	*/
	function asciify( $text ) 
	{
		$entities = array();
		$ascii = array();

		// 32 through 127 correspond to ascii letters
		for ($i = 32; $i < 127; $i++)
		{
			$entities[] = "&#$i;";
			$ascii[] = chr($i);
		}

		// 32 through 99 have alternates with padding
		for ($i = 32; $i < 100; $i++)
		{
			$entities[] = "&#0$i;";
			$ascii[] = chr($i);
		}

		$entities[] = "&#160;"; $ascii[] = ' '; # non-breaking space
		$entities[] = "&#161;"; $ascii[] = '!'; # inverted exclamation mark
		$entities[] = "&#162;"; $ascii[] = 'cents'; # cent sign
		$entities[] = "&#163;"; $ascii[] = 'pounds'; # pound sign
		$entities[] = "&#164;"; $ascii[] = '$'; # currency sign
		$entities[] = "&#165;"; $ascii[] = 'yen'; # yen sign
		$entities[] = "&#166;"; $ascii[] = '|'; # broken vertical bar
		$entities[] = "&#167;"; $ascii[] = 'Ss'; # section sign
		$entities[] = "&#168;"; $ascii[] = '``'; # spacing diaeresis - umlaut
		$entities[] = "&#169;"; $ascii[] = '(c)'; # copyright sign
		$entities[] = "&#170;"; $ascii[] = 'a'; # feminine ordinal indicator
		$entities[] = "&#171;"; $ascii[] = '<<'; # left double angle quotes
		$entities[] = "&#172;"; $ascii[] = '~'; # not sign
		$entities[] = "&#173;"; $ascii[] = '-'; # soft hyphen
		$entities[] = "&#174;"; $ascii[] = '(r)'; # registered trade mark sign
		$entities[] = "&#175;"; $ascii[] = '-'; # spacing macron - overline
		$entities[] = "&nbsp;"; $ascii[] = ' '; # non-breaking space
		$entities[] = "&iexcl;"; $ascii[] = '!'; # inverted exclamation mark
		$entities[] = "&cent;"; $ascii[] = 'cents'; # cent sign
		$entities[] = "&pound;"; $ascii[] = 'pounds'; # pound sign
		$entities[] = "&curren;"; $ascii[] = '$'; # currency sign
		$entities[] = "&yen;"; $ascii[] = 'yen'; # yen sign
		$entities[] = "&brvbar;"; $ascii[] = '|'; # broken vertical bar
		$entities[] = "&sect;"; $ascii[] = 'Ss'; # section sign
		$entities[] = "&uml;"; $ascii[] = '``'; # spacing diaeresis - umlaut
		$entities[] = "&copy;"; $ascii[] = '(c)'; # copyright sign
		$entities[] = "&ordf;"; $ascii[] = 'a'; # feminine ordinal indicator
		$entities[] = "&laquo;"; $ascii[] = '<<'; # left double angle quotes
		$entities[] = "&not;"; $ascii[] = '~'; # not sign
		$entities[] = "&shy;"; $ascii[] = '-'; # soft hyphen
		$entities[] = "&reg;"; $ascii[] = '(r)'; # registered trade mark sign
		$entities[] = "&macr;"; $ascii[] = '-'; # spacing macron - overline
		$entities[] = "&#176;"; $ascii[] = 'deg'; # degree sign
		$entities[] = "&#177;"; $ascii[] = '+/-'; # plus-or-minus sign
		$entities[] = "&#178;"; $ascii[] = '^2'; # superscript two - squared
		$entities[] = "&#179;"; $ascii[] = '^3'; # superscript three - cubed
		$entities[] = "&#180;"; $ascii[] = '\''; # acute accent - spacing acute
		$entities[] = "&#181;"; $ascii[] = 'u'; # micro sign
		$entities[] = "&#182;"; $ascii[] = 'par'; # pilcrow sign - paragraph sign
		$entities[] = "&#183;"; $ascii[] = '.'; # middle dot - Georgian comma
		$entities[] = "&#184;"; $ascii[] = ','; # spacing cedilla
		$entities[] = "&#185;"; $ascii[] = '^1'; # superscript one
		$entities[] = "&#186;"; $ascii[] = '^o'; # masculine ordinal indicator
		$entities[] = "&#187;"; $ascii[] = '>>'; # right double angle quotes
		$entities[] = "&#188;"; $ascii[] = '1/4'; # fraction one quarter
		$entities[] = "&#189;"; $ascii[] = '1/2'; # fraction one half
		$entities[] = "&#190;"; $ascii[] = '3/4'; # fraction three quarters
		$entities[] = "&#191;"; $ascii[] = '?'; # inverted question mark
		$entities[] = "&deg;";    $ascii[] = 'deg'; # degree sign
		$entities[] = "&plusmn;"; $ascii[] = '+/-'; # plus-or-minus sign
		$entities[] = "&sup2;";   $ascii[] = '^2';  # superscript two - squared
		$entities[] = "&sup3;";   $ascii[] = '^3';  # superscript three - cubed
		$entities[] = "&acute;";  $ascii[] = '\'';  # acute accent - spacing acute
		$entities[] = "&micro;";  $ascii[] = 'u'; # micro sign
		$entities[] = "&para;";   $ascii[] = 'par'; # pilcrow sign - paragraph sign
		$entities[] = "&middot;"; $ascii[] = '.'; # middle dot - Georgian comma
		$entities[] = "&cedil;";  $ascii[] = ','; # spacing cedilla
		$entities[] = "&sup1;";   $ascii[] = '^1';  # superscript one
		$entities[] = "&ordm;";   $ascii[] = '^o';  # masculine ordinal indicator
		$entities[] = "&raquo;";  $ascii[] = '>>';  # right double angle quotes
		$entities[] = "&frac14;"; $ascii[] = '1/4'; # fraction one quarter
		$entities[] = "&frac12;"; $ascii[] = '1/2'; # fraction one half
		$entities[] = "&frac34;"; $ascii[] = '3/4'; # fraction three quarters
		$entities[] = "&iquest;"; $ascii[] = '?'; # inverted question mark
		$entities[] = "&#192;"; $ascii[] = 'A'; # latin capital letter A with grave
		$entities[] = "&#193;"; $ascii[] = 'A'; # latin capital letter A with acute
		$entities[] = "&#194;"; $ascii[] = 'A'; # latin capital letter A with circumflex
		$entities[] = "&#195;"; $ascii[] = 'A'; # latin capital letter A with tilde
		$entities[] = "&#196;"; $ascii[] = 'A'; # latin capital letter A with diaeresis
		$entities[] = "&#197;"; $ascii[] = 'A'; # latin capital letter A with ring above
		$entities[] = "&#198;"; $ascii[] = 'AE'; # latin capital letter AE
		$entities[] = "&#199;"; $ascii[] = 'C'; # latin capital letter C with cedilla
		$entities[] = "&#200;"; $ascii[] = 'E'; # latin capital letter E with grave
		$entities[] = "&#201;"; $ascii[] = 'E'; # latin capital letter E with acute
		$entities[] = "&#202;"; $ascii[] = 'E'; # latin capital letter E with circumflex
		$entities[] = "&#203;"; $ascii[] = 'E'; # latin capital letter E with diaeresis
		$entities[] = "&#204;"; $ascii[] = 'I'; # latin capital letter I with grave
		$entities[] = "&#205;"; $ascii[] = 'I'; # latin capital letter I with acute
		$entities[] = "&#206;"; $ascii[] = 'I'; # latin capital letter I with circumflex
		$entities[] = "&#207;"; $ascii[] = 'I'; # latin capital letter I with diaeresis
		$entities[] = "&Agrave;"; $ascii[] = 'A'; # latin capital letter A with grave
		$entities[] = "&Aacute;"; $ascii[] = 'A'; # latin capital letter A with acute
		$entities[] = "&Acirc;";  $ascii[] = 'A'; # latin capital letter A with circumflex
		$entities[] = "&Atilde;"; $ascii[] = 'A'; # latin capital letter A with tilde
		$entities[] = "&Auml;";   $ascii[] = 'A'; # latin capital letter A with diaeresis
		$entities[] = "&Aring;";  $ascii[] = 'A'; # latin capital letter A with ring above
		$entities[] = "&AElig;";  $ascii[] = 'AE'; # latin capital letter AE
		$entities[] = "&Ccedil;"; $ascii[] = 'C'; # latin capital letter C with cedilla
		$entities[] = "&Egrave;"; $ascii[] = 'E'; # latin capital letter E with grave
		$entities[] = "&Eacute;"; $ascii[] = 'E'; # latin capital letter E with acute
		$entities[] = "&Ecirc;";  $ascii[] = 'E'; # latin capital letter E with circumflex
		$entities[] = "&Euml;";   $ascii[] = 'E'; # latin capital letter E with diaeresis
		$entities[] = "&Igrave;"; $ascii[] = 'I'; # latin capital letter I with grave
		$entities[] = "&Iacute;"; $ascii[] = 'I'; # latin capital letter I with acute
		$entities[] = "&Icirc;";  $ascii[] = 'I'; # latin capital letter I with circumflex
		$entities[] = "&Iuml;";   $ascii[] = 'I'; # latin capital letter I with diaeresis
		$entities[] = "&#208;"; $ascii[] = 'EDH'; # latin capital letter ETH
		$entities[] = "&#209;"; $ascii[] = 'N'; # latin capital letter N with tilde
		$entities[] = "&#210;"; $ascii[] = 'O'; # latin capital letter O with grave
		$entities[] = "&#211;"; $ascii[] = 'O'; # latin capital letter O with acute
		$entities[] = "&#212;"; $ascii[] = 'O'; # latin capital letter O with circumflex
		$entities[] = "&#213;"; $ascii[] = 'O'; # latin capital letter O with tilde
		$entities[] = "&#214;"; $ascii[] = 'O'; # latin capital letter O with diaeresis
		$entities[] = "&#215;"; $ascii[] = 'x'; # multiplication sign
		$entities[] = "&#216;"; $ascii[] = '0'; # latin capital letter O with slash
		$entities[] = "&#217;"; $ascii[] = 'U'; # latin capital letter U with grave
		$entities[] = "&#218;"; $ascii[] = 'U'; # latin capital letter U with acute
		$entities[] = "&#219;"; $ascii[] = 'U'; # latin capital letter U with circumflex
		$entities[] = "&#220;"; $ascii[] = 'U'; # latin capital letter U with diaeresis
		$entities[] = "&#221;"; $ascii[] = 'Y'; # latin capital letter Y with acute
		$entities[] = "&#222;"; $ascii[] = 'dh'; # latin capital letter THORN
		$entities[] = "&#223;"; $ascii[] = 'th'; # latin small letter sharp s - ess-zed
		$entities[] = "&ETH;";    $ascii[] = 'EDH'; # latin capital letter ETH
		$entities[] = "&Ntilde;"; $ascii[] = 'N';  # latin capital letter N with tilde
		$entities[] = "&Ograve;"; $ascii[] = 'O';  # latin capital letter O with grave
		$entities[] = "&Oacute;"; $ascii[] = 'O';  # latin capital letter O with acute
		$entities[] = "&Ocirc;";  $ascii[] = 'O';  # latin capital letter O with circumflex
		$entities[] = "&Otilde;"; $ascii[] = 'O';  # latin capital letter O with tilde
		$entities[] = "&Ouml;";   $ascii[] = 'O';  # latin capital letter O with diaeresis
		$entities[] = "&times;";  $ascii[] = 'x';  # multiplication sign
		$entities[] = "&Oslash;"; $ascii[] = 'O';  # latin capital letter O with slash
		$entities[] = "&Ugrave;"; $ascii[] = 'U';  # latin capital letter U with grave
		$entities[] = "&Uacute;"; $ascii[] = 'U';  # latin capital letter U with acute
		$entities[] = "&Ucirc;";  $ascii[] = 'U';  # latin capital letter U with circumflex
		$entities[] = "&Uuml;";   $ascii[] = 'U';  # latin capital letter U with diaeresis
		$entities[] = "&Yacute;"; $ascii[] = 'Y';  # latin capital letter Y with acute
		$entities[] = "&THORN;";  $ascii[] = 'dh'; # latin capital letter THORN
		$entities[] = "&szlig;";  $ascii[] = 'th'; # latin small letter sharp s - ess-zed
		$entities[] = "&#224;"; $ascii[] = 'a'; # latin small letter a with grave
		$entities[] = "&#225;"; $ascii[] = 'a'; # latin small letter a with acute
		$entities[] = "&#226;"; $ascii[] = 'a'; # latin small letter a with circumflex
		$entities[] = "&#227;"; $ascii[] = 'a'; # latin small letter a with tilde
		$entities[] = "&#228;"; $ascii[] = 'a'; # latin small letter a with diaeresis
		$entities[] = "&#229;"; $ascii[] = 'a'; # latin small letter a with ring above
		$entities[] = "&#230;"; $ascii[] = 'ae'; # latin small letter ae
		$entities[] = "&#231;"; $ascii[] = 'c'; # latin small letter c with cedilla
		$entities[] = "&#232;"; $ascii[] = 'e'; # latin small letter e with grave
		$entities[] = "&#233;"; $ascii[] = 'e'; # latin small letter e with acute
		$entities[] = "&#234;"; $ascii[] = 'e'; # latin small letter e with circumflex
		$entities[] = "&#235;"; $ascii[] = 'e'; # latin small letter e with diaeresis
		$entities[] = "&#236;"; $ascii[] = 'i'; # latin small letter i with grave
		$entities[] = "&#237;"; $ascii[] = 'i'; # latin small letter i with acute
		$entities[] = "&#238;"; $ascii[] = 'i'; # latin small letter i with circumflex
		$entities[] = "&#239;"; $ascii[] = 'i'; # latin small letter i with diaeresis
		$entities[] = "&agrave;"; $ascii[] = 'a';  # latin small letter a with grave
		$entities[] = "&aacute;"; $ascii[] = 'a';  # latin small letter a with acute
		$entities[] = "&acirc;";  $ascii[] = 'a';  # latin small letter a with circumflex
		$entities[] = "&atilde;"; $ascii[] = 'a';  # latin small letter a with tilde
		$entities[] = "&auml;";   $ascii[] = 'a';  # latin small letter a with diaeresis
		$entities[] = "&aring;";  $ascii[] = 'a';  # latin small letter a with ring above
		$entities[] = "&aelig;";  $ascii[] = 'ae'; # latin small letter ae
		$entities[] = "&ccedil;"; $ascii[] = 'c';  # latin small letter c with cedilla
		$entities[] = "&egrave;"; $ascii[] = 'e';  # latin small letter e with grave
		$entities[] = "&eacute;"; $ascii[] = 'e';  # latin small letter e with acute
		$entities[] = "&ecirc;";  $ascii[] = 'e';  # latin small letter e with circumflex
		$entities[] = "&euml;";   $ascii[] = 'e';  # latin small letter e with diaeresis
		$entities[] = "&igrave;"; $ascii[] = 'i';  # latin small letter i with grave
		$entities[] = "&iacute;"; $ascii[] = 'i';  # latin small letter i with acute
		$entities[] = "&icirc;";  $ascii[] = 'i';  # latin small letter i with circumflex
		$entities[] = "&iuml;";   $ascii[] = 'i';  # latin small letter i with diaeresis
		$entities[] = "&#240;"; $ascii[] = 'edh'; # latin small letter eth
		$entities[] = "&#241;"; $ascii[] = 'n'; # latin small letter n with tilde
		$entities[] = "&#242;"; $ascii[] = 'o'; # latin small letter o with grave
		$entities[] = "&#243;"; $ascii[] = 'o'; # latin small letter o with acute
		$entities[] = "&#244;"; $ascii[] = 'o'; # latin small letter o with circumflex
		$entities[] = "&#245;"; $ascii[] = 'o'; # latin small letter o with tilde
		$entities[] = "&#246;"; $ascii[] = 'o'; # latin small letter o with diaeresis
		$entities[] = "&#247;"; $ascii[] = '/'; # division sign
		$entities[] = "&#248;"; $ascii[] = 'o'; # latin small letter o with slash
		$entities[] = "&#249;"; $ascii[] = 'u'; # latin small letter u with grave
		$entities[] = "&#250;"; $ascii[] = 'u'; # latin small letter u with acute
		$entities[] = "&#251;"; $ascii[] = 'u'; # latin small letter u with circumflex
		$entities[] = "&#252;"; $ascii[] = 'u'; # latin small letter u with diaeresis
		$entities[] = "&#253;"; $ascii[] = 'y'; # latin small letter y with acute
		$entities[] = "&#254;"; $ascii[] = 'th'; # latin small letter thorn
		$entities[] = "&#255;"; $ascii[] = 'y'; # latin small letter y with diaeresis
		$entities[] = "&eth;";    $ascii[] = 'edh'; # latin small letter eth
		$entities[] = "&ntilde;"; $ascii[] = 'n';  # latin small letter n with tilde
		$entities[] = "&ograve;"; $ascii[] = 'o';  # latin small letter o with grave
		$entities[] = "&oacute;"; $ascii[] = 'o';  # latin small letter o with acute
		$entities[] = "&ocirc;";  $ascii[] = 'o';  # latin small letter o with circumflex
		$entities[] = "&otilde;"; $ascii[] = 'o';  # latin small letter o with tilde
		$entities[] = "&ouml;";   $ascii[] = 'o';  # latin small letter o with diaeresis
		$entities[] = "&divide;"; $ascii[] = '/';  # division sign
		$entities[] = "&oslash;"; $ascii[] = 'o';  # latin small letter o with slash
		$entities[] = "&ugrave;"; $ascii[] = 'u';  # latin small letter u with grave
		$entities[] = "&uacute;"; $ascii[] = 'u';  # latin small letter u with acute
		$entities[] = "&ucirc;";  $ascii[] = 'u';  # latin small letter u with circumflex
		$entities[] = "&uuml;";   $ascii[] = 'u';  # latin small letter u with diaeresis
		$entities[] = "&yacute;"; $ascii[] = 'y';  # latin small letter y with acute
		$entities[] = "&thorn;";  $ascii[] = 'th'; # latin small letter thorn
		$entities[] = "&yuml;";   $ascii[] = 'y';  # latin small letter y with diaeresis
		$entities[] = "&#338;"; $ascii[] = 'OE'; # latin capital letter OE
		$entities[] = "&#339;"; $ascii[] = 'oe'; # latin small letter oe
		$entities[] = "&#352;"; $ascii[] = 'S'; # latin capital letter S with caron
		$entities[] = "&#353;"; $ascii[] = 's'; # latin small letter s with caron
		$entities[] = "&#376;"; $ascii[] = 'U'; # latin capital letter Y with diaeresis
		$entities[] = "&#402;"; $ascii[] = 'f'; # latin small f with hook - function

		// Higher Punctuation
		$entities[] = "&#8194;"; $ascii[] = ' '; # en space
		$entities[] = "&#8195;"; $ascii[] = ' '; # em space
		$entities[] = "&#8201;"; $ascii[] = ' '; # thin space
		$entities[] = "&#8204;"; $ascii[] = ''; # zero width non-joiner,
		$entities[] = "&#8205;"; $ascii[] = ''; # zero width joiner
		$entities[] = "&#8206;"; $ascii[] = ''; # left-to-right mark
		$entities[] = "&#8207;"; $ascii[] = ''; # right-to-left mark
		$entities[] = "&#8211;"; $ascii[] = '-'; # en dash
		$entities[] = "&#8212;"; $ascii[] = '--'; # em dash
		$entities[] = "&#8216;"; $ascii[] = '\''; # left single quotation mark,
		$entities[] = "&#8217;"; $ascii[] = '\''; # right single quotation mark,
		$entities[] = "&#8218;"; $ascii[] = '"'; # single low-9 quotation mark
		$entities[] = "&#8220;"; $ascii[] = '"'; # left double quotation mark,
		$entities[] = "&#8221;"; $ascii[] = '"'; # right double quotation mark,
		$entities[] = "&#8222;"; $ascii[] = ',,'; # double low-9 quotation mark
		$entities[] = "&#8224;"; $ascii[] = '*'; # dagger
		$entities[] = "&#8225;"; $ascii[] = '**'; # double dagger
		$entities[] = "&#8226;"; $ascii[] = '*'; # bullet
		$entities[] = "&#8230;"; $ascii[] = '...'; # horizontal ellipsis
		$entities[] = "&#8240;"; $ascii[] = '0/00'; # per mille sign
		$entities[] = "&#8249;"; $ascii[] = '<'; # single left-pointing angle quotation mark,
		$entities[] = "&#8250;"; $ascii[] = '>'; # single right-pointing angle quotation mark,
		$entities[] = "&#8364;"; $ascii[] = 'euro'; # euro sign
		$entities[] = "&euro;";  $ascii[] = 'euro'; # euro sign
		$entities[] = "&#8482;"; $ascii[] = '(TM)'; # trade mark sign

		$entities[] = "&amp;"; $ascii[] = '&'; # ampersand

		$output = str_replace($entities, $ascii, $text);

		// For CDATA: Remove any instances of ]]> that may have accidentally been created.
		// $output = str_replace(']]>', '', $output);

		return $output;
	}

	//!*****************************************************************************
	// MATH MANIPULATION FUNCTIONS
	//!*****************************************************************************

	/**
	 * Compare a float point number with another or an integer
	 * @value1 => the float point value to be compared
	 * @value1 => could be a float pointer or an integer
	*/
	function compare_float( $value1, $value2 )
	{
		// Converts currency to decimal point
		$value1 = str_replace(",", ".", $value1);
		$value2 = str_replace(",", ".", $value2);

		if ( abs(($value1 - $value2)) < EPSILON )
			return true;
		else
			return false;
	}

	/**
	 * Drop the decimal places without rounding
	 * @value1 => the float point value to be changed
	*/
	function format_number_precision( $value1 )
	{
		$str = number_format($value1, 4, '.', '');
		return preg_replace('/(?<=\d{2})0+$/', '', $str);
	}

	/**
	 * Drop the decimal places without rounding
	 * @value1 => the float point value to be changed
	*/
	function format_number_brazillian( $value1 )
	{
		return number_format($value1, 2, ',', '.');
	}

	/**
	 * Drop the decimal places without rounding
	 * @value1 => the float point value to be changed
	*/
	function format_number_brazillian_nodecimals( $value1 )
	{
		return number_format($value1, 0, ',', '.');
	}

	//!*****************************************************************************
	// CURRENCY MANIPULATION FUNCTIONS
	//!*****************************************************************************

	/**
	 * Execute operations with generic currencies
	 * @value1_ => first operation value
	 * @value2_ => second operation value
	 * @op_ => the operation itself
	*/
	function currency_operation( $value1_, $value2_, $op_ )
	{
		// Remove the unecessary characters from money
		$value1_ = str_replace (".", "", $value1_);
		$value1_ = str_replace (",", ".", $value1_);

		$value2_ = str_replace (".", "", $value2_);
		$value2_ = str_replace (",", ".", $value2_);

		// Check wich opration will be executes
		if ( $op_ == "+" ) 	//!< SUM
			$result = $value1_ + $value2_;
		else if ( $op_ == "-" ) //!< SUBTRACTION
			$result = $value1_ - $value2_;
		else if ( $op_ == "*" ) //!< MULTIPLICATION
			$result = $value1_ * $value2_;
		else if ( $op_ == "/" ) //!< DIVISION
			$result = $value1_ / $value2_;
		else //!< INVALID
			return 0;

		// Return the result
		return $result;
	}

	/**
	 * Convert a currency to Brazilian real standards 
	 * @value => the value to be converted
	*/
	function real_currency( $value )
	{
		return number_format(floatval($value), 2, ',', '.');
	}

	/**
	 * Convert a currency to American USD standards 
	 * @value => the value to be converted
	*/
	function usd_currency( $value )
	{
		return number_format(floatval($value), 2, '.', ',');
	}

	/**
	 * Sum money in Brazilian real standards 
	 * @value01 => value 01 to be summed
	 * @value02 => value 02 to be summed
	*/
	function real_sum( $value01, $value02 )
	{
		// Change commas per dots
		$v1 = str_replace(',' , '.', $value01);
		$v2 = str_replace(',' , '.', $value02);

		// Sum the values
		$value = $v1 + $v2;

		// Format in Brazilian real standards
		return $value;
	}

	/**
	 * Remove double dots (if it's necessary)
	 * @value01 => value to be adjusted
	*/
	function remove_double_dots( $value_ )
	{
		//! Count the dots
		$value = $value_;
		$dots = substr_count($value, '.');

		if ( $dots > 1 )
			$value = preg_replace('/\./', '', $value, ($dots - 1));

		// Return the value adjusted
		return $value;
	}

	//!*****************************************************************************
	// DATE AND TIME MANIPULATION FUNCTIONS
	//!*****************************************************************************

	/**
	 * Function to handle operations with time in minutes and seconds (mm:ss)
	 * @time01_ => operand 01
	 * @time02_ => operand 02
	 * @op_ 	=> operator
	*/
	function min_sec_operation( $time01_, $time02_, $op_ )
	{
		// Auxiliary variable
		$total = 0;

		// Check the time format
		if ( !strpos($time01_, ":") )
		{
			$time01_ .= ":00";
		}

		// Split the values by :
		$time01_ = explode(':', $time01_);
		$total += $time01_[0] * 60;

		// Sum up the total time in seconds
		if ( isset($time01_[1]) )
			$total += $time01_[1];
		else
			$total = 0;

		// Check the time format
		if ( !strpos($time02_, ":") )
		{
			$time02_ .= ":00";
		}

		// Split the values by :
		$time02_ = explode(':', $time02_);

		// Check the operation
		switch( $op_ )
		{
			case "+":
				$total = $total + ( $time02_[0] * 60); break;
			case "-":
				$total = $total - ( $time02_[0] * 60); break;
			case "*":
				$total = $total * ( $time02_[0] * 60); break;
			case "/":
				$total = $total / ( $time02_[0] * 60); break;
		}

		// Check the operation to perform
		if ( isset($time02_[1]) )
		{
			switch( $op_ )
			{
				case "+":
					$total = ($total + $time02_[1]); break;
				case "-":
					$total = ($total - $time02_[1]); break;
				case "*":
					$total = ($total * $time02_[1]); break;
				case "/":
					//$total = ($total / $time02_[1]); break;
			}
		}

		// Convert to mm:ss
		$mins = $total / 60;
		$secs = abs($total % 60);

		// Change the second format
		if ( $secs < 10 )
			$secs = "0" . $secs;

		// Merge minutes and seconds
		$total = intval($mins) . ':' . $secs;

		// Return the total
		return $total;
	}

	/**
	 * Sum the time in minutes and seconds (mm:ss)
	 * @value01 => value 01 to be summed
	 * @value02 => value 02 to be summed
	*/
	function min_sec_sum( $value01, $value02 )
	{
		// Auxiliary variable
		$total = 0;

		// Split the values by :
		$value01 = explode(':', $value01);
		$total += $value01[0] * 60;
		if ( isset($value01[1]) )
			$total += $value01[1];
		else
			$total = 0;

		// Split the values by :
		$value02 = explode(':', $value02);
		$total += $value02[0] * 60;
		if ( isset($value02[1]) )
			$total += $value02[1];
		else
			$total = 0;

		// Convert to mm:ss
		$mins = $total / 60;
		$secs = $total % 60;

		// Change the second format
		if ( $secs < 10 )
			$secs = "0" . $secs;

		// Return the total
		return intval($mins) . ':' . $secs;
	}

	/**
	 * Sum the time in minutes and seconds (mm:ss)
	 * @array_minutes_ => array with minutes to be summed
	*/
	function min_sec_sum_array( $array_minutes_ )
	{
		// Auxiliary variables
		$aux_duration = 0;
		$aux_duration_value = "";
		$array_length = sizeof($array_minutes_);

		// Check if the array contain values
		if ( $array_length > 0 )
		{
			// Run through the array
			for ( $i = 0; $i < $array_length; $i++ )
			{
				if ( isset($array_minutes_[$i]) && strcmp($array_minutes_[$i], "") != 0 )
				{
					// Set the duration auxiliar variable
					$aux_duration_value = $array_minutes_[$i];

					// Check the time type
					if ( strpos($aux_duration_value, "m") === false )
					{
						// Subtotal duration
						$aux_duration = min_sec_sum($aux_duration, $aux_duration_value);
					}
					else
					{
						// Subtotal duration
						$aux_duration = min_sec_sum($aux_duration, format_min_sec($aux_duration_value));
					}
				}
			}

			// Function return
			return $aux_duration;
		}
	}

	/**
	 * Convert the time (mm:ss) into seconds
	 * @value_ => value to be converted
	*/
	function min_sec_tosec( $value_ )
	{
		// Auxiliary variable
		$total = 0;

		// Check the time format
		if ( !strpos($value_, ":") )
		{
			$value_ .= ":00";
		}

		// Split the values by :
		$value01 = explode(':', $value_);
		$total += $value01[0] * 60;
		if ( isset($value01[1]) )
			$total += $value01[1];
		else
			$total = 0;

		// Return the total
		return intval($total);
	}

	/**
	 * Function that converts XXmYYs to mm:ss
	 * @time_ => value 01 to be formatted
	*/
	function format_min_sec( $time_ )
	{
		// Replace strings
		$time_ = str_replace("m", ":", $time_);
		$time_ = str_replace("s", "", $time_);
		$time_ = trim($time_);

		// Return the total
		return $time_;
	}

	/**
	 * Function that converts mm:ss to XXmYYs
	 * @time_ => value 01 to be formatted
	*/
	function format_mm_ss( $time_ )
	{
		// Format and integer value into a time format
		if ( !strpos($time_, ":") && !strpos($time_, "m") && !strpos($time_, "s") )
		{
			$time_ .= ":00";
		}

		// Test if it's necessary add a zero at the beginning
		$aux = explode("m", $time_);

		// Add zero (when it's required)
		if ( $aux[0] < 10 )
		{
			if ( substr($aux[0], 0, 1) != "0" )
			{
				$time_ = "0" . $time_;
			}
		}

		// Replace strings
		$time_ = str_replace(":", "m", $time_);
		$time_ = trim($time_);
		$time_ .= "s";

		// Return the total
		return $time_;
	}

	/**
	 * Function that converts hh:mm:ss to mm:ss
	 * @value01 => value 01 to be formatted
	*/
	function format_hh_mm_ss( $value01 )
	{
		// Check the string length
		if ( strlen($value01) > 5 )
		{
			// Divide the value in parts
			$aux = explode(":", $value01);

			// Add the equivalent hours to the minutes
			$aux[1] += ($aux[0] * 60);

			// Add zero
			if ( $aux[1] < 10 )
			{
				if ( substr($aux[1], 0, 1) != "0" )
					$aux[1] = "0" . $aux[1];
			}

			// Concatenate the result
			$value01 = $aux[1] . ":" . $aux[2];
		}

		// Return the total
		return $value01;
	}

	/* 
	 * A mathematical decimal difference between two informed dates 
	 *
	 * Author: Sergio Abreu
	 * Website: http://sites.sitesbr.net
	 *
	 * Features: 
	 * Automatic conversion on dates informed as string.
	 * Possibility of absolute values (always +) or relative (-/+)
	*/
	function dateDifference( $str_interval, $dt_menor, $dt_maior, $relative=false )
	{
	   if( is_string( $dt_menor)) $dt_menor = date_create( $dt_menor);
	   if( is_string( $dt_maior)) $dt_maior = date_create( $dt_maior);

		$diff = date_diff( $dt_menor, $dt_maior, ! $relative);

		switch( $str_interval )
		{
			case "y":
				$total = $diff->y + $diff->m / 12 + $diff->d / 365.25; break;
			case "m":
				$total= $diff->y * 12 + $diff->m + $diff->d/30 + $diff->h / 24; break;
			case "d":
				$total = $diff->y * 365.25 + $diff->m * 30 + $diff->d + $diff->h/24 + $diff->i / 60; break;
			case "h":
				$total = ($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h + $diff->i/60; break;
			case "i":
				$total = (($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i + $diff->s/60; break;
			case "s":
				$total = ((($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i)*60 + $diff->s; break;
		}

		if ( $diff->invert )
			return -1 * $total;
		else
			return $total;
	}

	/**
	 * Function to return the previous month (E.g: 07/2016 -> 06/2016 )
	 * @ref_month_ => references's month (format: MM/YYYY)
	*/
	function previousMonth( $ref_month_ )
	{
		// Complete the reference month
		$ref_date = "01/" . $ref_month_;

		// Converts to american format
		$ref_date = str_replace('/', '-', $ref_date);
		$ref_date = date('Y-m-d', strtotime($ref_date));

		// Gets the first day of the last month
		$datestring = $ref_date . ' first day of last month';
		$return_date = date_create($datestring);

		// Return the previous month
		return  $return_date->format('m/Y');
	}

	//!*****************************************************************************
	// UNITS MANIPULATION FUNCTIONS
	//!*****************************************************************************

	/**
	 * Format value to XXmb XXkb 
	 *
	 * @value => value to be formatted
	 * @return string
	*/
	function formatMbKb( $value )
	{
		// Format the value
		$total = number_format($value, 3);
		$total = str_replace(".", "mb ", $total . "kb");
		$total = str_replace(",", "", $total);
		return $total;
	}

	//******************************************************************************
