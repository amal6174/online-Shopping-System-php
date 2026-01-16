<?php
class User{
    private $conn;
    private $table = 'users';

    public function __construct($db){
        $this->conn = $db;
    }

        public function register($name, $email, $password) {
        // Check if email already exists
        $checkQuery = "SELECT id FROM $this->table WHERE email = ?";
        $stmt = $this->conn->prepare($checkQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

         if ($stmt->num_rows > 0) {
            return "Email already registered!";
        }
     // Insert user
        $query = "INSERT INTO $this->table (name, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

  

    public function login($email,$password){
        $query = "SELECT * FROM $this->table WHERE email =? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 1 ){
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])){
                return $user;
            }

        }
         return false;
    

    }



    public function getUserById($id){
        $query = "SELECT id,name,email FROM $this->table WHERE id= ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }



}

?>