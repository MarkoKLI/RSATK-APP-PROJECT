<?php 
    class UsersService extends DBService {

        public static function getAllPatients() {
            self::Connect();

            $query = "  SELECT id, name, surname, embr, address, email, telNr, DOB
                        FROM users
                        WHERE isDoctor = 0";

            $statement = self::$connection->prepare($query);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
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

        public static function getUserDetailsByEmail($email) {
            self::Connect();
            $query = "  SELECT id, isDoctor, passwordSalt, passwordHash
                        FROM users WHERE email = ?";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("s",$email);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_assoc();
        }

        public static function editUserInfo(int $id, string $name, string $surname,
                                            string $email, string $phoneNr,
                                            string $dob, string $address) {
            self::Connect();

            $query = "  UPDATE users 
                        SET name = ?, surname = ?, email = ?, 
                            telNr = ?, DOB = ?, address = ?, 
                        WHERE id = ?";
            
            $statement = self::$connection->prepare($query);
            $statement->bind_param("ssssssi", $name, $surname, $email,
                                              $phoneNr, $dob, $address, $id);
            $statement->execute();
            if (self::$connection->errno) {
                return self::$connection->error;
            }
        }

        public static function updateUserPassword(int $id, string $passwordHash,
                                                  string $passwordSalt) {
            self::Connect();

            $query = "  UPDATE users 
                        SET passwordHash = ?, passwordSalt = ? 
                        WHERE id = ?";
            
            $statement = self::$connection->prepare($query);
            $statement->bind_param("ssi", $passwordHash, $passwordSalt, $id);
            $statement->execute();
            if (self::$connection->errno) {
                return self::$connection->error;
            }
        }

    }
?>