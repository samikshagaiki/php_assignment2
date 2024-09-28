<?php

/**
 * Establishes a connection to the database.
 *
 * @return PDO
 */
function connectToDatabase()
{
    try {
        // Create a new PDO instance
        $pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', 'sami2005'); // Ensure this matches your DB credentials
        return $pdo;
    } catch (PDOException $e) {
        // Output error message and exit if connection fails
        echo $e->getMessage();
        exit;
    }
}

/**
 * Dumps the variable and terminates the script.
 *
 * @param mixed $var
 */
function dd($var)
{
    var_dump($var);
    exit;
}

/**
 * Selects all records from a specified table.
 *
 * @param string $table
 * @return array
 */
function selectAll($table)
{
    $pdo = connectToDatabase();
    
    // Query to select all records
    $query = 'SELECT * FROM ' . $table;

    $statement = $pdo->prepare($query);
    $statement->execute();

    // Fetch all records as instances of the Contact class
    return $statement->fetchAll(PDO::FETCH_CLASS, \models\Contacts::class);
}
