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



/*********** MY WORK ***********/

    const ligne = document.querySelector(".categorie")

    document.addEventListener("scroll", (slideIn) => {
      

    });
    

/***********  ***********/

