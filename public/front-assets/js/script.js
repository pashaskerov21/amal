document.addEventListener("DOMContentLoaded", function () {
  $(document).ready(function () {
    $(".menu-icon").click(function () {
      $(".header-bottom").addClass("show");
    });
    $(".mobile-menu-close").click(function () {
      $(".header-bottom").removeClass("show");
    });
    $(".radio-label").click(function () {
      $(".radio-label").removeClass("active");
      $(this).addClass("active");
    })
    $('[data-fancybox]').fancybox({
      buttons: ['close'],
      wheel: false,
      transitionEffect: "slide",
      loop: true,
      toolbar: false,
      clickContent: false
    });

    
    $('.project-categories-types li').click(function(){
      $('.project-categories-types li').removeClass('active')
      $(this).addClass('active');
      let status = $(this).data('status');
      if(status == 2){
        $('.project_row').removeClass('d-none');
      }else{
        $('.project_row').addClass('d-none');
        $(`.project_row[data-status="${status}"]`).removeClass('d-none');
      }
    });
  })
});
