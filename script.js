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



/*********** ACCUEIL ***********/


document.getElementById("arrow").addEventListener("click", function() {
    accueil.classList.add("accueil-clicked");});
    
    var test =  document.getElementsByClassName("bouton-accueil")

    for (let i = 0; i < test.length; i++) {
            test[i].addEventListener("click", function() {
    accueil.classList.add("accueil-clicked");});
        }
