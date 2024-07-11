<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debug: print received data
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Get form data
    $data = array(
        "firstname" => $_POST["firstname"],
        "lastname" => $_POST["lastname"],
        "gender" => $_POST["gender"],
        "tel" => $_POST["tel"],
        "dob" => $_POST["dob"],
        "religion" => $_POST["religion"],
        "race" => $_POST["race"],
        "pwd" => $_POST["pwd"],
        "veteranStatus" => $_POST["veteranStatus"],
        "email" => $_POST["email"],
        "password" => $_POST["password"],
        "notes" => $_POST["notes"],
        "zipCode" => $_POST["zipCode"],
        "region" => $_POST["region"],
        "province" => $_POST["province"],
        "municipality" => $_POST["municipality"],
        "barangay" => $_POST["barangay"],
        "addressTextarea" => $_POST["addressTextarea"],
        "fatherName" => $_POST["fatherName"],
        "motherName" => $_POST["motherName"],
        "emergencyContact" => $_POST["emergencyContact"],
        "position" => $_POST["position"],
        "employment" => $_POST["employment"],
        "resume" => $_POST["resume"]
    );

    // Read existing data from JSON file or create an empty array if the file doesn't exist
    $jsonFile = 'database.json';
    if (!file_exists($jsonFile)) {
        file_put_contents($jsonFile, json_encode([])); // Create file if it doesn't exist
    }

    $jsonData = file_get_contents($jsonFile);
    $jsonArr = json_decode($jsonData, true);

    if ($jsonArr === null) {
        $jsonArr = []; // Initialize as an empty array if the file is empty or contains invalid JSON
    }

    // Add new data to JSON array
    $jsonArr[] = $data;

    // Encode array back to JSON and save to file
    $newJsonData = json_encode($jsonArr, JSON_PRETTY_PRINT);
    if (file_put_contents($jsonFile, $newJsonData)) {
        echo "Data successfully saved!";
    } else {
        echo "Error saving data!";
    }
} else {
    echo "Invalid request!";
}
?>
