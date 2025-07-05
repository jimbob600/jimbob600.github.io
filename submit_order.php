<?php
$storageDir = __DIR__ . '/data/';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0700, true);
}

function clean($value) {
    return htmlspecialchars(trim($value));
}

$data = [
    'firstName' => clean($_POST['firstName'] ?? ''),
    'middleName' => clean($_POST['middleName'] ?? ''),
    'lastName' => clean($_POST['lastName'] ?? ''),
    'gender' => clean($_POST['gender'] ?? ''),
    'eyeColor' => clean($_POST['eyeColor'] ?? ''),
    'hairColor' => clean($_POST['hairColor'] ?? ''),
    'birthday' => clean($_POST['birthday'] ?? ''),
    'height' => clean($_POST['height'] ?? ''),
    'weight' => clean($_POST['weight'] ?? ''),
    'street' => clean($_POST['streetAddress'] ?? ''),
    'city' => clean($_POST['city'] ?? ''),
    'zip' => clean($_POST['zipCode'] ?? ''),
    'organDonor' => isset($_POST['organDonor']) ? 'Yes' : 'No',
    'correctiveLenses' => isset($_POST['correctiveLenses']) ? 'Yes' : 'No',
    'ship_street' => clean($_POST['ship_street'] ?? ''),
    'ship_city' => clean($_POST['ship_city'] ?? ''),
    'ship_state' => clean($_POST['ship_state'] ?? ''),
    'ship_zip' => clean($_POST['ship_zip'] ?? '')
];

$timestamp = time();
$dataFile = $storageDir . "order_$timestamp.txt";
file_put_contents($dataFile, print_r($data, true));

function saveFile($fieldName, $prefix) {
    global $storageDir, $timestamp;
    if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] !== UPLOAD_ERR_OK) return;
    $tmpName = $_FILES[$fieldName]['tmp_name'];
    $filename = basename($_FILES[$fieldName]['name']);
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $savePath = $storageDir . "{$prefix}_$timestamp." . $ext;
    move_uploaded_file($tmpName, $savePath);
}

saveFile('picture', 'picture');
saveFile('signature', 'signature');

echo "<h2>Thank you! Your order was submitted successfully.</h2>";
?>
