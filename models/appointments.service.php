<?php 
    class AppointmentsService extends DBService {

        public static function getPatientAppointments(int $patientId) {
            self::Connect();
            $query = "  SELECT A.id, A.date, A.time, DOC.id, DOC.name,
                                DOC.surname, S.id, S.title
                        FROM appointments AS A 
                        INNER JOIN users AS DOC
                        ON A.doctorId = DOC.id
                        INNER JOIN specialties as S
                        ON DOC.specialtyId = S.id
                        WHERE A.patientId = ? ";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("i", $patientId);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public static function getDoctorAppointments(int $doctorId) {
            self::Connect();
            $query = "  SELECT A.id, A.date, A.time, PAT.id, PAT.name, PAT.surname
                        FROM appointments AS A 
                        INNER JOIN users AS PAT
                        ON A.patientId = PAT.id
                        WHERE A.doctorId = ? ";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("i", $doctorId);
            $statement->execute();
            $result = $statement->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public static function createAppointment(string $date, string $time, 
                                                int $patientId, int $doctorId) {
            self::Connect();
            $query = "  INSERT INTO appointments (doctorId, patientId, date, time)
                        VALUES (?, ?, ?, ?) ";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("iiss", $doctorId, $patientId, $date, $time);
            $statement->execute();
        }

        public static function deleteAppointment(int $appointmentId) {
            self::Connect();
            $query = "  DELETE FROM appointments 
                        WHERE id = ?";
            $statement = self::$connection->prepare($query);
            $statement->bind_param("i", $appointmentId);
            $statement->execute();
        }

    }

?>