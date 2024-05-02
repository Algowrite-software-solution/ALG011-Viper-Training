<?php
class DatabaseDriver
{

    private $connection;

    // Constructor that takes in connection details and establishes a connection to the database
    public function __construct()
    {
        $host = DB_SERVER;
        $user = DB_USERNAME;
        $password = DB_PASSWORD; // janith
        $database = DB_DATABASE;

        // Connect to the database using mysqli
        $this->connection = new mysqli($host, $user, $password, $database);

        // Check for any connection errors
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Function that prepares a statement and binds parameters
    public function execute_query($query, $types, $params)
    {
        // Prepare the statement using mysqli
        $stmt = $this->connection->prepare($query);

        // Bind the parameters to the statement using mysqli
        $stmt->bind_param($types, ...$params);

        // Execute the statement
        $stmt->execute();

        // Return the statement object
        // return $stmt;

        // Return an associative array containing the statement and the result
        return $stmt->get_result();
    }


    // Function that executes a query and returns the result
    public function query($query)
    {
        // Execute the query using mysqli
        $result = $this->connection->query($query);

        // Check for any errors
        if (!$result) {
            die("Query failed: " . $this->connection->error);
        }

        // Return the result object
        return $result;
    }

    // Destructor that closes the database connection
    public function __destruct()
    {
        // Close the database connection using mysqli
        $this->connection->close();
    }
}
