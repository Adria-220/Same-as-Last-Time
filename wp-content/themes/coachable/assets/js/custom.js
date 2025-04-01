(function($) {

  $("#hamburger-menu").click(function(event) {
    event.stopPropagation();
    $(".header-navigation").addClass("open");

  });

    $(".close-menu").click(function(event) {
    event.stopPropagation();
    $(".header-navigation").removeClass("open");

  });

  $("#hamburger-menu").keypress(function(e) {
    var key = e.which;
    if (key == 13) // the enter key code
    {
      $(".header-navigation").addClass("open");
    }
  });

  $(".close-menu").keypress(function(e) {
    var key = e.which;
    if (key == 13) // the enter key code
    {
      $(".header-navigation").removeClass("open");
    }
  });




})(jQuery);

if (jQuery(window).width() < 991){
  const  coachable_focusableElements =
  'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
const coachable_modal = document.querySelector('nav#site-navigation'); 

const coachable_firstFocusableElement = coachable_modal.querySelectorAll(coachable_focusableElements)[0]; 
const coachable_focusableContent = coachable_modal.querySelectorAll(coachable_focusableElements);
const coachable_lastFocusableElement = coachable_focusableContent[coachable_focusableContent.length - 1];


document.addEventListener('keydown', function(e) {
let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

if (!isTabPressed) {
  return;
}

if (e.shiftKey) { // if shift key pressed for shift + tab combination
  if (document.activeElement === coachable_firstFocusableElement) {
    coachable_lastFocusableElement.focus(); // add focus for the last focusable element
    e.preventDefault();
  }
} else { // if tab key is pressed
  if (document.activeElement === coachable_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
    coachable_firstFocusableElement.focus(); // add focus for the first focusable element
    e.preventDefault();
  }
}
});

coachable_firstFocusableElement.focus();}