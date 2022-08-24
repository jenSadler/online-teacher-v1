const specifiedElement= document.getElementById("hold-main-menu-list");
document.addEventListener("DOMContentLoaded", function() {
	console.log("in ready");
  checkWidthandHideMobile();
  
});




document.addEventListener("click", (event) => {
	console.log("in add eventlistener");
  if(specifiedElement.classList.contains("show-mobile-menu")){
		const isClickInside = specifiedElement.contains(event.target);
		console.log("Inside classlist so right");
		if (!isClickInside) {
			hideMobileMenu();
			console.log("in add event, in NOT inside in classlist good");
		}
	}
});


window.addEventListener("resize", () => {
		checkWidthandHideMobile();
		
});

function checkWidthandHideMobile(){
	console.log("in cwahm");
	var windowWidth = document.getElementById('global');
	console.log(windowWidth.offsetWidth);
		if(windowWidth.offsetWidth > 991 ){
			console.log("in global is big");
			hideMobileMenu();
		}
	
}



window.addEventListener(
  'keyup', 
  function(e) {

	  var mobileMenu = document.getElementById('hold-main-menu-list');
  
    if ( e.key=="Escape" ) {
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
	var closeMenuButton = document.getElementById('menu-close');

	
	pushElement.classList.remove('show-mobile-menu');
	mobileMenu.classList.remove('show-mobile-menu');
	mainNav.classList.remove('open');
	closeMenuButton.classList.remove("show-close-button")
	
	
	
	
	var windowWidth = document.getElementById('global');
	if(windowWidth.offsetWidth > 991 ){
		listToHide.tabIndex=1;
		closeMenuButton.tabIndex=1;
		listToHide.setAttribute('aria-hidden', false);
	}
	else{
	
      listToHide.tabIndex=-1;
		closeMenuButton.tabIndex=-1;
		listToHide.setAttribute('aria-hidden', true);
		
  
	}
	
}

function showMobileMenu(){
	console.log("in show");
	var pushElement = document.getElementById('pusher');
	var mobileMenu = document.getElementById('hold-main-menu-list');
	var mainNav = document.getElementById('main-nav');
	var listToHide = document.getElementById('menu-main-menu-1');
	var closeMenuButton = document.getElementById('menu-close');
	
	pushElement.classList.add('show-mobile-menu');
	mobileMenu.classList.add('show-mobile-menu');
	mainNav.classList.add('open');
	closeMenuButton.classList.add("show-close-button")
	
	
	
	var windowWidth = document.getElementById('global');
		if(windowWidth.offsetWidth < 991 ){
			listToHide.tabIndex=1;
			closeMenuButton.tabIndex=1;
			listToHide.setAttribute('aria-hidden',false);
			
			document.getElementById("menu-main-menu-1").focus();
		}

	
	
}
						 