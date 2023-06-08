<?php
include('../library/config.php');

$serial_number = $_GET['serial_number'];
$product_id = substr($serial_number, 0, 5);
$year = substr($serial_number, 7, 1);
$number_year = substr(date('y'),1,1);

if ($year <= $number_year){
    $years = 2;
}else{
    $years = 1;
}

$query = mysqli_query(initConnection(), "SELECT * FROM product where product_id= '$product_id'");
$sql = mysqli_fetch_array($query);
$nameplate_serial_number = $sql['kode'].$years.substr($serial_number, 7, 9);

$data = array(
    'sector' => $sql['sector'],
    'family' => $sql['family'],
    'reference' => $sql['reference'],
    'nameplate_serial_number' => $nameplate_serial_number,
);
echo json_encode($data);
