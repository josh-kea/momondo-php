<?php 
$sData = file_get_contents('bookings.json');

$jData = json_decode($sData);

$jBooking = new stdClass();

$jBooking->bookingCode = bin2hex(random_bytes(16));

$jBooking->flightId = $_POST['flight-flightId'];
$jBooking->flightCompany = $_POST['flight-company'];
$jBooking->flightFrom = $_POST['flight-from'];
$jBooking->flightTo = $_POST['flight-to'];


$jBooking->customerName = $_POST['customer-name'];
$jBooking->customerLastname = $_POST['customer-lastname'];

$jBooking->customerEmail = $_POST['customer-email'];
$jBooking->customerPhone = $_POST['customer-phone'];

echo json_encode($jBooking, JSON_PRETTY_PRINT);

array_push($jData, $jBooking);

$sData = json_encode($jData, JSON_PRETTY_PRINT);

file_put_contents('bookings.json', $sData);

session_start();

$_SESSION['sCustomerName'] = $jBooking->customerName;
$_SESSION['sCustomerLastName'] =  $jBooking->customerLastname;
$_SESSION['sCustomerEmail'] = $jBooking->customerEmail;
$_SESSION['sCustomerPhone'] =$jBooking->customerPhone;
$_SESSION['sBookingCode'] = $jBooking->bookingCode;

header('Location: notification/api-send-booking-details.php');
?>