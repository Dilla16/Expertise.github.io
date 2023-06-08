<?php
$GLOBALS['SYSTEM_CONNECT_DB'] = true;
$GLOBALS['SYSTEM_USE_SESSION'] = true;
include('../boot.php');



// UPDATE TABEL FOR QUARANTINE
    if (isset($_GET['quarantineEdit'])) {
        $sector = isset($_POST['sector']) ? $_POST['sector'] : '';
        $family = isset($_POST['family']) ? $_POST['family'] : '';
        $reference = isset($_POST['reference']) ? $_POST['reference'] : '';
        $loc = isset($_POST['loc']) ? $_POST['loc'] : '';
        $remark = 'sample RTA';
        $date_insert = isset($_POST['date_insert']) ? $_POST['date_insert'] : '';
        $due_date = date('y-m-d', strtotime('+3 month', strtotime($_POST['date_insert'])));
        $sesa = $_SESSION['sesa'];

        $query = sprintf("UPDATE data_quarantine SET sector='%s', family='%s', reference='%s', loc='%s', remark='%s', date_insert='%s', due_date='%s', sesa_insert='%s' WHERE `serial_number`='%s'", $sector, $family, $reference, $loc, $remark, $date_insert, $due_date, $sesa, $_GET['serial_number']);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            echo "Record edited successfully";
            header("location: view.php?viewRTA=1&successEditQuarantine=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
// END OF UPDATE TABEL FOR QUARANTINE

// UPDATE TABEL FOR SAMPLE NDF
    }elseif (isset($_GET['NDFEdit'])) {
        $sector = isset($_POST['sector']) ? $_POST['sector'] : '';
        $family = isset($_POST['family']) ? $_POST['family'] : '';
        $reference = isset($_POST['reference']) ? $_POST['reference'] : '';
        $loc = isset($_POST['loc']) ? $_POST['loc'] : '';
        $remark = 'sample NDF';
        $date_insert = isset($_POST['date_insert']) ? $_POST['date_insert'] : '';
        $due_date = date('y-m-d', strtotime('+3 month', strtotime($_POST['date_insert'])));
        $sesa = $_SESSION['sesa'];

        $query = sprintf("UPDATE data_quarantine SET sector='%s', family='%s', reference='%s', loc='%s', remark='%s', date_insert='%s', due_date='%s', sesa_insert='%s' WHERE `serial_number`='%s'", $sector, $family, $reference, $loc, $remark, $date_insert, $due_date, $sesa, $_GET['serial_number']);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            echo "Record edited successfully";
            header("location: view.php?viewSampleNDF=1&successEditNDF=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
// END OF UPDATE TABEL FOR SAMPLE NDF

// UPDATE TABEL FOR SAMPLE MANUFACTURING
    }elseif (isset($_GET['ManufacturingEdit'])) {
    $sector = isset($_POST['sector']) ? $_POST['sector'] : '';
    $family = isset($_POST['family']) ? $_POST['family'] : '';
    $reference = isset($_POST['reference']) ? $_POST['reference'] : '';
    $loc = isset($_POST['loc']) ? $_POST['loc'] : '';
    $remark = 'manufacturing';
    $date_insert = isset($_POST['date_insert']) ? $_POST['date_insert'] : '';
    $due_date = date('y-m-d', strtotime('+3 month', strtotime($_POST['date_insert'])));
    $sesa = $_SESSION['sesa'];

    $query = sprintf("UPDATE data_quarantine SET sector='%s', family='%s', reference='%s', loc='%s', remark='%s', date_insert='%s', due_date='%s', sesa_insert='%s' WHERE `serial_number`='%s'", $sector, $family, $reference, $loc, $remark, $date_insert, $due_date, $sesa, $_GET['serial_number']);
    if ($GLOBALS['mysqli']->query($query) === TRUE) {
        echo "Record edited successfully";
        header("location: view.php?viewManufacturing=1&successEditManufacturing=1");
    } else {
        echo "Error: " . $GLOBALS['mysqli']->error;
    }
// END OF UPDATE TABEL FOR SAMPLE MANUFACTURING

// UPDATE USER
    } elseif (isset($_GET['userEdit'])) {
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $badge = isset($_POST['badge']) ? $_POST['badge'] : '';
        $sesa = isset($_POST['sesa']) ? $_POST['sesa'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $hak_akses = isset($_POST['hak_akses']) ? $_POST['hak_akses'] : '';
        if ($_POST['hak_akses'] == 'user') {
            $level = 1;
        } else {
            $level = 2;
        }
        $query = sprintf("UPDATE user SET nama= '%s', badge='%s', email='%s', password='%s', hak_akses='%s', level='%s'  WHERE `sesa`='%s'", $nama, $badge, $email, $password, $hak_akses, $level, $_GET['sesa']);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            echo "Record edited successfully";
            header("location: view.php?viewUser=1&successInsertUser=1&sesa=");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
// END OF UPDATE USER
    
// UPDATE TABEL FOR HOLD SCRAP
    }elseif (isset($_GET['holdScrap'])) {
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        // $serial_number = isset($_POST['serial_number']) ? $_POST['serial_number'] : '';

        // $query = sprintf("UPDATE data_quarantine SET status='%s' WHERE `serial_number`='%s'", $status, $_GET['serial_number']);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            // echo "Record edited successfully";
            header("location: view.php?viewHoldList=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
// END OF UPDATE TABEL FOR HOLD SCRAP

// CHANGE BACK STATUS INTO QUARANTINE
    }elseif (isset($_GET['StatusQuarantine'])) {
        // $serial_number = isset($_POST['serial_number']) ? $_POST['serial_number'] : '';

        $query = sprintf("UPDATE data_quarantine SET hold_date='%s', sesa_hold='%s', status='%s' WHERE `serial_number`='%s'", '', '', 'Quarantine', $_GET['serial_number']);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            echo "Record edited successfully";
            header("location: view.php?viewHoldList=1&successStatusQuarantine=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
// END OF CHANGE BACK STATUS INTO QUARANTINE


// UPDATE STATUS INTO HOLD DATA
    }elseif (isset($_GET['StatusHold'])) {
        $hold_date = date('y-m-d');
        $sesa_hold = $_SESSION['sesa'];

        $query = sprintf("SELECT * FROM data_quarantine WHERE `serial_number`='%s' LIMIT 1", $_POST['serial_number']);
            $result = $GLOBALS['mysqli']->query($query);
            if ($result->num_rows > 0) {
                $query1 = sprintf("UPDATE data_quarantine SET hold_date='%s', sesa_hold='%s', status='%s' WHERE `serial_number`='%s'", $hold_date, $sesa_hold, 'Hold', $_POST['serial_number']);
                if ($GLOBALS['mysqli']->query($query1) === TRUE) {
                    echo "Record edited successfully";
                    header("location: edit.php?editHoldList=1&successHold=1");
                } else {
                echo "Error: " . $GLOBALS['mysqli']->error;
                }
            } else {
                header("location: edit.php?editHoldList=1&failedHold=1");
            }
// END OF UPDATE STATUS HOLD

// UPDATE STATUS SCRAP
    }elseif (isset($_GET['StatusScrap'])) {
        $scrap_date = date('y-m-d');
        $sesa_scrap = $_SESSION['sesa'];

        $query = sprintf("SELECT serial_number FROM data_quarantine WHERE status='Hold' LIMIT 1");
            $result = $GLOBALS['mysqli']->query($query);
            if ($row = $result->fetch_assoc()) {
                $query1 = sprintf("UPDATE data_quarantine SET scrap_date='%s', sesa_scrap='%s', status='%s' WHERE `status`='Hold'", $scrap_date, $sesa_scrap, 'Scrapped');
                if ($GLOBALS['mysqli']->query($query1) === TRUE) {
                    echo "Record edited successfully";
                    header("location: view.php?viewScrap=1&successInsertScrap=1");
                } else {
                echo "Error: " . $GLOBALS['mysqli']->error;
                }
            } else {
                header("location: view.php?viewScrap=1&failedInsertScrap=1");
            }
// END OF UPDATE STATUS SCRAP

// UPDATE SCRAP DATA
    }elseif (isset($_GET['ScrapEdit'])) {

        $scrap_date = isset($_POST['scrap_date']) ? $_POST['scrap_date'] : '';
        $sesa_scrap = isset($_POST['sesa_scrap']) ? $_POST['sesa_scrap'] : '';

        $query = sprintf("UPDATE data_quarantine SET scrap_date='%s', sesa_scrap='%s' WHERE `serial_number`='%s'", $scrap_date, $sesa_scrap, $_GET['serial_number']);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            echo "Record edited successfully";
            header("location: view.php?viewScrap=1&successEditScrap=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
// END OF UPDATE SCRAP DATA
}