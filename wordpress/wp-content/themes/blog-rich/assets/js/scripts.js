(function ($) {
  "use strict";

  $.fn.blogEyeAccessibleDropDown = function () {
    var el = $(this);

    /* Make dropdown menus keyboard accessible */

    $("a", el)
      .focus(function () {
        $(this).parents("li").addClass("hover");
      })
      .blur(function () {
        $(this).parents("li").removeClass("hover");
      });
  };
  jQuery(document).ready(function ($) {
    $("#blog-rich-menu").blogEyeAccessibleDropDown();
  }); // end document ready

  window.addEventListener(
    "scroll",
    function (event) {
      var top = this.scrollY;
      if (top >= 30) {
        document.body.classList.add("scrolling");
      } else {
        document.body.classList.remove("scrolling");
      }
    },
    false
  );

  let aghome = document.querySelector(".aghome");
  if (aghome) {
    aghome.classList.add("show-axbanner");
    aghome.previousElementSibling.classList.add("has-aghome");
  }
})(jQuery);


function createMovingShape() {
    const shapes = document.querySelectorAll(".moving-shape");  
    if(shapes.length >9) {
        return;
      }
    var shape = document.createElement('div');
    shape.classList.add('moving-shape');
    var width = Math.floor(Math.random() * (100 - 50 + 1)) + 50;
    shape.style.width = width + 'px';
    var right = Math.floor(Math.random() * (window.innerWidth * 0.9 - (-50) + 1)) + (-50);
    shape.style.right = right + 'px';
    var duration = Math.floor(Math.random() * (8 - 2 + 1)) + 2;
    shape.style.animationDuration = duration + 's';
    var randomColor = 'rgb(' + Math.floor(Math.random() * 256) + ',' + Math.floor(Math.random() * 256) + ',' + Math.floor(Math.random() * 256) + ')';
    shape.style.backgroundColor = randomColor;
    document.body.appendChild(shape);
    shape.addEventListener('animationend', function() {
        let shapes = document.querySelectorAll(".moving-shape"); 
        shape.remove();
        shapes = document.querySelectorAll(".moving-shape"); 
    });
}

createMovingShape();
setInterval(createMovingShape, 10000);