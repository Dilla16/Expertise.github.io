<body onload="alert()">


    <?php
    include('../components/header.php');
    $date = date('y-m-d');
    $days7 = date('y-m-d', strtotime('+7days'));
    $overdue = mysqli_num_rows($GLOBALS['mysqli']->query("SELECT * FROM data_quarantine WHERE `due_date`<'$date' and status='Quarantine'"));
    $sampleRTA = mysqli_num_rows($GLOBALS['mysqli']->query("SELECT * FROM data_quarantine WHERE `remark`='sample RTA'"));
    $sampleNDF = mysqli_num_rows($GLOBALS['mysqli']->query("SELECT * FROM data_quarantine WHERE `remark`='sample NDF'"));
    $manufacturing = mysqli_num_rows($GLOBALS['mysqli']->query("SELECT * FROM data_quarantine WHERE `remark`='manufacturing'"));
    ?>
    <div id="container">
        <div class="judul">Expertise Quarantine</div>
        <div class="container ms-auto">
            <div class="card card-custom">
                <div class="card-body card-body-custom">
                    <div class="card-title card-title-custom">Sample RTA</div>
                    <div class="card-text card-text-custom"><?php echo $sampleRTA; ?></div>
                    <div class="card-bottom-custom">Overdue RTA on quarantine</div>
                </div>
            </div>
            <div class="card card-custom">
                <div class="card-body card-body-custom">
                    <div class="card-title card-title-custom">Sample NDF</div>
                    <div class="card-text card-text-custom"><?php echo $sampleNDF; ?></div>
                    <div class="card-bottom-custom">Sample No Defect Found</div>
                </div>
            </div>
            <div class="card card-custom">
                <div class="card-body card-body-custom">
                    <div class="card-title card-title-custom">Sample Manufacturing</div>
                    <div class="card-text card-text-custom"><?php echo $manufacturing; ?></div>
                    <div class="card-bottom-custom">Sample Manufacturing</div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Notification!</h5>
        
      </div>
      <div class="modal-body">
        <div class="text-center">
            <h5>Qty of Overdue samples :</h5>
            <br>
            <h1><?php echo $overdue, '&nbsp;pcs'; ?></h1>
            <br>
            <h5>please do disposal by today!</h5>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- NED OF MODAL -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function alert() {
            $("#myModal").modal('show');

        }
    </script>
    <?php 
    include('../components/footer.php');
    ?>
</body>