<?php
$host = "localhost";
$username = "sql_elitefitxdub";
$password = "2c99ed0c5e7df8";
$dbname = "sql_elitefitxdub";

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch data from the database
    $query = "SELECT * FROM contact_us";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($results) > 0) {
        // Define the filename with a .xls extension
        $filename = "data_export_" . date('Ymd') . ".xls";

        // Send headers to force download of the file
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");

        // Start output buffering
        ob_start();

        // Open PHP output stream
        $df = fopen("php://output", 'w');

        // Write column headers
        fputcsv($df, array_keys($results[0]), "\t");

        // Write the data
        foreach ($results as $row) {
            fputcsv($df, $row, "\t");
        }

        // Close the output stream
        fclose($df);

        // Capture the output
        $excel_data = ob_get_clean();

        // Output the captured data
        echo $excel_data;
    } else {
        echo "No data found.";
    }

    exit();
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>