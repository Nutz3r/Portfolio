/**** SCROLL IMAGE ****/

window.onscroll = function() {
  var scrollY = window.scrollY || document.documentElement.scrollTop;
  var windowHeight = window.innerHeight;

  var gaucheElements = document.querySelectorAll('.gauche');
  var droiteElements = document.querySelectorAll('.droite');

  [...document.getElementsByClassName('section')].forEach(el => {
    el.classList.remove('active');

    if (el.offsetTop <= scrollY + (windowHeight / 1) && el.offsetTop + el.offsetHeight > scrollY + (windowHeight / 1)) {
      el.classList.add('active');
    }
  });


/**** CATEGORIES ****/

  gaucheElements.forEach(function(element) {
    var rect = element.getBoundingClientRect();
    var elementTop = rect.top;
    var elementBottom = rect.bottom;

    if (elementTop < windowHeight && elementBottom > 0) {
      element.style.left = '0';
    } else {
      element.style.left = '-100%';
    }
  });

  droiteElements.forEach(function(element) {
    var rect = element.getBoundingClientRect();
    var elementTop = rect.top;
    var elementBottom = rect.bottom;

    if (elementTop < windowHeight && elementBottom > 0) {
      element.style.left = '0';
    } else {
      element.style.left = '100%';
    }
  });
};


/**** BURGER ****/

document.addEventListener('DOMContentLoaded', function() {
  var burger = document.querySelector('.burger-container');
  var burgerNav = document.querySelector('.burgerNav');
  var liens = document.querySelectorAll('.liens');

  burger.addEventListener('click', function() {
    burgerNav.classList.toggle('on');
    burger.classList.toggle('burgerOn');
  });

  liens.forEach(function(lien) {
    lien.addEventListener('click', function() {
      burgerNav.classList.toggle('on');
      burger.classList.toggle('burgerOn');
    });
  });
});


/**** LIGHTBOX ****/