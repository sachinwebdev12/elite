document.addEventListener("DOMContentLoaded", function () {
    const boxes = document.querySelectorAll('.box-roates');
  
    const observerOptions = {
      root: null,
      rootMargin: '0px',
      threshold: 0.3 // Trigger when 10% of the element is visible
    };
  
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate');
        } else {
          entry.target.classList.remove('animate');
        }
      });
    }, observerOptions);
  
    boxes.forEach(box => {
      observer.observe(box);
    });

    
  });
  document.addEventListener('DOMContentLoaded', function() {
    const planPackages = document.querySelectorAll('.planpackage');
  
    const observerOptions = {
      root: null,
      rootMargin: '0px',
      threshold: 0.3 // Trigger when 30% of the element is visible
    };
  
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('scrolled');
        } else {
          entry.target.classList.remove('scrolled');
        }
      });
    }, observerOptions);
  
    planPackages.forEach(planPackage => {
      observer.observe(planPackage);
    });
  });
  