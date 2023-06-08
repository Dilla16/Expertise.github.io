<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>
    <?php include('../components/header.php');
    ?>


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7S mx-auto mt-5">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">

                        <!-- EDIT DATA QUARANTINE -->
                            <?php if (isset($_GET['quarantineEdit'])) {
                                $query = sprintf("SELECT * FROM data_quarantine WHERE `serial_number`='%s' LIMIT 1", $_GET['serial_number']);
                                $result = $GLOBALS['mysqli']->query($query);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                }
                                if (isset($_GET['quarantineSuccess'])) { ?>
                                    <div class="alert text-center alert-success" role="alert">
                                        Data berhasil di record
                                    </div>
                                <?php } ?>
                                <h1 class="card-title text-center fw-bold fs-3">Edit Data Quarantine</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5"><?= $row['reference'] ?> (<?= $row['nameplate_serial_number'] ?>)</h5>
                                <form class="mx-5" method="POST" action="update.php?quarantineEdit=1&serial_number=<?= $row['serial_number'] ?>">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Sector</label>
                                            <input required name="sector" type="text" class="form-control" value="<?= $row['sector'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Family</label>
                                            <input required name="family" type="text" class="form-control" value="<?= $row['family'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Reference</label>
                                            <input required name="reference" type="text" class="form-control" value="<?= $row['reference'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex mx-auto mb-4">
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Location</label>
                                            <input required name="loc" type="text" class="form-control" id="loc" value="<?= $row['loc'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Date Insert</label>
                                            <input required name="date_insert" type="date" class="form-control" id="date_insert" value="<?= $row['date_insert'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Sesa Insert</label>
                                            <input required name="sesa" type="text" class="form-control" id="sesa" value="<?= $row['sesa_insert'] ?>" readonly>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                        <!-- END OF EDIT DATA QUARANTINE -->

                        <!-- EDIT DATA NDF -->
                            <?php } elseif (isset($_GET['NDFEdit'])) {
                                $query = sprintf("SELECT * FROM data_quarantine WHERE `serial_number`='%s' LIMIT 1", $_GET['serial_number']);
                                $result = $GLOBALS['mysqli']->query($query);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                } ?>
                                <h1 class="card-title text-center fw-bold fs-3">Edit Data NDF</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5"><?= $row['reference'] ?> (<?= $row['nameplate_serial_number'] ?>)</h5>
                                <form class="mx-5" method="POST" action="update.php?NDFEdit=1&serial_number=<?= $row['serial_number'] ?>">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Sector</label>
                                            <input required name="sector" type="text" class="form-control" value="<?= $row['sector'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Family</label>
                                            <input required name="family" type="text" class="form-control" value="<?= $row['family'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Reference</label>
                                            <input required name="reference" type="text" class="form-control" value="<?= $row['reference'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex mx-auto mb-4">
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Location</label>
                                            <input required name="loc" type="text" class="form-control" id="loc" value="<?= $row['loc'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Date Insert</label>
                                            <input required name="date_insert" type="date" class="form-control" id="date_insert" value="<?= $row['date_insert'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Sesa Insert</label>
                                            <input required name="sesa_insert" type="text" class="form-control" id="sesa_insert" value="<?= $row['sesa_insert'] ?>" readonly>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                        <!-- END OF EDIT DATA NDF -->

                        <!-- EDIT DATA MANUFACTURING -->
                            <?php } elseif (isset($_GET['ManufacturingEdit'])) {
                                $query = sprintf("SELECT * FROM data_quarantine WHERE `serial_number`='%s' LIMIT 1", $_GET['serial_number']);
                                $result = $GLOBALS['mysqli']->query($query);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                } ?>
                                <h1 class="card-title text-center fw-bold fs-3">Edit Data Manufacturing</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5"><?= $row['reference'] ?> (<?= $row['nameplate_serial_number'] ?>)</h5>
                                <form class="mx-5" method="POST" action="update.php?ManufacturingEdit=1&serial_number=<?= $row['serial_number'] ?>">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Sector</label>
                                            <input required name="sector" type="text" class="form-control" value="<?= $row['sector'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Family</label>
                                            <input required name="family" type="text" class="form-control" value="<?= $row['family'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Reference</label>
                                            <input required name="reference" type="text" class="form-control" value="<?= $row['reference'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex mx-auto mb-4">
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Location</label>
                                            <input required name="loc" type="text" class="form-control" id="loc" value="<?= $row['loc'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Date Insert</label>
                                            <input required name="date_insert" type="date" class="form-control" id="date_insert" value="<?= $row['date_insert'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Sesa Insert</label>
                                            <input required name="sesa_insert" type="text" class="form-control" id="sesa_insert" value="<?= $row['sesa_insert'] ?>" readonly>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                        <!-- END OF EDIT DATA MANUFACTURING -->

                        <!-- EDIT STATUS HOLD LIST BEFORE SCRAP -->
                            <?php } elseif (isset($_GET['editHoldList'])) { ?>
                                <h1 class="card-title text-center fw-bold fs-3">Data Hold Scrap</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5">Hold Scrap waiting Disposal</h5>
                                <?php if (isset($_GET['successHold'])) { ?>
                                    <div class="alert alert-success text-center" role="alert">
                                        Successfully change status into hold!
                                        <?php echo "<meta http-equiv='refresh' content='2; url=edit.php?editHoldList=1'>"; ?>
                                    </div>
                                <?php }
                                if (isset($_GET['failedHold'])) { ?>
                                    <div class="alert alert-danger text-center" role="alert">
                                        Failed to Hold Scrap, Serial Number not found or have been scrapped!
                                        <?php echo "<meta http-equiv='refresh' content='2; url=edit.php?editHoldList=1'>"; ?>
                                    </div>
                                <?php }?>
                                <form class="mx-5" method="POST" action="update.php?StatusHold=1">
                                    <input type="text" hidden name="type" value="StatusHold">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-10">
                                            <label for="serial_number" class="form-label fw-bold">Serial Number</label>
                                            <input required name="serial_number" type="text" class="form-control" id="serial_number" placeholder="Scan Serial Number" autofocus>
                                        </div>
                                        <div class="mb-3 col-sm-2 align-self-end">
                                            <button type="submit" class="btn btn-primary btn-block mx-auto ">Submit</button>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex mx-auto">
                                        <table id="tableScrap" class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Reference</th>
                                                    <th>Serial Number</th>
                                                    <th>Due Date</th>
                                                    <th>Loc</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = sprintf("SELECT * FROM data_quarantine WHERE status='Quarantine' order by `due_date` ASC");
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
                                                    <td><?= $row['reference'] ?></td>
                                                    <td><?= $row['serial_number'] ?></td>
                                                    <td><?= $row['due_date'] ?></td>
                                                    <td><?= $row['loc'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </form>
                        <!-- END OF EDIT STATUS HOLD LIST BEFORE SCRAP-->

                        <!-- EDIT SCRAP DATA -->
                            <?php } elseif (isset($_GET['ScrapEdit'])) {
                                $query = sprintf("SELECT * FROM data_quarantine WHERE `serial_number`='%s' LIMIT 1", $_GET['serial_number']);
                                $result = $GLOBALS['mysqli']->query($query);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                } ?>
                                <h1 class="card-title text-center fw-bold fs-3">Edit Data Scrap</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5"><?= $row['reference'] ?> (<?= $row['nameplate_serial_number'] ?>)</h5>
                                <form class="mx-5" method="POST" action="update.php?ScrapEdit=1&serial_number=<?= $row['serial_number'] ?>">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Sector</label>
                                            <input required name="sector" type="text" class="form-control" value="<?= $row['sector'] ?>" readonly>
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Family</label>
                                            <input required name="family" type="text" class="form-control" value="<?= $row['family'] ?>" readonly>
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Reference</label>
                                            <input required name="reference" type="text" class="form-control" value="<?= $row['reference'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex mx-auto mb-4">
                                    <div class="mb-3 col-sm-5 mx-auto">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Scrap Date</label>
                                            <input required name="scrap_date" type="text" class="form-control" id="scrap_date" value="<?= $row['scrap_date'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-5 mx-auto">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Sesa Scrap</label>
                                            <input required name="sesa_scrap" type="text" class="form-control" id="sesa_scrap" value="<?= $row['sesa_scrap'] ?>">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                        <!-- END OF EDIT SCRAP DATA-->                        

                        <!-- EDIT DATA USER -->
                                <?php } elseif (isset($_GET['userEdit'])) {
                                $query = sprintf("SELECT * FROM user WHERE `sesa`='%s' LIMIT 1", $_GET['sesa']);
                                $result = $GLOBALS['mysqli']->query($query);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                }?>
                                <h1 class="card-title text-center fw-bold fs-3">Data user</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5"><?= $row['nama'] ?> (<?= $row['sesa'] ?>)</h5>
                                <form class="mx-5" method="POST" action="update.php?userEdit=1&sesa=<?= $row['sesa'] ?>">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="nama" class="form-label fw-bold">Nama</label>
                                            <input required name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama" value="<?= $row['nama'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="badge" class="form-label fw-bold">Badge</label>
                                            <input required name="badge" type="text" class="form-control" id="badge" placeholder="Nomor ID" value="<?= $row['badge'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="sesa" class="form-label fw-bold">Sesa</label>
                                            <input required name="sesa" type="text" class="form-control" id="sesa" placeholder="Masukkan sesa" value="<?= $row['sesa'] ?>" readonly>
                                        </div>

                                    </div>
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="email" class="form-label fw-bold">Email</label>
                                            <input required name="email" type="text" class="form-control" id="email" placeholder="Masukkan email" value="<?= $row['email'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="password" class="form-label fw-bold">Password</label>
                                            <input required name="password" type="text" class="form-control" id="password" placeholder="Masukkan password" value="<?= $row['password'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="hak_akses" class="form-label fw-bold">Hak Akses</label>
                                            <select class="form-select" aria-label=".form-select-sm example" id="hak_akses" name="hak_akses">
                                                <?php
                                                if ($row['hak_akses'] == "admin") echo "<option value='admin' selected>admin</option>";
                                                else echo "<option value='admin'>admin</option>";

                                                if ($row['hak_akses'] == "user") echo "<option value='user' selected>user</option>";
                                                else echo "<option value='user'>user</option>";

                                                if ($row['hak_akses'] == "owner") echo "<option value='owner' selected>owner</option>";
                                                else echo "<option value='owner'>owner</option>";
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                        <!-- END OF EDIT DATA USER -->

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../components/footer.php'); ?>
</body>