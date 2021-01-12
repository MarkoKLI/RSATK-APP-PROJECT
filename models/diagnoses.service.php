<?php 
    class DiagnosesService extends DBService {

        public static function checkActiveDiagnosisExists(int $diagnosisId, int $userId) {
            self::Connect();

            $query = "  SELECT *
                        FROM active_diagnoses
                        WHERE diagnosisId = ?
                        AND patientId = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param('ii', $diagnosisId, $userId);
            $statement->execute();
            $result = $statement->get_result();
            return $result->num_rows;
        }

        public static function deleteActiveDiagnoses (int $diagnosisId, int $patientId) {
            self::Connect();
            $query = "  DELETE FROM active_diagnoses
                        WHERE diagnosisId = ? and patientId = ?";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("ii", $diagnosisId, $patientId);
            $statement->execute();
        }

        public static function deleteReportDiagnosisMade(int $reportId, int $diagnosisId) {
            self::Connect();
            $query = "  DELETE FROM diagnoses_made
                        WHERE reportId = ? AND diagnosisId = ?";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("ii", $reportId, $diagnosisId);
            $statement->execute();
        }

        public static function getActiveDiagnoses(int $userId) {
            self::Connect();

            $query = "  SELECT D.id, D.name, D.description
                        FROM active_diagnoses as AD
                        INNER JOIN diagnoses as D 
                        ON AD.diagnosisId = D.id
                        WHERE AD.patientId = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param('i', $userId);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public static function getAllDiagnoses() {
            self::Connect();
            
            $query = "  SELECT id, name, description
                        FROM diagnoses
                        ORDER BY name ASCENDING";

            $statement = self::$connection->prepare($query);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public static function getReportDiagnosesMade(int $reportId) {
            self::Connect();
            $query = "  SELECT D.id, D.name, D.description, DM.date, DM.active
                        FROM diagnoses_made AS DM
                        INNER JOIN diagnoses AS D
                        ON DM.diagnosisId = D.id
                        WHERE reportId = ?";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("i", $reportId);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public static function setActiveDiagnoses(array $diagnosesIds, int $userId) {
            self::Connect();

            foreach ($diagnosesIds as $diagnosis) {
                if (!self::checkActiveDiagnosisExists($diagnosis, $userId)) {
                    // Creates new link between user and diagnosis in active_diagnoses
                    // if no such connection existed previously
                    $query = "  INSERT INTO active_diagnoses (patientId, diagnosisId)
                                VALUES (?, ?)";
                    $statement = self::$connection->prepare($query);
                    $statement->bind_param("ii", $userId, $diagnosis);
                    $statement->execute();
                } 
            }
        }

        public static function setReportDiagnosesMade (array $diagnoses,int $reportId) {
            // Diagnoses should be array of associative arrays with at least
            // diagnosisId. Active can be NULL
            self::Connect();

            foreach ($diagnoses as $diagnosis) {
                $query = "  INSERT INTO diagnosesMade (active, reportId, diagnosisId)
                            VALUES (?, ?, ?)";
                $statement = self::$connection->prepare($query);
                $statement->bind_param("iii", 
                                        intval($diagnosis["active"]),
                                        $reportId, 
                                        $diagnosis["id"]);
                $statement->execute();
            }
        }

    }
?>