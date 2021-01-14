<?php
    class Password {
        public static function validatePassword(string $passwordHash, 
                                                string $passwordSalt, 
                                                string $plaintextPass) { 
            $passwordSalt = utf8_encode($passwordSalt);
            $checkValue = hash("sha512", $plaintextPass . $passwordSalt);
            $checkValue = utf8_encode(ConversionService::Hex2ascii($checkValue));
            return $checkValue == $passwordHash;
        }

        private string $password_salt = '';
        private string $password;
        
        // Generates ASCII salt. Creates ASCII (password . salt) hash. Stores them in Password object.
        public function __construct(string $plaintext_pass) {
            
            // Creates 8 bytes in binary and subsequently converts them to ASCII characters
            for ($i=0; $i<8; $i++) {
                $this->password_salt .= ConversionService::Bin2ascii(random_bytes(1));
            }
            // Encoding is done here so as to ensure that the salt used in the hash
            // is the same as the salt stored in the database.
            $this->password_salt = utf8_encode($this->password_salt);

            $password = hash("sha512", $plaintext_pass . $this->password_salt);

            $this->password = utf8_encode(ConversionService::Hex2ascii($password));
        } 

        public function getPassword() {
            return $this->password;
        }

        public function getPasswordSalt() {
            return $this->password_salt;
        }

    }

?>