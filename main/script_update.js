//Reponsive Nav
window.addEventListener('scroll', function (e) {
  var nav = document.getElementById('nav');
  /*
  var how1 = document.getElementById('how1');
  var how2 = document.getElementById('how2');
  var how3 = document.getElementById('how3');
  var how4 = document.getElementById('how4');
  */
  if (window.scrollY || window.pageYOffset || document.body.scrollTop + (document.documentElement && document.documentElement.scrollTop || 0)> window.innerHeight) {
    //document.documentElement.scrollTop || document.body.scrollTop 
    nav.classList.add('nav-scrolled');
    nav.classList.remove('nav-unscrolled');
    /*
    if (window.scrollY || window.pageYOffset > 100000){
      how1.style.animation = 'fadeIn 2s 0s forwards';
      how2.style.animation = 'fadeIn 2s 0.5s forwards';
      how3.style.animation = 'fadeIn 2s 1.0s forwards';
      how4.style.animation = 'fadeIn 2s 2.0s forwards'; 
    }
    */
  } else {
    nav.classList.add('nav-unscrolled');
    nav.classList.remove('nav-scrolled');
  }
});
//end Responsive Nav
var mobileMenuOpen = false;
function toggleMobileMenu(){
  var mobileMenu = document.getElementById("mobileMenu");
  if(mobileMenuOpen == true){
    mobileMenuOpen = false;
    mobileMenu.style.height='50px';
    mobileMenu.style.opacity = '0';
  }else{
    mobileMenuOpen = true;
    mobileMenu.style.height='372px';
    mobileMenu.style.opacity = '1';
  }
}