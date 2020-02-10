$(document).ready(function(){
      $(".banner a#login").click(function () {
          $("#myModal").modal();
      });

  $("#mylink").click(function () {
    $("#myModal").hide();
    $("#myModalsignup").modal();
      });

      $('#user_login').change(function () {
          var user = $(this).children('option:checked').data('user');
          $('form.active').removeClass('active');
          $('form#' + user).addClass('active');
      });

      $('#user_signup').change(function () {
          var user = $(this).children('option:checked').data('user');
          $('form.active').removeClass('active');
          $('form#' + user).addClass('active');
      });

      $(".modal-footer p a").click(function () {
          $(".modal-footer form").show();
      });
    });

    $('.frame').click(function(){
        $('.top').addClass('open');
        $('.message').addClass('pull');
    })

    // contact us

    function countChar(val) {
  var len = val.value.length;
  if (len >= 90) {
    val.value = val.value.substring(0, 90);
  } else {
    $("#charNum").text(90 - len);
  }
}

$("textarea").change(function(){
  if ($("textarea").val() !== 0) {
    $(this).css("opacity", "0.8");
  }
});