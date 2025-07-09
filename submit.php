<?php
// Get form values
$data = [
  $_POST['state'] ?? '',
  $_POST['firstName'] ?? '',
  $_POST['middleName'] ?? '',
  $_POST['lastName'] ?? '',
  $_POST['gender'] ?? '',
  $_POST['eyeColor'] ?? '',
  $_POST['hairColor'] ?? '',
  $_POST['birthday'] ?? '',
  $_POST['height'] ?? '',
  $_POST['weight'] ?? '',
  $_POST['streetAddress'] ?? '',
  $_POST['city'] ?? '',
  $_POST['zipCode'] ?? '',
  isset($_POST['organDonor']) ? 'Yes' : 'No',
  isset($_POST['correctiveLenses']) ? 'Yes' : 'No',
  $_POST['shippingStreetAddress'] ?? '',
  $_POST['shippingCity'] ?? '',
  $_POST['shippingState'] ?? '',
  $_POST['shippingZipCode'] ?? '',
  $_POST['notes'] ?? '',
  date('Y-m-d H:i:s') // timestamp
];

// Append to CSV
$file = fopen('orders.csv', 'a');
fputcsv($file, $data);
fclose($file);

// Redirect or confirm
echo "Thank you. Your form has been submitted.";
?>
