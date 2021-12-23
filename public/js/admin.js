$(document).ready(function(){
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
      $(".main-wrapper").toggleClass("toggled");
    
    });
});

$(document).ready(function(){
  $('.table').dataTable();
});

$(document).ready(function(){
  $('.select').niceSelect();
});

$(document).ready(function(){
  $(".collapse.show").each(function(){
      $(this).prev(".nav-item").find("i").addClass("icofont-rounded-down").removeClass("icofont-rounded-right");
  });
  
  $(".collapse").on('show.bs.collapse', function(){
      $(this).prev(".nav-item").find("i").removeClass("icofont-rounded-right").addClass("icofont-rounded-down");
  }).on('hide.bs.collapse', function(){
      $(this).prev(".nav-item").find("i").removeClass("icofont-rounded-down").addClass("icofont-rounded-right");
  });
});