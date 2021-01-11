<?php 

    class DBService {
        private static $db_user = 'system';
        private static $db_password = 'sys_pass_123';
        private static $db_name = 'rsatk_app_project';
        private static $db_host = 'localhost';
        private static $db_port = 3306;

        public static mysqli $connection;

        public static function Connect() 
        {
            if (!isset(self::$connection)) {
                self::$connection = new mysqli(self::$db_host,self::$db_user,self::$db_password,
                                                self::$db_name,self::$db_port);
                
                if (self::$connection->connect_error) {
                    echo "Connection failed: " . self::$connection->connect_error;
                } else {
                    return true;
                }
            }
        }

        public static function CreateUser($username,$email,$str_pass,$password_salt,$dateOfBirth) {
            if (!isset(self::$connection))
                DBService::Connect();

            $statement = self::$connection->prepare("INSERT INTO USERS (username,email,password,
                                            password_salt,date_of_birth) 
                                            VALUES (?,?,?,?,?)");
            
            $password = utf8_encode($str_pass);
            $password_salt = utf8_encode($password_salt);

            $statement->bind_param('sssss',$username,$email,$password,$password_salt,$dateOfBirth);
            
            return $statement->execute();
        }

        public static function CheckUsernameExists($username) {
            if (!isset(self::$connection))
                DBService::Connect();
            
            $statement = self::$connection->prepare("SELECT COUNT(username) 
                                                     FROM users
                                                     WHERE username = ?");
            $statement->bind_param('s',$username);
            $statement->execute();
            $result = $statement->get_result()->fetch_assoc();

            return $result["COUNT(username)"] != 0;
        }

        public static function CheckEmailExists($email) {
            if (!isset(self::$connection))
                DBService::Connect();
            
            $statement = self::$connection->prepare("SELECT COUNT(email) 
                                                     FROM users
                                                     WHERE email = ?");
            $statement->bind_param('s',$email);
            $statement->execute();
            $result = $statement->get_result()->fetch_assoc();

            return $result["COUNT(email)"] != 0;
        }

        public static function GetUserSalt($username) {
            if (!isset(self::$connection))
                DBService::Connect();
            
            $statement = self::$connection->prepare("SELECT password_salt
                                                     FROM users
                                                     WHERE username = ?");
            $statement->bind_param('s', $username);
            $statement->execute();

            $password_salt = $statement->get_result()->fetch_assoc()["password_salt"];

            return $password_salt;
        }

        public static function CheckUserLoginCredentials($username, $password) {
            
        }
    }
?>