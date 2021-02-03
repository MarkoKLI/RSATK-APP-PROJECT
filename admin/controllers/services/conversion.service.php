<?php

class ConversionService {

    public static function Bin2ascii($input) : string
    {
        return chr( hexdec( bin2hex($input)));
    }

    public static function Hex2ascii($input) : string 
    {
        $output = '';
        for ($i=0; $i<strlen($input); $i+=2) {
            $output.= chr( hexdec( substr($input,$i,2)));
        }
        return $output;
    }

    // Secures input values from possible injection attacks which could break the code.
    public static function SecureInput(?string $input) {
        $output = htmlspecialchars( stripslashes( trim($input)));
        return $output;
    }

}

?>