<body>
    <?php
    include('../components/header.php');
    ?>
    <div id="content">

        <!-- Three columns of text below the carousel -->

    <!-- CODE VIEW DATA -->
        <div class="row mb-5">
            <div class="col-lg-12 mx-auto">

            <!-- VIEW RTA -->
                <?php if (isset($_GET['viewRTA'])) { ?>
                    <h1 class="text-center">Data Quarantine</h1>
                    <h1 class="text-center mb-3 mt-3">
                        <a href="Insert.php?insertRTA=1" class="btn btn-success text-white">Tambah Data</a>
                    </h1>
                    <!-- ALERT EDIT -->
                                    <?php if (isset($_GET['successEditQuarantine'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record edited successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewRTA=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedEditQuarantine'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to edit data!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewRTA=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT EDIT -->

                                    
                    <!-- ALERT DELETE -->
                                    <?php if (isset($_GET['successDeleteQuarantine'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record deleted successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewRTA=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedDeleteQuarantine'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to delete data!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewRTA=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT DELETE -->

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Loc</th>
                                <th>Sector</th>
                                <th>Family</th>
                                <th>Reference</th>
                                <th>Serial No.</th>
                                <th>date Insert</th>
                                <th>Due Date</th>
                                <th>Sesa</th>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM data_quarantine where status='quarantine' AND remark='sample RTA'order by `due_date` ASC");
                            $result = $GLOBALS['mysqli']->query($query);
                            $idx = 1;
                            ?>
                            <?php while ($row = $result->fetch_assoc()) {
                                if (($row['due_date']) <= date('Y-m-d')) {
                                    echo  "<tr style='background-color:red;'>";
                                } else {
                                    echo  "<tr>";
                                }
                            ?>
                                <td><?= $idx++ ?></td>
                                <td><?= $row['loc'] ?></td>
                                <td><?= $row['sector'] ?></td>
                                <td><?= $row['family'] ?></td>
                                <td><?= $row['reference'] ?></td>
                                <td><?= $row['nameplate_serial_number'] ?></td>
                                <td><?= $row['date_insert'] ?></td>
                                <td><?= $row['due_date'] ?></td>
                                <td><?= $row['sesa_insert'] ?></td>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <td>
                                        <a href="Edit.php?quarantineEdit=1&serial_number=<?= $row['serial_number'] ?>" class='edit'><i class='fa fa-edit' data-toggle='tooltip' title='Edit'></i></a>
                                        <a href="Delete.php?quarantineDelete=1&serial_number=<?= $row['serial_number'] ?>" id="delete" class='delete alert_delete'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></a>
                                    </td>
                                <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW RTA -->


            <!-- VIEW SAMPLE NDF -->
                <?php } elseif (isset($_GET['viewSampleNDF'])) { ?>
                    <h1 class="text-center">Data Sample NDF</h1>
                    <h1 class="text-center mb-3 mt-3">
                        <a href="Insert.php?insertSampleNDF=1" class="btn btn-success text-white">Tambah Data</a>
                    </h1>
                    <!-- ALERT EDIT -->
                    <?php if (isset($_GET['successEditNDF'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record edited successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewSampleNDF=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedEditNDF'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to edit data!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewSampleNDF=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT EDIT -->

                                    
                    <!-- ALERT DELETE -->
                                    <?php if (isset($_GET['successDeleteNDF'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record deleted successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewSampleNDF=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedDeleteNDF'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to delete data!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewSampleNDF=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT DELETE -->

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Loc</th>
                                <th>Sector</th>
                                <th>Family</th>
                                <th>Reference</th>
                                <th>Serial No.</th>
                                <th>Sesa</th>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM data_quarantine where status='quarantine' AND remark='sample NDF'order by `due_date` ASC");
                            $result = $GLOBALS['mysqli']->query($query);
                            $idx = 1;
                            ?>
                            <?php while ($row = $result->fetch_assoc()) {
                                if (($row['due_date']) <= date('Y-m-d')) {
                                    echo  "<tr style='background-color:red;'>";
                                } else {
                                    echo  "<tr>";
                                }
                            ?>
                                <td><?= $idx++ ?></td>
                                <td><?= $row['loc'] ?></td>
                                <td><?= $row['sector'] ?></td>
                                <td><?= $row['family'] ?></td>
                                <td><?= $row['reference'] ?></td>
                                <td><?= $row['nameplate_serial_number'] ?></td>
                                <td><?= $row['sesa_insert'] ?></td>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <td>
                                        <a href="Edit.php?NDFEdit=1&serial_number=<?= $row['serial_number'] ?>" class='edit'><i class='fa fa-edit' data-toggle='tooltip' title='Edit'></i></a>
                                        <a href="Delete.php?NDFDelete=1&serial_number=<?= $row['serial_number'] ?>" id="delete" class='delete alert_delete'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></a>
                                    </td>
                                <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW SAMPLE NDF -->


            <!-- VIEW SAMPLE MANUFACTURING -->
                <?php } elseif (isset($_GET['viewManufacturing'])) { ?>
                    <h1 class="text-center">Data Sample Manufacturing</h1>
                    <h1 class="text-center mb-3 mt-3">
                        <a href="Insert.php?insertManufacturing=1" class="btn btn-success text-white">Tambah Data</a>
                    </h1>
                    <!-- ALERT EDIT -->
                    <?php if (isset($_GET['successEditManufacturing'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record edited successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewManufacturing=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedEditManufacturing'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to edit data!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewManufacturing=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT EDIT -->

                                    
                    <!-- ALERT DELETE -->
                                    <?php if (isset($_GET['successDeleteManufacturing'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record deleted successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewManufacturing=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedDeleteManufacturing'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to delete data!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewManufacturing=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT DELETE -->

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Loc</th>
                                <th>Sector</th>
                                <th>Family</th>
                                <th>Reference</th>
                                <th>Serial No.</th>
                                <th>Sesa</th>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM data_quarantine where status='quarantine' AND remark='manufacturing'order by `due_date` ASC");
                            $result = $GLOBALS['mysqli']->query($query);
                            $idx = 1;
                            ?>
                            <?php while ($row = $result->fetch_assoc()) {

                            ?>
                                <tr>
                                <td><?= $idx++ ?></td>
                                <td><?= $row['loc'] ?></td>
                                <td><?= $row['sector'] ?></td>
                                <td><?= $row['family'] ?></td>
                                <td><?= $row['reference'] ?></td>
                                <td><?= $row['nameplate_serial_number'] ?></td>
                                <td><?= $row['sesa_insert'] ?></td>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <td>
                                        <a href="Edit.php?ManufacturingEdit=1&serial_number=<?= $row['serial_number'] ?>" class='edit'><i class='fa fa-edit' data-toggle='tooltip' title='Edit'></i></a>
                                        <a href="Delete.php?ManufacturingDelete=1&serial_number=<?= $row['serial_number'] ?>" id="delete" class='delete alert_delete'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></a>
                                    </td>
                                <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW SAMPLE MANUFACTURING -->


            <!-- VIEW SAMPLE HOLD SCRAP -->
                  <?php } elseif (isset($_GET['viewHoldList'])) { ?>
                    <h1 class="text-center">Data Hold Scrap</h1>
                    
                    <h1 class="text-center mb-3 mt-3">
                        <a href="Edit.php?editHoldList=1" class="btn btn-success text-white">Tambah Data</a>
                        <?php if ($_SESSION['level'] == 2 ) { ?>
                        <a href="update.php?StatusScrap=1" class="btn btn-danger text-white">Scrap All</a>
                        <?php } ?>
                    </h1>
                    
                    <!-- ALERT EDIT -->
                    <?php if (isset($_GET['successStatusQuarantine'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Successfully cancel hold!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewHoldList=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedStatusQuarantine'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to cancel hold!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewHoldList=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT EDIT -->

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Loc</th>
                                <th>Reference</th>
                                <th>Serial No.</th>
                                <th>Date Hold</th>
                                <th>Sesa Hold</th>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM data_quarantine where status='hold' order by `hold_date` ASC");
                            $result = $GLOBALS['mysqli']->query($query);
                            $idx = 1;
                            ?>
                            <?php while ($row = $result->fetch_assoc()) {

                            ?>
                                <tr>
                                <td><?= $idx++ ?></td>
                                <td><?= $row['loc'] ?></td>
                                <td><?= $row['reference'] ?></td>
                                <td><?= $row['nameplate_serial_number'] ?></td>
                                <td><?= $row['hold_date'] ?></td>
                                <td><?= $row['sesa_hold'] ?></td>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <td>
                                        <a href="EDit.php?editScrap=1&serial_number=<?= $row['serial_number'] ?>" id="edit" class='delete alert_delete'><i class='fa fa-undo' data-toggle='tooltip' title='Cancel hold'></i></a>
                                        <a href="Edit.php?quarantineEdit=1&serial_number=<?= $row['serial_number'] ?>" class='edit'><i class='fa fa-trash' data-toggle='tooltip' title='Edit'></i></a>
                                        
                                    </td>
                                <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW SAMPLE HOLD SCRAP -->


            <!-- VIEW USER -->
                <?php } elseif (isset($_GET['viewUser'])) { ?>
                    <h1 class="text-center">Data User</h1>
                    <h1 class="text-center mb-3 mt-3">
                        <a href="Insert.php?insertUser=1" class="btn btn-success text-white">Tambah Data</a>
                    </h1>
                    <!-- ALERT INSERT -->
                    <?php if (isset($_GET['successInsertUser'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record successfully added!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewUser=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedInsertUser'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to add data, try again with another sesa!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewUser=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT INSERT -->

                    <!-- ALERT EDIT -->
                    <?php if (isset($_GET['successEditUser'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record edited successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewUser=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedEditUser'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to edit data!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewUser=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT EDIT -->

                                    
                    <!-- ALERT DELETE -->
                                    <?php if (isset($_GET['successDeleteUser'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record deleted successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewUser=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedDeleteUser'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to delete data!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewUser=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT DELETE -->
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Akses</th>
                                <th>Sesa</th>
                                <th>Badge</th>
                                <th>Nama</th>
                                <th>Email</th>

                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM user order by `sesa` DESC");
                            $result = $GLOBALS['mysqli']->query($query);
                            $idx = 1;
                            ?>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $idx++ ?></td>
                                    <td><?= $row['hak_akses'] ?></td>
                                    <td><?= $row['sesa'] ?></td>
                                    <td><?= $row['badge'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['email'] ?></td>

                                    <?php if ($_SESSION['level'] == 2) { ?>
                                        <td>
                                            <a href="Edit.php?userEdit=1&sesa=<?= $row['sesa'] ?>" class='edit'><i class='fa fa-edit' data-toggle='tooltip' title='Edit'></i></a>
                                            <a href="Delete.php?userDelete=1&sesa=<?= $row['sesa'] ?>" class='delete'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW USER -->

            
            <!-- VIEW SCRAP -->
                <?php } elseif (isset($_GET['viewScrap'])) { ?>
                    <h1 class="text-center">Data Scrap</h1>
                    <h1 class="text-center mb-3 mt-3">
                    <?php if ($_SESSION['level'] == 2 ) { ?>
                        <a href="view.php?viewHoldList=1" class="btn btn-success text-white">Tambah Data</a>
                        <?php } ?>
                    </h1>
                    <!-- ALERT INSERT -->
                    <?php if (isset($_GET['successInsertScrap'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record successfully added!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewScrap=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedInsertScrap'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to add data, try again!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewScrap=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT INSERT -->

                    <!-- ALERT DELETE -->
                    <?php if (isset($_GET['successDeleteScrap'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record deleted successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewScrap=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedDeleteScrap'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to delete data, try again!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewScrap=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT DELETE -->

                    <!-- ALERT EDIT -->
                    <?php if (isset($_GET['successEditScrap'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Record deleted successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewScrap=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedEditScrap'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to delete data, try again!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=view.php?viewScrap=1'>"; ?>
                                        </div>
                                    <?php } ?>
                    <!-- END OF ALERT EDIT -->
                    
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sector</th>
                                <th>Reference</th>
                                <th>Serial Number</th>
                                <th>Scrap Date</th>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <th>Sesa Scrap</th>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM data_quarantine where status='Scrapped' order by `scrap_date` ASC");
                            $result = $GLOBALS['mysqli']->query($query);
                            $idx = 1;
                            ?>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $idx++ ?></td>
                                    <td><?= $row['sector'] ?></td>
                                    <td><?= $row['reference'] ?></td>
                                    <td><?= $row['nameplate_serial_number'] ?></td>
                                    <td><?= $row['scrap_date'] ?></td>
                                    <?php if ($_SESSION['level'] == 2) { ?>
                                        <td><?= $row['sesa_scrap'] ?></td>
                                        <td>
                                        <a href="edit.php?ScrapEdit=1&serial_number=<?= $row['serial_number'] ?>" class='edit'><i class='fa fa-edit' data-toggle='tooltip' title='Edit'></i></a>
                                        <a href="Delete.php?deleteScrap=1&serial_number=<?= $row['serial_number'] ?>" id="delete" class='delete alert_delete'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW SCRAP -->


                <?php } ?>

            <!-- MODAL SCRAP -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg pt-5">
                        <!-- konten modal-->
                        <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                            <h4 class="modal-title">Scrap Barang</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                            <form class="mx-5" method="POST" action="create.php">
                                    <input type="text" hidden name="type" value="scrapInsert">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-10">
                                            <label for="serial_number" class="form-label fw-bold">Serial Number</label>
                                            <input title="Scan product's serial" required name="serial_number" type="text" class="form-control" id="serial_number" placeholder="Scan Serial Number" autocomplete="off">
                                        </div>
                                        <div class="mb-3 col-sm-2 align-self-end">
                                            <button type="submit" class="btn btn-primary btn-block mx-auto ">Submit</button>
                                        </div>
                                    </div>
                            </form>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-default btn-seccess" data-dismiss="modal">Tutup Modal</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END OF MODAL SCRAP -->

            <!-- MODAL INSERT RTA -->
                    <div id="InsertRTA" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg pt-5">
                        <!-- konten modal-->
                        <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                            <h4 class="modal-title">Scrap Barang</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                            <form class="mx-5" method="POST" action="create.php">
                                    <input type="text" hidden name="type" value="quarantineInsert">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="sector" class="form-label fw-bold">Sector</label>
                                            <input required name="sector" type="text" class="form-control" id="sector" placeholder="Data Sector" <?php if ($_SESSION['level'] == 1) { ?>readonly <?php } ?>>
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="family" class="form-label fw-bold">Family</label>
                                            <input required name="family" type="text" class="form-control" id="family" placeholder="Data Family" <?php if ($_SESSION['level'] == 1) { ?>readonly <?php } ?>>
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="reference" class="form-label fw-bold">Reference</label>
                                            <input required name="reference" type="text" class="form-control" id="reference" placeholder="Data Reference" <?php if ($_SESSION['level'] == 1) { ?>readonly <?php } ?>>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex mx-auto mb-4">
                                        <div class="mb-3 col-sm-6">
                                            <label for="serial_number" class="form-label fw-bold">Serial Number</label>
                                            <input required name="serial_number" type="text" id="serial_number" onkeyup="autofill()" class="form-control" placeholder="Scan Serial Number" autofocus autocomplete="off">
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label for="localtion" class="form-label fw-bold">Location</label>
                                            <input required name="location" type="text" class="form-control" id="location" placeholder="Scan Location" >
                                        </div>
                                        <!-- <div class="mb-3 col-sm-4">
                                            <label for="date_insert" class="form-label fw-bold">Date Insert</label>
                                            <input required name="date_insert" type="text" class="form-control" value="<? date('y-m-d'); ?>" id="date_insert" readonly>
                                        </div> -->
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-default btn-seccess" data-dismiss="modal">Tutup Modal</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END OF MODAL INSERT RTA -->


            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

    <!-- END OF CODE VIEW DATA -->
    
    </div><!-- /.content -->


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#delete').on('click', function() {
            // var getLink = $(this).attr('href');
            Swal.fire({
                title: "Yakin hapus data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonColor: '#3085d6',
                cancelButtonText: "Batal"

            })
            // .then(result => {
            //     //jika klik ya maka arahkan ke proses.php
            //     if (result.isConfirmed) {
            //         window.location.href = getLink
            //     }
            // })
            // return false;
        });
    </script>
    <?php include('../components/footer.php'); ?>
</body>