<?php

// API endpoint URL
$url = "https://api.sat.tausi.africa/v1/mpesa/upload_pdf";

// Authorization header
$headers = array(
    "Authorization: Bearer TGqrFD45yIPKAHxgSJW8QWAS"
);

// File data
$file_path = 'Miamala_2024_04_04.pdf';
$file_mime_type = mime_content_type($file_path);
$file = new CURLFile($file_path, $file_mime_type, basename($file_path));

// Other form data
$data = array(
    "fullname" => "davis"
);

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    'file' => $file,
    'fullname' => $data["fullname"] // Add fullname field directly to POSTFIELDS
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check if request was successful
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if ($http_code == 200) {
    // Parse JSON response
    $output_data = json_decode($response, true);

    // Print output
    echo json_encode($output_data, JSON_PRETTY_PRINT);
} else {
    echo "Error occurred: " . $response;
}

// Close cURL session
curl_close($ch);

?>
