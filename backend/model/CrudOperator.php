<?php
/*	
Title : CrudOperator Trait
Developer : Kaviska Dilshan
Description : This trait provides CRUD operations for interacting with the database.
Developed Date : 2024.2.25

*/

//require_once('DatabaseDriver.php');

class CrudOperator
{
    private $databaseDriver;

    /**
     * Constructor to initialize the database driver.
     *
     * @param DatabaseDriver $databaseDriver The database driver instance.
     */
    public function __construct(DatabaseDriver $databaseDriver)
    {
        $this->databaseDriver = $databaseDriver;
    }

    /**
     * Updates records in the database.
     *
     * @param string $tableName The name of the table to update.
     * @param array $updatableDataSet The data to be updated.
     * @param array $whereClause The WHERE clause for updating records.
     * @return bool Whether the update operation was successful.
     */
    public function update($tableName, $updatableDataSet, $whereClause)
    {
        // Build the update query
        $updateQuery = "UPDATE $tableName SET ";
        $updateValues = [];
        $types = "";
        $params = [];

        // Iterate through each column and its new value in the data
        foreach ($updatableDataSet as $column => $value) {
            // Add each column and its new value to the update query
            $updateValues[] = "$column = ?";
            // Determine the type of the parameter dynamically
            if (is_int($value)) {
                $types .= "i"; // Integer
            } else {
                $types .= "s"; // String
            }
            // Append the value for binding parameters
            $params[] = $value;
        }

        // Combine the update values into the update query
        $updateQuery .= implode(", ", $updateValues);

        // Add the WHERE clause
        if (count($whereClause) != 0) {
            $updateQuery .= " WHERE ";
            $i = 0;
            foreach ($whereClause as $column => $value) {
                if ($i > 0) {
                    $updateQuery .= " AND ";
                }
                $updateQuery .= "$column = ?";
                // Determine the type of the parameter dynamically
                if (is_int($value)) {
                    $types .= "i"; // Integer
                } else {
                    $types .= "s"; // String
                }
                // Append the value for binding parameters
                $params[] = $value;
                $i++;
            }
        }

        // Execute the update query
        $result = $this->databaseDriver->execute_query($updateQuery, $types, $params);

        return $result;
    }


    /**
     * Inserts records into the database.
     *
     * @param string $tableName The name of the table to insert into.
     * @param array $insertData The data to be inserted.
     * @return bool Whether the insert operation was successful.
     */
    public function insert($tableName, $insertData)
    {
        // Build the insert query
        $insertQuery = "INSERT INTO $tableName ";
        $columns = [];
        $placeholders = [];
        $types = "";
        $params = [];

        // Iterate through each column and its value in the insert data
        foreach ($insertData as $column => $value) {
            // Add the column to the list of columns
            $columns[] = $column;
            // Add a placeholder for the value
            $placeholders[] = "?";

            // Determine the type of the parameter dynamically
            if (is_int($value)) {
                $types .= "i"; // Integer
            } else {
                $types .= "s"; // String
            }

            // Append the value for binding parameters
            $params[] = $value;
        }

        // Construct the query with columns and placeholders
        $insertQuery .= "(" . implode(", ", $columns) . ") ";
        $insertQuery .= "VALUES (" . implode(", ", $placeholders) . ")";

        // Execute the insert query
        $result = $this->databaseDriver->execute_query($insertQuery, $types, $params);
        return $result;
    }

    /**
     * Selects records from the database.
     *
     * @param string $tableName The name of the table to select from.
     * @param array $whereClause The WHERE clause in an associative array for selecting records.
     * @return array The selected rows.
     */
    public function select($tableName, array $whereClause = [])
    {
        // Construct the select query
        $selectQuery = "SELECT * FROM $tableName ";
        $types = "";
        $params = [];

        // Construct the WHERE clause
        $i = 0;
        if (count($whereClause) != 0) {
            $selectQuery .= " WHERE ";
        }
        foreach ($whereClause as $key => $value) {
            if ($i > 0) {
                $selectQuery .= " AND ";
            }
            $selectQuery .= "$key = ?";

            // Determine the type of the parameter dynamically
            if (is_int($value)) {
                $types .= "i"; // Integer
            } else {
                $types .= "s"; // String
            }

            $params[] = $value;
            $i++;
        }

        // Execute the select query
        $result = (count($whereClause) !== 0)
            ? $this->databaseDriver->execute_query($selectQuery, $types, $params)
            : $this->databaseDriver->query($selectQuery);

        // Fetch all rows into an associative array
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        // Return the array of rows
        return $rows;
    }

    /**
     * Deletes records from the database.
     *
     * @param string $tableName The name of the table to delete from.
     * @param array $whereClause The WHERE clause for deleting records.
     * @return bool Whether the delete operation was successful.
     */
    public function delete($tableName, $whereClause)
    {
        if (empty($whereClause)) {
            return false;
        }
        // Construct the delete query
        $deleteQuery = "DELETE FROM $tableName WHERE ";
        $types = "";
        $params = [];

        // Construct the WHERE clause
        $i = 0;
        foreach ($whereClause as $key => $value) {
            if ($i > 0) {
                $deleteQuery .= " AND ";
            }
            $deleteQuery .= "$key = ?";

            // Determine the type of the parameter dynamically
            if (is_int($value)) {
                $types .= "i"; // Integer
            } else {
                $types .= "s"; // String
            }

            $params[] = $value;
            $i++;
        }

        // Execute the delete query
        $result = $this->databaseDriver->execute_query($deleteQuery, $types, $params);

        // Return true if delete operation was successful, false otherwise
        return $result !== false;
    }
}
