<?php
/* 
PDO Database Class
connect to database
Create Prepared Statements
Bind Values
Return rows and results
*/
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $dbtype = DB_TYPE;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        //set DSN 
        if ($this->dbtype=='PGSQL') {
            // $dsn='pgsql:host=localhost;dbname=dbname', 'username', 'password';
            $dsn = 'pgsql:host=' . $this->host . ';dbname=' . $this->dbname;
        } else {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        }
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            var_dump($this->dbh);
            die;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
        
         var_dump($this->dbh, $this->error, this->dbtype);
            die;
    }
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                case is_array($value):
                    $type = PDO::PARAM_LOB;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute()
    {
        return $this->stmt->execute();
    }
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    public function arraysingle()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function getLastId()
    {
        // return $this->stmt->lastInsertId();
        try {
            return $this->dbh->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
