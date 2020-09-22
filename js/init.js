(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('.parallax').parallax();

    $('#contactForm').submit((e) => {
      e.preventDefault();
      console.log('sending....');
      const data = {
        'full_name'       : $('#fullname').val(),
        'email'           : $('#email').val(),
        'phone'           : $('#contactNumber').val(),
        'inquiry_message' : $('#message').val(),
      };

      $.ajax({
        url     : 'be/leads/createLead.php',
        method  : 'POST',
        data
      }).success((res) => {
        console.log(res);
        Swal.fire({
          title: 'Message sent.',
          text: res.message,
          showConfirmButton: false,
          icon: 'success',
          timer: 1500,
        }).then(res => {
          $('#contactForm').trigger("reset");
        })
      }).error((xhr, status, error) => {
        const res = xhr.responseJSON;
        Swal.fire({
          title: 'Error sending Message.',
          text: res.message,
          showConfirmButton: false,
          icon: 'error',
          timer: 1500,
        })
      })
      .done(() => {
        console.log('request finished');
      })

    })


  

  }); // end of document ready
})(jQuery); // end of jQuery name space
