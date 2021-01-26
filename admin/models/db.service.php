<?php 
    class DBService {
        public static mysqli $connection;

        protected static function Connect(string $db_user = 'system',
                                    string $db_password = 'sys_pass_123',
                                    string $db_name = 'rsatk_app_project',
                                    string $db_host = 'localhost',
                                    int $db_port = 3306) 
        {
            if (!isset(self::$connection)) {
                self::$connection = new mysqli($db_host,$db_user,$db_password,
                                                $db_name,$db_port);
                
                if (self::$connection->connect_error) {
                    echo "Connection failed: " . self::$connection->connect_error;
                } else {
                    return true;
                }
            }
        }

    }
?>