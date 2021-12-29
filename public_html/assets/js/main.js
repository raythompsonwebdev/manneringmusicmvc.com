const menuToggle = document.querySelector('#mobile-toggle');

menuToggle.addEventListener(
  'click',
  (event) => {
    event.preventDefault();

    // create menu variables
    const slideoutMenu = document.querySelector('#mannering_nav');

    const slideoutMenuHeight = slideoutMenu.offsetHeight;

    // toggle open class
    slideoutMenu.classList.toggle('open');

    slideoutMenu.style.transition = 'all 0.3s ease-in 0s';

    // slide menu
    if (slideoutMenu.classList.contains('open')) {
      slideoutMenu.style.top = '0px';
    } else {
      slideoutMenu.style.transition = 'all 0.3s ease-in 0s';
      slideoutMenu.style.top = `-${slideoutMenuHeight}px`;
    }
  },
  false
);
