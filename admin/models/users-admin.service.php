<?php 
    class UsersAdminService extends DBService {

        public static function checkUsernameExists($username) {
            self::Connect();

            $query = "  SELECT COUNT(*)
                        FROM admins
                        WHERE username = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("s",$username);
            $statement->execute();
            $result = $statement->get_result()->fetch_assoc();
            return ($result['COUNT(*)'] != 0);
        }

        public static function checkUserExists($embr) {
            self::Connect();

            $query = "  SELECT COUNT(*)
                        FROM users
                        WHERE embr = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("s",$embr);
            $statement->execute();
            $result = $statement->get_result()->fetch_assoc();
            return ($result['COUNT(*)'] != 0);
        }
        
        public static function createUser(string $name, string $surname, string $embr,
                                        string $email, string $phoneNr, string $dob,
                                        ?int $specialyId, string $address, bool $isDoctor,
                                        string $passwordSalt, string $passwordHash) {
            self::Connect();

            $isDoctor = intval($isDoctor);
            $query = "  INSERT INTO users (name, surname, embr, email, telNr, DOB, isDoctor, passwordSalt, passwordHash, specialtyId, address)
                        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            
            $statement = self::$connection->prepare($query);
            $statement->bind_param("ssssssissis", $name, $surname, $embr,
                                                    $email, $phoneNr, $dob,
                                                    $isDoctor, $passwordSalt, $passwordHash, 
                                                    $specialyId, $address);
            $statement->execute();
            if (self::$connection->errno) {
                return self::$connection->error;
            }
        }

        public static function createAdmin(string $username, string $passwordHash, string $passwordSalt) {
            self::Connect();

            $query = "  INSERT INTO admins (username, passwordHash, passwordSalt)
                        VALUES (?,?,?)";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("sss", $username, $passwordHash, $passwordSalt);
            $statement->execute();
            if (self::$connection->errno) {
                return self::$connection->error;
            }
        }

        public static function deleteAdmin($id) {
            self::Connect();

            $query = "  DELETE FROM admins
            WHERE id = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("i", $id);
            $statement->execute(); 
        }

        public static function deleteUser($id) {
            self::Connect();

            $query = "  DELETE FROM users
                        WHERE id = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("i", $id);
            $statement->execute();
        }

        public static function getAdminDetailsByUsername($username) {
            self::Connect();

            $query = "  SELECT id, passwordSalt, passwordHash
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
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public static function getAllUsers() {
            self::Connect();

            $query = "  SELECT id, name, surname, embr, isDoctor, specialtyId
                        FROM users";

            $statement = self::$connection->prepare($query);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>