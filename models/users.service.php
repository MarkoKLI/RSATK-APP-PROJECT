<?php 
    require("./db.service.php");
    
    class UsersService extends DBService {
        
        public static function getDoctorsBySpecialty(int $specialty) {
            self::Connect();
            $query =   "SELECT id, name, surname, email, telNr, description
                        FROM users
                        WHERE isDoctor = true AND specialtyId = ?";
            $statement = self::$connection->prepare($query);
            $statement->bind_param('s',$specialty);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public static function getUserById(int $userId) {
            self::Connect();
            $query = "  SELECT id, name, surname, isDoctor, email, telNr, address, description
                        FROM users
                        WHERE id = ?";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("i", $userId);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_assoc();
        }

        public static function getUserPasswordDetailsByEmail($email) {
            self::Connect();
            $query = "  SELECT passwordSalt, passwordHash
                        FROM users WHERE email = ?";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("s",$email);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_assoc();
        }

    }
?>