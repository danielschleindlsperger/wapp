$(document).ready(function () {

  // Show confirmation modal
	$('#delete-button').click(function () {
		$('#modal-confirm-delete').modal('toggle');
	});

	// $('#delete-for-sure').click(function () {
  //   var url = $('#delete-button').attr('data-url');
	// 	console.log('Delete for sure. \n' + url);
  //   $.ajax({
  //     type: 'POST',
  //     url: url + '.json',
  //     success: function(res){
  //       console.log(res);
  //       // if(res.error === 'none'){
  //       //   window.location.href = res.redirect;
  //       // }else{
  //       //
  //       // }
  //     },
  //     error: function(e){
  //       alert('An error occurred: ' + e.message);
  //       console.log('Error: ' + e.message)
  //     }
  //   });
	// });
});
