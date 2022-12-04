$(document).ready(function () {
        $('#select-form').on('change', function (e) {
            var optionSelected = $(this).find(':selected');
            var targetID = optionSelected[0].dataset.target;

            // Aplicar classe d-none para div com classe selected
            $('.selected').addClass('d-none');

            // Remover classe selected da div com classe selected
            $('.selected').removeClass('selected');

            // Remover classe d-none para div com id target
            $(targetID).removeClass('d-none');

            // Aplicar classe selected para div com id target
            $(targetID).addClass('selected');
        });
    });

        $(document).ready(function(){

          $('.sub-btn').click(function(){
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
          });

          $('.menu-btn').click(function(){
            $('.side-bar').addClass('active');
            $('.menu-btn').css("visibility", "hidden");
          });

          $('.close-btn').click(function(){
            $('.side-bar').removeClass('active');
            $('.menu-btn').css("visibility", "visible");
          });

          $('#header-user').click(function(event) {
    $('#header-user').toggleClass('visible');
    event.stopPropagation();
    if ($('#header-notif').hasClass('visible')) {
      $('#header-notif').removeClass('visible');
    }
  });
  $(document).click(function(){
    $("#header-user").removeClass('visible');
    $('#header-notif').removeClass('visible');
  });

});