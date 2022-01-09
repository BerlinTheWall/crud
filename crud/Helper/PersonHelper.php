<?php

namespace CRUD\Helper;

use CRUD\Helper\DBConnector;

class PersonHelper
{
    public function insert(): bool
    {

        $db = new DBConnector("localhost", "root", "", "test");
        $db->connect();
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];

        $sql = "INSERT INTO users (firstName, lastName, username)
         VALUES ('$firstName','$lastName', '$username')";
        return $db->execQuery($sql);
    }

    public function fetch(int $id)
    {
        $sql = "SELECT id, firstName, lastName, username FROM users WHERE id ='$id'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstName"] . " " . $row["lastName"] . " " . $row["username"] . "<br>";
            }
        } else {
            echo "There are no results";
        }
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstName"] . " " . $row["lastName"] . " " . $row["username"] . "<br>";
            }
        } else {
            echo "There are no results";
        }
    }

    public function update()
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];

        $sql = "UPDATE users SET firstName ='$firstName', lastName ='$lastName' WHERE username ='$username'";
        $this->db->execQuery($sql);
    }

    public function delete()
    {
        $id = $_POST['id'];
        $sql = "DELETE users WHERE id ='$id'";
        $this->db->execQuery($sql);
    }
}
