<?php
// Request
require_once 'Model.php';

class Appointment extends Model
{
      protected $table = 'appointments';

      // Insert new patient method
      public function insert(array $params): void {
            try {
                  $request = $this->database->prepare(
                  "INSERT INTO {$this->table}(dateHour, idPatients)
                  VALUES (:dateHour, :idPatients)"
                  );  
                  $request->execute($params);
            } catch (PDOException $e) {
                  echo $e->getMessage();
                  exit;
            }
      }

      // Search all rdv method
      public function getAllRdv() {
            try {
                  $request = $this->database->prepare(
                        "SELECT appointments.id, dateHour, firstname, lastname
                        FROM {$this->table}
                        INNER JOIN patients ON appointments.idPatients = patients.id"
                  );
                  $request->execute();
                  $result = $request->fetchAll();
                  return $result;
            } catch (PDOException $e) {
                  echo $e->getMessage();
                  exit;
            }
      }

      // Search all rdv by patient id method
      public function getAllRdvByPatientId(string $id) {
            try {
                  $request = $this->database->prepare(
                        "SELECT appointments.id as rdv_id, dateHour, idPatients
                        FROM {$this->table}
                        INNER JOIN patients ON appointments.idPatients = patients.id
                        WHERE patients.id = :id"
                  );
                  $request->execute([':id' => $id]);
                  $result = $request->fetchAll();
                  return $result;
            } catch (PDOException $e) {
                  echo $e->getMessage();
                  exit;
            }
      }

       // Search rdv by patient id method
       public function getRdvByPatientId(string $id) {
            try {
                  $request = $this->database->prepare(
                        "SELECT *
                        FROM {$this->table}
                        INNER JOIN patients ON appointments.idPatients = patients.id
                        WHERE patients.id = :id"
                  );
                  $request->execute([':id' => $id]);
                  $result = $request->fetch();
                  return $result;
            } catch (PDOException $e) {
                  echo $e->getMessage();
                  exit;
            }
      }

      // Update rdv method
      public function update(string $date){
            try {
                  $request = $this->database->prepare(
                        "UPDATE {$this->table}
                        SET dateHour = :dateHour"
                  );
                  $request->execute(
                        [     
                              ':dateHour' => $date,
                        ]
                  );
            } catch (PDOException $e) {
                  echo $e->getMessage();
                  exit;
            }
      }
}