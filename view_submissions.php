<!DOCTYPE html>
<html>
<head>
    <title>View Submissions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Submitted Form Data</h2>

    <?php
    // Path to the submissions JSON file
    $file = 'submissions.json';

    // Check if the file exists
    if (file_exists($file)) {
        // Read the JSON file
        $data = file_get_contents($file);

        // Decode JSON data into an array
        $submissions = json_decode($data, true);

        // Check if there are submissions
        if (!empty($submissions)) {
            echo '<table>';
            echo '<tr><th>Submission ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Position</th><th>Date Submitted</th></tr>';

            // Loop through submissions and display each row
            foreach ($submissions as $key => $submission) {
                // Example fields to display, adjust as per your form fields
                $firstName = isset($submission['firstName']) ? $submission['firstName'] : '';
                $lastName = isset($submission['lastName']) ? $submission['lastName'] : '';
                $email = isset($submission['email']) ? $submission['email'] : '';
                $position = isset($submission['position']) ? $submission['position'] : '';
                $dateSubmitted = isset($submission['timestamp']) ? date('Y-m-d H:i:s', $submission['timestamp']) : '';

                // Output row
                echo '<tr>';
                echo '<td>' . ($key + 1) . '</td>';
                echo '<td>' . $firstName . '</td>';
                echo '<td>' . $lastName . '</td>';
                echo '<td>' . $email . '</td>';
                echo '<td>' . $position . '</td>';
                echo '<td>' . $dateSubmitted . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No submissions found.</p>';
        }
    } else {
        echo '<p>Submissions file does not exist.</p>';
    }
    ?>

</body>
</html>
