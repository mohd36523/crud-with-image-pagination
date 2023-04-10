<?php
header('Content-Type:application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Origin: GET,POST,PUT,DELETE');
header("Access-Control-Allow-Headers:  Access-Control-Allow-Headers, Content-Type, Authorization, X-Requested-With");


// connect to the database
$db = new PDO('mysql:host=localhost;dbname=testing', 'username', 'password');

// receive the search query from the frontend
$search_query = $_GET['q'];

// prepare the SQL query
$query = $db->prepare("SELECT * FROM tbl_sample WHERE column LIKE :search_query");

// bind the search query to the prepared statement
$query->bindValue(':search_query', '%'.$search_query.'%', PDO::PARAM_STR);

// execute the query
$query->execute();

// fetch the results as an array of objects
$results = $query->fetchAll(PDO::FETCH_OBJ);

// return the results as JSON
echo json_encode($results);


?>