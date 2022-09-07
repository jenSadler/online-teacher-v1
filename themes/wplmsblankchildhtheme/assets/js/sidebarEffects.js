//SIDEBAR ---------------------
document.addEventListener("DOMContentLoaded", function() {
	console.log("in ready");
	hideMobileMenu();
  
});

window.addEventListener("resize", () => {
		checkWidthandHideMobile();
		
});

function checkWidthandHideMobile(){
	
	var windowWidth = document.getElementById('global');
	console.log(windowWidth.offsetWidth);
		if(windowWidth.offsetWidth > 991 ){
	
			hideMobileMenu();
		}
	
}

function listenForEsc(e){

	  var mobileMenu = document.getElementById('hold-main-menu-list');
  
    if ( e.key=="Escape" ) {
      e.preventDefault();
      hideMobileMenu();

      return false;
    }
  }

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

	var mobileMenu = document.getElementById('hold-main-menu-list');
	var mainNav = document.getElementById('main-nav');
	var listToHide = document.getElementById('menu-main-menu-1');
	var closeMenuButton = document.getElementById('menu-close');

	
	mobileMenu.classList.remove('show-mobile-menu');
	mainNav.classList.remove('open');
	closeMenuButton.classList.remove("show-close-button")
	
	
	
	
	var windowWidth = document.getElementById('global');
	if(windowWidth.offsetWidth > 991 ){
		listToHide.tabIndex=0;
		closeMenuButton.tabIndex=0;
		listToHide.setAttribute('aria-hidden', false);
		closeMenuButton.setAttribute('aria-hidden', true);
	}
	else{
	console.log("in small and going to hide");
      listToHide.tabIndex=-1;
		closeMenuButton.tabIndex=-1;
		closeMenuButton.setAttribute('aria-hidden', true);
		listToHide.setAttribute('aria-hidden', true);
		console.log("in small and going to hide- ENDED");
		
  
	}

	window.removeEventListener("click",clickOutsideMenu, true);
	window.removeEventListener('keyup', listenForEsc,true);

	console.log("resized");
	
}

function showMobileMenu(){
	console.log("in show");
	
	var mobileMenu = document.getElementById('hold-main-menu-list');
	var mainNav = document.getElementById('main-nav');
	var listToHide = document.getElementById('menu-main-menu-1');
	var closeMenuButton = document.getElementById('menu-close');
	
	
	mobileMenu.classList.add('show-mobile-menu');
	mainNav.classList.add('open');
	closeMenuButton.classList.add("show-close-button")
	
	
	
	var windowWidth = document.getElementById('global');
		if(windowWidth.offsetWidth < 991 ){
			listToHide.tabIndex=0;
			closeMenuButton.tabIndex=0;
			listToHide.setAttribute('aria-hidden',false);
			closeMenuButton.setAttribute('aria-hidden', false);
			document.getElementById("menu-main-menu-1").focus();
		}
	

		window.addEventListener("click",clickOutsideMenu, true);
		window.addEventListener('keyup', listenForEsc,true);
		
	
}

function clickOutsideMenu(event){
	var specifiedElement= document.getElementById("hold-main-menu-list");
	if(specifiedElement.classList.contains("show-mobile-menu")){
		const isClickInside = specifiedElement.contains(event.target);
		console.log("Inside classlist so right");
		if (!isClickInside) {
			hideMobileMenu();
			console.log("in add event, in NOT inside in classlist good");
		}
	}
}
	

