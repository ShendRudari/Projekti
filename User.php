<?php

namespace Crud;

class User
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function isAdmin()
    {
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
            return true;
        }

        return false;
    }

    public function deleteUser($user_id)
    {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $user_id);
        return $stmt->execute();
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $result = $this->db->query($query);

        return ($result) ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }
}
?>
