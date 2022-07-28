window.addEventListener("resize", () => {
		var windowWidth = document.getElementById('global');
	console.log(windowWidth.offsetWidth);
		if(windowWidth.offsetWidth > 991 ){
			console.log("in global is big");
			hideMobileMenu();
		}
});

body.addEventListener(
  'keyup', 
  function(e) {
	  var mobileMenu = document.getElementById('hold-main-menu-list');
  
    if ( e.keyCode == 27 ) {
      e.preventDefault();
      hideMobileMenu();
      return false;
    }
  }
);

function toggleMobileMenu() {
	
	var mobileMenu = document.getElementById('hold-main-menu-list');
  
  	if (mobileMenu.classList.contains('show-mobile-menu')) {
   		hideMobileMenu();
  	} else {
    	showMobileMenu();
	}
}

function hideMobileMenu(){
	console.log("in hide");
	var pushElement = document.getElementById('pusher');
	var mobileMenu = document.getElementById('hold-main-menu-list');
	var mainNav = document.getElementById('main-nav');
	var listToHide = document.getElementById('menu-main-menu-1');
	var toggleButton = document.getElementById('trigger');
	
	pushElement.classList.remove('show-mobile-menu');
	mobileMenu.classList.remove('show-mobile-menu');
	mainNav.classList.remove('open');
	
	toggleButton.setAttribute("aria-expanded", false);
	
	
	var windowWidth = document.getElementById('global');
	if(windowWidth.offsetWidth > 991 ){
		listToHide.classList.remove('gone');
		listToHide.setAttribute('aria-hidden', false);
	}
	else{
	setTimeout(function () {
      listToHide.classList.add('gone');
		listToHide.setAttribute('aria-hidden', true);
    }, 1000);
	}
	
}

function showMobileMenu(){
	console.log("in show");
	var pushElement = document.getElementById('pusher');
	var mobileMenu = document.getElementById('hold-main-menu-list');
	var mainNav = document.getElementById('main-nav');
	var listToHide = document.getElementById('menu-main-menu-1');
	var toggleButton = document.getElementById('trigger');
	
	pushElement.classList.add('show-mobile-menu');
	mobileMenu.classList.add('show-mobile-menu');
	mainNav.classList.add('open');
	
	
	
	toggleButton.setAttribute("aria-expanded", true);
	
	var windowWidth = document.getElementById('global');
		if(windowWidth.offsetWidth < 991 ){
			listToHide.classList.remove('gone');
			listToHide.setAttribute('aria-hidden',false);
		}
	
}
						 