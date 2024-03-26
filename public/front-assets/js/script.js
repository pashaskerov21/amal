$(function () {
  $(".menu-icon").click(function(){
    $(".header-bottom").addClass("show");
  })
  $(".mobile-menu-close").click(function(){
    $(".header-bottom").removeClass("show");
  })
  $(".radio-label").click(function(){
    $(".radio-label").removeClass("active");
    $(this).addClass("active");
  })

  let amongCount = $("#among-count").data().value;
  let amongTotal = $("#among-future-total").data().value;
  let $range = $(".range");
  const calculateTotalPercent = (value1, value2) => {
    return (value1 / value2) * 100;
  };
  let percent = calculateTotalPercent(amongCount, amongTotal);
  $range.val(percent);

  $range.each(function () {
    var $thumb = $(this).next(".range-thumb");
    var max = parseInt(this.max, 10);
    var tw = 100;
    $(this).on("input input.range", function () {
      var w = $(this).width();
      var val = parseInt(this.value, 10);
      var txt = val >= max ? "∞" : val;
      var xPX = (val * (w - tw)) / max;
      $thumb.css({ left: xPX }).attr("data-val", txt);
    });
  });

  $range.trigger("input.range");
  $(window).on("resize", () => $range.trigger("input.range"));


});
document.addEventListener("DOMContentLoaded", function () {
  const categoriesTypes = document.querySelector(".project-categories-types");
  const projects = document.querySelectorAll(".single-project");

  categoriesTypes.addEventListener("click", function (e) {
    if (e.target.tagName === "LI") {
      const selectedCategory = e.target.id;
      projects.forEach((project) => {
        const completedButton = project.querySelector(".completed");
        const activeButton = project.querySelector(".active");

        if (selectedCategory === "completed") {
          project.style.display = completedButton ? "flex" : "none";
        } else if (selectedCategory === "current") {
          project.style.display = activeButton ? "flex" : "none";
        } else {
          project.style.display = "flex";
        }
      });

      const allLiElements = categoriesTypes.querySelectorAll("li");
      allLiElements.forEach((li) => li.classList.remove("active"));
      e.target.classList.add("active");
    }
  });

  $('[data-fancybox]').fancybox({
    buttons : [
      'close'
    ],
    wheel : false,
    transitionEffect: "slide",
    loop            : true,
    toolbar         : false,
    clickContent    : false
  });
});
