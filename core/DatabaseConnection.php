<?php

class DatabaseConnection
{
    protected ?PDO $connection;
    public function __construct($config = null) 
    {
        $host = $config['DB_HOST'] ?? $_ENV['DB_HOST'];
        $port = $config['DB_PORT'] ?? $_ENV['DB_PORT'];
        $dbname = $config['DB_NAME'] ?? $_ENV['DB_NAME'];
        $user = $config['DB_USER'] ?? $_ENV['DB_USER'];
        $password = $config['DB_PASS'] ?? $_ENV['DB_PASS'];
        
        if(! isset($this->connection)) {
            try {
                $this->connection = new PDO(
                    "mysql:host=$host;port=$port;dbname=$dbname",
                    $user,
                    $password
                );
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }
        }
    }

    /**
     * Get the value of host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set the value of host
     *
     * @return  self
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get the value of port
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set the value of port
     *
     * @return  self
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Get the value of dbname
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * Set the value of dbname
     *
     * @return  self
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getConnection() : ?PDO
    {
        return $this->connection;
    }
}
