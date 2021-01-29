<?php 
    class DepartmentsAdminService extends DBService {
        
        public static function createDepartment(string $title, string $desc) {
            self::Connect();

            $query = "  INSERT INTO specialties (title, description)
                        VALUES (?, ?)";
            
            $statement = self::$connection->prepare($query);
            $statement->bind_param("ss", $title, $desc);
            $statement->execute();
        }

        public static function deleteDepartment($id) {
            self::Connect();

            $query = "  DELETE FROM specialties
                        WHERE id = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("i",$id);
            $statement->execute();
        }

        public static function getAllDepartments() {
            self::Connect();

            $query = "  SELECT id, title, description
                        FROM specialties";

            $statement = self::$connection->prepare($query);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public static function updateDepartment(int $id, string $title, string $desc) {
            self::Connect();

            $query = "  UPDATE specialties 
                        SET title = ?, description = ?
                        WHERE id = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("ssi", $title, $desc, $id);
            $statement->execute();
        }

    }
?>