<?php 
    class DiagnosesAdminService extends DBService {
        
        public static function createDiagnosis(string $name, string $desc) {
            self::Connect();

            $query = "  INSERT INTO diagnoses (name, description)
                        VALUES (?, ?)";
            
            $statement = self::$connection->prepare($query);
            $statement->prepare("ss", $name, $desc);
            $statement->execute();
        }

        public static function updateDiagnosis(int $id, string $name, string $desc) {
            self::Connect();

            $query = "  UPDATE diagnoses 
                        SET name = ?, description = ?
                        WHERE id = ?";

            $statement = self::$connection->prepare($query);
            $statement->prepare("ssi", $name, $desc, $id);
        }

    }
?>