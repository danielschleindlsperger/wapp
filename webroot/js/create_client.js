$('#create-client-submit').click(function(){

  // Get form data for company
  var company_name = $('#company_name').val();
  var street = $('#street').val();
  var street_number = $('#street_number').val();
  var postal_code = $('#postal_code').val();
  var city = $('#city').val();
  var country = $('#country').val();

  // Get form data for contact person
  var first_name = $('#first_name').val();
  var last_name = $('#last_name').val();
  var phone = $('#phone').val();
  var fax = $('#fax').val();
  var email = $('#email').val();

  console.log(BaseUrl);

  $.ajax(BaseUrl+'clients/create', {
    data: {
      company_name: company_name,
      street: street,
      street_number: street_number,
      postal_code: postal_code,
      city: city,
      country: country,
      first_name: first_name,
      last_name: last_name,
      phone: phone,
      fax: fax,
      email: email
    },
    method: 'POST'
  });
});
