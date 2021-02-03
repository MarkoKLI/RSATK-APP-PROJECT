<?php
    class ReportService extends DBService {

        public static function getPatientReports(int $patientId) {
            self::Connect();
            $query = "  SELECT id, title, description, date, doctorId
                        FROM reports
                        WHERE patientId = ?";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("i", $patientId);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public static function getDoctorReports(int $doctorId) {
            self::Connect();
            $query = "  SELECT id, title, description, date, userId
                        FROM reports
                        WHERE patientId = ?";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("i", $doctorId);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    
        public static function createReport(string $title, string $description, string $date,
                                            int $patientId, int $doctorId) {
            self::Connect();
            $query = "  INSERT INTO reports (title, description, date, doctorId, patientId)
                        VALUES (?, ?, ?, ?, ?)";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("sssii", $title, $description, $date,
                                            $doctorId, $patientId);
            return $statement->execute();
        }

        public static function deleteReport(int $reportId) {
            self::Connect();
            $query = "  DELETE FROM reports 
                        WHERE id = ?";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("i", $reportId);
            return $statement->execute();
        }

        public static function updateReport(int $id, string $title, string $description,
                                            string $date) {
            self::Connect();

            $query = "  UPDATE reports
                        SET title = ?, description = ?, date = ?
                        WHERE id = ?";

            $statement = self::$connection->prepare($query);
            $statement->bind_param("sssi", $title, $description, $date,
                                            $id);
            return $statement->execute();
        }

        public static function setReportDiagnosesMade (array $diagnoses,int $reportId) {
            // Diagnoses should be array of associative arrays with at least element with
            // key diagnosisId. Active can be NULL
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