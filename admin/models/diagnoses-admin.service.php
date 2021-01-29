<?php 
    class DiagnosesAdminService extends DBService {
        
        public static function createDiagnosis(string $name, string $desc) {
            self::Connect();

            $query = "  INSERT INTO diagnoses (name, description)
                        VALUES (?, ?)";
            
            $statement = self::$connection->prepare($query);
            $statement->bind_param("ss", $name, $desc);
            $statement->execute();
        }

        public static function deleteDiagnosis($id) {
            self::Connect();

            $query = "  DELETE FROM diagnoses
                        WHERE id = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("i",$id);
            $statement->execute();
        }
        
        public static function getAllDiagnoses() {
            self::Connect();

            $query = "  SELECT id, name, description
                        FROM diagnoses";

            $statement = self::$connection->prepare($query);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public static function updateDiagnosis(int $id, string $name, string $desc) {
            self::Connect();

            $query = "  UPDATE diagnoses 
                        SET name = ?, description = ?
                        WHERE id = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("ssi", $name, $desc, $id);
            $statement->execute();
        }

    }
?>