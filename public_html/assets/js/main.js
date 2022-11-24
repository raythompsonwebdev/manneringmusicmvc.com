const menuToggle = document.querySelector('#mobile-toggle');

menuToggle.addEventListener(
  'click',
  (event) => {
    event.preventDefault();

    // create menu variables
    const slideoutMenu = document.querySelector('#mannering-nav');

    // toggle open class
    slideoutMenu.classList.toggle('open');
    slideoutMenu.style.transition = 'all 0.3s ease-in 0s';

    // slide menu
    if (slideoutMenu.classList.contains('open')) {
      slideoutMenu.style.top = '0px';
    } else {
      slideoutMenu.style.top = `-${slideoutMenu.offsetHeight}px`;
    }
  },
  false
);
