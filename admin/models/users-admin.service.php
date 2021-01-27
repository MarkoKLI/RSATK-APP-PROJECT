<?php 
    include("./../models/db.service.php");
    include("./../controllers/classes/password.class.php");

    class UsersAdminService extends DBService {
        
        public static function createUser(string $name, string $surname, string $embr,
                                        string $email, string $phoneNr, string $dob,
                                        ?int $specialyId, string $address, bool $isDoctor) {
            self::Connect();

            $password = new Password($embr);
            $passwordH = $password->getPassword();
            $passwordS = $password->getPasswordSalt();
            $isDoctor = intval($isDoctor);
            $query = "  INSERT INTO users (name, surname, embr, email, telNr, DOB, isDoctor, passwordSalt, passwordHash, specialtyId, address)
                        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            
            $statement = self::$connection->prepare($query);
            $statement->bind_param("ssssssissis", $name, $surname, $embr,
                                                    $email, $phoneNr, $dob,
                                                    $isDoctor, $passwordS, $passwordH, 
                                                    $specialyId, $address);
            $statement->execute();
            if (self::$connection->errno) {
                return self::$connection->error;
            }
        }

        public static function createAdmin(string $username, string $password) {
            self::Connect();

            $password = new Password($password);
            $passwordH = $password->getPassword();
            $passwordS = $password->getPasswordSalt();
            $query = "  INSERT INTO admins (username, passwordHash, passwordSalt)
                        VALUES (?,?,?)";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("sss", $username, $passwordH, $passwordS);
            $statement->execute();
            if (self::$connection->errno) {
                return self::$connection->error;
            }
        }

        public static function deleteUser($id) {
            self::Connect();

            $query = "  DELETE FROM users
                        WHERE id = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("i", $id);
            $statement->execute();
        }

        public static function getAdminPasswordDetailsByUsername($username) {
            self::Connect();

            $query = "  SELECT passwordSalt, passwordHash
                        FROM admins WHERE username = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("s",$username);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_assoc();
        }

        public static function getAllAdmins() {
            self::Connect();

            $query = "  SELECT id, username
                        FROM admins";

            $statement = self::$connection->prepare($query);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_assoc();
        }

        public static function getAllUsers() {
            self::Connect();

            $query = "  SELECT id, name, surname, isDoctor
                        FROM users";

            $statement = self::$connection->prepare($query);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_assoc();
        }
    }
?>