<?php
$GLOBALS['SYSTEM_CONNECT_DB'] = true;
$GLOBALS['SYSTEM_USE_SESSION'] = true;
include('../boot.php');

// DELETE USER
    if (isset($_GET['userDelete'])) {
        $query = sprintf("DELETE FROM user WHERE `sesa`='%s'", $_GET['sesa']);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            header("location: View.php?viewUser=1&successDeleteUser=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
// END OF DELETE USER

// DELETE QUARANTINE
    } elseif (isset($_GET['quarantineDelete'])) {
        $query = sprintf("DELETE FROM data_quarantine WHERE `serial_number`='%s'", $_GET['serial_number']);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            header("location: View.php?viewRTA=1&successDeleteQuarantine=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
// END OF DELETE QUARANTINE

// DELETE SAMPLE NDF
    } elseif (isset($_GET['NDFDelete'])) {
        $query = sprintf("DELETE FROM data_quarantine WHERE `serial_number`='%s'", $_GET['serial_number']);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            header("location: View.php?viewSampleNDF=1&successDeleteNDF=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
// END OF DELETE SAMPLE NDF

// DELETE SAMPLE MANUFACTURING
    } elseif (isset($_GET['ManufacturingDelete'])) {
        $query = sprintf("DELETE FROM data_quarantine WHERE `serial_number`='%s'", $_GET['serial_number']);
        if ($GLOBALS['mysqli']->query($query) === TRUE) {
            header("location: View.php?viewManufacturing=1&successDeleteManufacturing=1");
        } else {
            echo "Error: " . $GLOBALS['mysqli']->error;
        }
// END OF DELETE SAMPLE MANUFACTURING

// DELETE SAMPLE SCRAP
} elseif (isset($_GET['ScrapDelete'])) {
    $query = sprintf("DELETE FROM data_quarantine WHERE `serial_number`='%s'", $_GET['serial_number']);
    if ($GLOBALS['mysqli']->query($query) === TRUE) {
        header("location: View.php?viewScrap=1&successDeleteScrap=1");
    } else {
        echo "Error: " . $GLOBALS['mysqli']->error;
    }
// END OF DELETE SAMPLE MANUFACTURING

}
