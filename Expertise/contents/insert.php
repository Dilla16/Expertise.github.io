<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<body>
    <?php include('../components/header.php'); ?>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7S mx-auto mt-5">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <!-- INSERT RTA -->
                                <?php if (isset($_GET['insertRTA'])) { ?>
                                <h1 class="card-title text-center fw-bold fs-3">Data Quarantine</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5">Insert</h5>
                                <?php if (isset($_GET['successinsertRTA'])) { ?>
                                    <div class="alert alert-success text-center" role="alert">
                                        New record created successfully!
                                        <?php echo "<meta http-equiv='refresh' content='2; url=insert.php?insertRTA=1'>"; ?>
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET['failedinsertRTA'])) { ?>
                                    <div class="alert alert-danger text-center" role="alert">
                                        Failed to insert data, Duplicate Serial Number!
                                        <?php echo "<meta http-equiv='refresh' content='2; url=insert.php?insertRTA=1'>"; ?>
                                    </div>
                                <?php } ?>
                                <form class="mx-5" method="POST" action="create.php">
                                    <input type="text" hidden name="type" value="quarantineInsert">
                                    <div class="form-group d-flex mx-auto mb-4">
                                        <div class="mb-3 col-sm-4">
                                            <label for="serial_number" class="form-label fw-bold">Serial Number</label>
                                            <input required name="serial_number" type="text" id="serial_number" onkeyup="autofill()" class="form-control" placeholder="Scan Serial Number" autofocus autocomplete="off">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="localtion" class="form-label fw-bold">Location</label>
                                            <input required name="location" type="text" class="form-control" id="location" placeholder="Scan Location">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="localtion" class="form-label fw-bold">Label Nameplate</label>
                                            <input required name="nameplate_serial_number" type="text" class="form-control" id="nameplate_serial_number" placeholder="Nameplate Serial" readonly> 
                                        </div>
                                        <!-- <div class="mb-3 col-sm-4">
                                            <label for="date_insert" class="form-label fw-bold">Date Insert</label>
                                            <input required name="date_insert" type="text" class="form-control" value="<? date('y-m-d'); ?>" id="date_insert" readonly>
                                        </div> -->
                                    </div>
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
                                    

                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                            <!-- END OF INSERT RTA -->


                            <!-- INSERT NDF SAMPLE -->
                                <?php } elseif (isset($_GET['insertSampleNDF'])) { ?>
                                    <h1 class="card-title text-center fw-bold fs-3">Data Sample NDF</h1>
                                    <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5">Insert</h5>
                                    <?php if (isset($_GET['successinsertinsertSampleNDF'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            New record created successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=insert.php?insertSampleNDF=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedinsertinsertSampleNDF'])) { ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Failed to insert data, Duplicate Serial Number!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=insert.php?insertSampleNDF=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <form class="mx-5" method="POST" action="create.php">
                                        <input type="text" hidden name="type" value="insertSampleNDF">
                                        <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="serial_number" class="form-label fw-bold">Serial Number</label>
                                            <input required name="serial_number" type="text" id="serial_number" onkeyup="autofill()" class="form-control" placeholder="Scan Serial Number" autofocus autocomplete="off">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="localtion" class="form-label fw-bold">Location</label>
                                            <input required name="location" type="text" class="form-control" id="location" placeholder="Scan Location">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="localtion" class="form-label fw-bold">Label Nameplate</label>
                                            <input required name="nameplate_serial_number" type="text" class="form-control" id="nameplate_serial_number" placeholder="Type Nameplate Serial">
                                        </div>
                                        <!-- <div class="mb-3 col-sm-4">
                                            <label for="date_insert" class="form-label fw-bold">Date Insert</label>
                                            <input required name="date_insert" type="text" class="form-control" value="<? date('y-m-d'); ?>" id="date_insert" readonly>
                                        </div> -->
                                    </div>
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

                                        <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                    </form>
                            <!-- END OF INSERT SAMPLE NDF -->


                            <!-- INSERT MANUFACTURING SAMPLE -->
                                <?php } elseif (isset($_GET['insertManufacturing'])) { ?>
                                    <h1 class="card-title text-center fw-bold fs-3">Data Sample MANUFACTURING</h1>
                                    <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5">Insert</h5>
                                    <?php if (isset($_GET['successinsertManufacturing'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            New record created successfully!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=insert.php?insertManufacturing=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['failedinsertManufacturing'])) { ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            Failed insert data!
                                            <?php echo "<meta http-equiv='refresh' content='2; url=insert.php?insertManufacturing=1'>"; ?>
                                        </div>
                                    <?php } ?>
                                    <form class="mx-5" method="POST" action="create.php">
                                        <input type="text" hidden name="type" value="insertManufacturing">
                                        <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="serial_number" class="form-label fw-bold">Serial Number</label>
                                            <input required name="serial_number" type="text" id="serial_number" onkeyup="autofill()" class="form-control" placeholder="Scan Serial Number" autofocus autocomplete="off">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="localtion" class="form-label fw-bold">Location</label>
                                            <input required name="location" type="text" class="form-control" id="location" placeholder="Scan Location">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="localtion" class="form-label fw-bold">Label Nameplate</label>
                                            <input required name="nameplate_serial_number" type="text" class="form-control" id="nameplate_serial_number" placeholder="Type Nameplate Serial">
                                        </div>
                                        <!-- <div class="mb-3 col-sm-4">
                                            <label for="date_insert" class="form-label fw-bold">Date Insert</label>
                                            <input required name="date_insert" type="text" class="form-control" value="<? date('y-m-d'); ?>" id="date_insert" readonly>
                                        </div> -->
                                    </div>
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

                                        <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                    </form>
                            <!-- END OF INSERT SAMPLE MANUFACTURING -->


                            <!-- INSERT USER -->
                                <?php } elseif (isset($_GET['insertUser'])) { ?>
                                <h1 class="card-title text-center fw-bold fs-3">Data User</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5">Insert</h5>
                                <form class="mx-5" method="POST" action="create.php">
                                    <input type="text" hidden name="type" value="userInsert">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="nama" class="form-label fw-bold">Nama</label>
                                            <input required name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="badge" class="form-label fw-bold">Badge</label>
                                            <input required name="badge" type="text" class="form-control" id="badge" placeholder="Nomor ID">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="sesa" class="form-label fw-bold">Sesa</label>
                                            <input required name="sesa" type="text" class="form-control" id="sesa" placeholder="Masukkan sesa">
                                        </div>

                                    </div>
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="email" class="form-label fw-bold">Email</label>
                                            <input required name="email" type="text" class="form-control" id="email" placeholder="Masukkan email">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="password" class="form-label fw-bold">Password</label>
                                            <input required name="password" type="text" class="form-control" id="password" placeholder="Masukkan password">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="hak_akses" class="form-label fw-bold">Hak Akses</label>
                                            <select class="form-select" aria-label=".form-select-sm example" id="hak_akses" name="hak_akses">
                                                <option hidden>Pilih Hak akses</option>
                                                <option value="1">User</option>
                                                <option value="2">Admin</option>
                                                <option value="3">Owner</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                            <!-- END OF INSERT USER -->

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function autofill() {
            var serial_number = $("#serial_number").val();
            $.ajax({
                url: 'autofill.php',
                data: 'serial_number=' + serial_number,
                success: function(data) {
                    var json = data,
                        obj = JSON.parse(json);
                    $('#sector').val(obj.sector);
                    $('#family').val(obj.family);
                    $('#reference').val(obj.reference);
                    $('#nameplate_serial_number').val(obj.nameplate_serial_number);
                }
            });
        }
    </script>
    <?php include('../components/footer.php'); ?>
</body>