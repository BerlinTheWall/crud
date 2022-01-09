<?php

namespace CRUD\Helper;

class DBConnector
{

    /** @var mixed $db */
    private $db;
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function connect(): void
    {

        $this->db = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->db) {
            die("Failed connection : " . mysqli_connect_error());
        }
        echo "Successful connection";
    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query): bool
    {
        if ($this->db->query($query) === true) {
            echo "Successful execution";

            return true;
        } else {
            echo "Failed: " . $query . "<br>" . $this->db->error;
            $this->db->close();

            return false;
        }
    }

    /**
     * @param string $message
     * @throws \Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {
        echo "Failed" . $message;
    }
}
