$(document).ready(function () {

  // Show confirmation modal
	$('#delete-button').click(function () {
		$('#modal-confirm-delete').modal('toggle');
	});

	$('#delete-for-sure').click(function () {
    var url = $('#delete-button').attr('data-url');
		console.log('Delete for sure. \n' + url);
    $.ajax({
      type: 'POST',
      url: url,
      success: function(res){
        if(res.error === 'none'){

        }else{

        }
      },
      error: function(e){
        alert('An error occurred: ' + e.message);
        console.log('Error: ' + e.message)
      }
    });
	});
});
