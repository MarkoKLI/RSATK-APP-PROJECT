<?php 
    class DepartmentsAdminService extends DBService {
        
        public static function createDepartment(string $title, string $desc) {
            self::Connect();

            $query = "  INSERT INTO specialties (title, description)
                        VALUES (?, ?)";
            
            $statement = self::$connection->prepare($query);
            $statement->prepare("ss", $title, $desc);
            $statement->execute();
        }

        public static function updateDepartment(int $id, string $title, string $desc) {
            self::Connect();

            $query = "  UPDATE specialties 
                        SET title = ?, description = ?
                        WHERE id = ?";

            $statement = self::$connection->prepare($query);
            $statement->prepare("ssi", $title, $desc, $id);
        }
    }
?>