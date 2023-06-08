$(document).ready(function () {
  $('.userinfo').click(function () {
    var sesa = $(this).data('id');

    // AJAX request
    $.ajax({
      url: 'ajaxfile.php',
      type: 'post',
      data: { sesa: sesa },
      success: function (response) {
        // Add response in Modal body
        $('.modal-body').html(response);

        // Display Modal
        $('#empModal').modal('show');
      },
    });
  });
});
