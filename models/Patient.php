<?php
// Request
require_once 'Model.php';

class Patient extends Model
{
      protected $table = 'patients';

      // Insert new patient data method
      public function insert(array $params){
            try {
                  if ($this->findByMail($params[':mail']))
                        throw new PDOException("Ce patient a déjà été enregistré");
                  
                  $request = $this->database->prepare(
                  "INSERT INTO {$this->table}(lastname, firstname, birthdate, phone, mail)
                  VALUES (:lastname, :firstname, :birthdate, :phone, :mail)"
                  );  
                  $request->execute($params);
                  return $this->database->lastInsertId();
            } catch (PDOException $e) {
                  echo $e->getMessage();
                  exit;
            }
      }

      // Update patient data method
      public function update(
            string $id,
            string $firstname,
            string $lastname,
            string $birthdate,
            string $phone,
            string $mail){
            try {
                  $request = $this->database->prepare(
                        "UPDATE {$this->table}
                        SET firstname = :firstname, lastname = :lastname, birthdate = :birthdate, phone = :phone, mail = :mail
                        WHERE id = :id"
                  );
                  $request->execute(
                        [
                              ':id' => $id,
                              ':firstname' => $firstname,
                              ':lastname' => $lastname,
                              ':birthdate' => $birthdate,
                              ':phone' => $phone,
                              ':mail' => $mail
                        ]
                  );
            } catch (PDOException $e) {
                  echo $e->getMessage();
                  exit;
            }
      }
}