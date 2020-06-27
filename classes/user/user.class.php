<?php

class User {

    private $id;
    private $email;
    private $password;
    private $db;
    private $role;
    private $image;
    private $username;
    private $banned;

    public function __construct($id, $db) {
        $sql = "SELECT * FROM user WHERE ID = ?;";

        $stmt = $db->prepare($sql);
        if (!$stmt) {
            die("Constructor user.class.php Query: " . $sql . "Error: " . $db->error);
        }
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            die("Constructor user.class.php Query: " . $sql . "Error: " . $db->error);
        }

        $row = $result->fetch_assoc();

        $this->db = $db;
        $this->id = $id;
        if (isset($row['email'])) {
            $this->email = $row['email'];
            $this->password = $row['password'];
            $this->role = $row['role'];            
            $this->image = $row['logo'];
            $this->username = $row['username'];
            $this->banned = $row['banned'];
        }
        $result->close();
    }

    function getBanned() {
        return $this->banned;
    }

    function setBanned($banned) {
        $this->banned = $banned;
        $this->updateUser();
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }
  
    public function isAdmin() {
        return $this->getRole() == "ADMIN";
    }

    public function isModerator() {
        return $this->getRole() == "MODERATOR";
    }

    public function getImage() {
        return $this->image;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setActivated($activated) {
        $this->activated = $activated;
    }

    public function setReceive($receive) {
        $this->receive = $receive;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function updateUser() {
        $sql = 'UPDATE user SET username = ?, email = ?, password = ?, logo = ?, banned = ? WHERE ID = ?;';
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            die("updateUser user.class.php Query: " . $sql . "Error: " . $this->db->error);
        }
        $stmt->bind_param('ssssii', $this->username, $this->email, $this->password, $this->image, $this->banned, $this->id);
        $stmt->execute();
        $stmt->close();
    }

}
