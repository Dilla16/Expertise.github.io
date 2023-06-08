<?php
$GLOBALS['SYSTEM_CONNECT_DB'] = true;
$GLOBALS['SYSTEM_USE_SESSION'] = true;
include('../boot.php');


$sector = isset($_POST['sector']) ? $_POST['sector'] : '';
$family = isset($_POST['family']) ? $_POST['family'] : '';
$reference = isset($_POST['reference']) ? $_POST['reference'] : '';
$serial_number = isset($_POST['serial_number']) ? $_POST['serial_number'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$nameplate_serial_number = isset($_POST['nameplate_serial_number']) ? $_POST['nameplate_serial_number'] : '';

$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$badge = isset($_POST['badge']) ? $_POST['badge'] : '';
$sesa = isset($_POST['sesa']) ? $_POST['sesa'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$hak_akses = isset($_POST['hak_akses']) ? $_POST['hak_akses'] : '';

$scrap_date = date('y-m-d');
$sesa_scrap = $_SESSION['sesa'];

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'quarantineInsert') CreateDataQuarantine($sector, $family, $reference, $serial_number, $nameplate_serial_number, $remark, $location, $date_insert, $status_quarantine);
    elseif ($_POST['type'] == 'insertSampleNDF') CreateDataSampleNDF($sector, $family, $reference, $serial_number, $nameplate_serial_number, $remark, $location, $date_insert, $status_quarantine);
    elseif ($_POST['type'] == 'insertManufacturing') CreateDataManufacturing($sector, $family, $reference, $serial_number, $nameplate_serial_number, $remark, $location, $date_insert, $status_quarantine);
    elseif ($_POST['type'] == 'userInsert') createDataUser($nama, $badge, $sesa, $email, $password, $hak_akses, $level);
}


// FUNCTION DATA QUARANTINE
    function CreateDataQuarantine($sector, $family, $reference, $serial_number, $nameplate_serial_number, $remark, $location, $date_insert, $status_quarantine)
    {
        $sesa = $_SESSION['sesa'];
        $remark = 'sample RTA';
        $status_quarantine = 'Quarantine';
        $date_insert = date('y-m-d');
        $due_date = date('y-m-d', strtotime('+3 month'));
        $query = sprintf("SELECT * FROM data_quarantine WHERE `serial_number`='%s' LIMIT 1", $serial_number);
        $result = $GLOBALS['mysqli']->query($query);
        if ($result->num_rows > 0) {
            header("location: Insert.php?insertRTA=1 & failedinsertRTA=1");
        } else {
            $query = sprintf("INSERT INTO data_quarantine (sector, family, reference, serial_number, nameplate_serial_number, remark, loc, date_insert, due_date, sesa_insert,  status) VALUES ( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $sector, $family, $reference, $serial_number, $nameplate_serial_number, $remark, $location, $date_insert, $due_date, $sesa, $status_quarantine);
            if ($GLOBALS['mysqli']->query($query) === TRUE) {
                echo "New record created successfully";
                header("location: Insert.php?insertRTA=1&successinsertRTA=1");
            } else {
                echo "Error: " . $GLOBALS['mysqli']->error;
            }
        }
    }
// END OF FUNCTION DATA QUARANTINE

// FUNCTION DATA SAMPLE NDF
    function CreateDataSampleNDF($sector, $family, $reference, $serial_number, $nameplate_serial_number, $remark, $location, $date_insert, $status_quarantine)
    {
        $sesa = $_SESSION['sesa'];
        $remark = 'sample NDF';
        $status_quarantine = 'Quarantine';
        $date_insert = date('y-m-d');
        $due_date = date('y-m-d', strtotime('+3 month'));
        $query = sprintf("SELECT * FROM data_quarantine WHERE `serial_number`='%s' LIMIT 1", $serial_number);
        $result = $GLOBALS['mysqli']->query($query);
        if ($result->num_rows > 0) {
            header("location: Insert.php?insertSampleNDF=1 & failedinsertinsertSampleNDF=1");
        } else {
            $query = sprintf("INSERT INTO data_quarantine (sector, family, reference, serial_number, nameplate_serial_number, remark, loc, date_insert, due_date, sesa_insert, status) VALUES ( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $sector, $family, $reference, $serial_number, $nameplate_serial_number, $remark, $location, $date_insert, $due_date, $sesa, $status_quarantine);
            if ($GLOBALS['mysqli']->query($query) === TRUE) {
                echo "New record created successfully";
                header("location: Insert.php?insertSampleNDF=1&successinsertinsertSampleNDF=1");
            } else {
                echo "Error: " . $GLOBALS['mysqli']->error;
            }
        }
    }
// END OF DATA SAMPLE NDF

// FUNCTION DATA MANUFACTURING
    function CreateDataManufacturing($sector, $family, $reference, $serial_number, $nameplate_serial_number, $remark, $location, $date_insert, $status_quarantine)
    {
        $sesa = $_SESSION['sesa'];
        $remark = 'manufacturing';
        $status_quarantine = 'Quarantine';
        $date_insert = date('y-m-d');
        $due_date = date('y-m-d', strtotime('+3 month'));
        $query = sprintf("SELECT * FROM data_quarantine WHERE `serial_number`='%s' LIMIT 1", $serial_number);
        $result = $GLOBALS['mysqli']->query($query);
        if ($result->num_rows > 0) {
            header("location: Insert.php??insertManufacturing=1 & failedinsertManufacturing=1");
        } else {
            $query = sprintf("INSERT INTO data_quarantine (sector, family, reference, serial_number, nameplate_serial_number, remark, loc, date_insert, due_date, sesa_insert, status) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $sector, $family, $reference, $serial_number, $nameplate_serial_number, $remark, $location, $date_insert, $due_date, $sesa, $status_quarantine);
            if ($GLOBALS['mysqli']->query($query) === TRUE) {
                echo "New record created successfully";
                header("location: Insert.php?insertManufacturing=1&successinsertManufacturing=1");
            } else {
                echo "Error: " . $GLOBALS['mysqli']->error;
            }
        }
    }
// END OF DATA MANUFACTURING

// FUCTION DATA USER
    function CreateDataUser($nama, $badge, $sesa, $email, $password, $hak_akses, $level)
    {
        if ($_POST['hak_akses'] == 'user') {
            $level = 1;
        } else {
            $level = 2;
        }
        $query = sprintf("SELECT * FROM user WHERE `sesa`='%s' LIMIT 1", $sesa);
        $result = $GLOBALS['mysqli']->query($query);
        if ($result->num_rows > 0) {
            header("location: view.php?viewUser=1&failedInsertUser=1");
        } else {
            $query = sprintf("INSERT INTO user (nama, badge, sesa, email, password, hak_akses, level) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')", $nama, $badge, $sesa, $email, password_hash($password, PASSWORD_DEFAULT), $hak_akses, $level);
            if ($GLOBALS['mysqli']->query($query) === TRUE) {
                echo "New user created successfully";
                header("location: view.php?viewUser=1&successInsertUser=1");
            } else {
                echo "Error: " . $GLOBALS['mysqli']->error;
            }
        }
    }
// END OF FUNCTION DATA USER


