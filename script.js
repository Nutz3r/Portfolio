/*********** ACCUEIL ***********/

window.onscroll = function() { changeImage() }

function changeImage() {
  var scroll = window.scrollY + (window.innerHeight/1);

  [...document.getElementsByClassName('section')].forEach(el => {
    el.classList.remove('active');

    if(el.offsetTop <= scroll && el.offsetTop + el.offsetHeight > scroll) {
      el.classList.add('active');
    }
  })
} changeImage();


/*********** BURGER MENU ***********/

var burger = document.querySelector('.burger-container')
var burgerNav = document.querySelector('.burgerNav')

  burger.addEventListener('click',()=>{
    burgerNav.classList.toggle('on')
    burger.classList.toggle('burgerOn')

  })

/*********** MY WORK ***********/
    
      /* myWork est à 7644px */

/***********  ***********/

