if ($(window).width() < 1024) {

}

(function($) {

$(document).ready(function() {
    anims_init();
});

$(window).on( "load",  anims_onLoad);

// INIT des animations au démarrage
function anims_init() {
  gsap.registerPlugin(ScrollTrigger);
  gsap.registerPlugin(SplitText);
}

// Déclenchement des animations au chargement du DOM
function anims_onLoad(){

// var tl = gsap.timeline(),
//   mySplitText = new SplitText("#quote", { type: "chars" }),
//   chars = mySplitText.chars; 

// gsap.set("#quote", { perspective: 400 });


// tl.from(chars, {
//   duration: 0.8,
//   opacity: 0,
//   scale: 0,
//   y: 80,
//   rotationX: 180,
//   transformOrigin: "0% 50% -50",
//   ease: "back",
//   stagger: 0.01
// });


// Viewport Survey 
// --> Fade top
if (document.querySelector('.vs-top')) {
  
  var sections = gsap.utils.toArray('.vs-top');

sections.forEach((section) => {

  gsap.from(section, { 
    duration: 2,
  autoAlpha: 0,
  y: 200,
  ease: "expo",
    scrollTrigger: {
        trigger: section,
        start: 'top bottom'
        // scrub: true,
        // yoyo:true,
        // end: 'bottom top',
        // markers: true
    }

});

  });
}

// Parallax
if (document.querySelector('.relaxImg') && $(window).width() > 1024) {

  var wrapImg = gsap.utils.toArray('.relaxImg');

wrapImg.forEach((img) => {

  gsap.to(img, { 
    duration: 250,
  // autoAlpha: 0,
  // scale: 0,
  yPercent: 30,
  // transformOrigin: "0% 50% -50",
  ease: "sine",

    scrollTrigger: {
        trigger: img,
        start: 'top center',
        scrub: 0.1,
        yoyo:true,
        end: 'bottom top',
        // markers: true
    }
});
  
})
}


// SplitText
if (document.querySelector('.txt-anim')) {

  gsap.set(".txt-anim", { perspective: 400 });

  var sections = gsap.utils.toArray('.txt-anim');

sections.forEach((section) => {

    splitTxt = new SplitText(section, { type: "chars" });
   chars = splitTxt.chars; //an array of all the divs that wrap each character
  
  gsap.from(chars, { 
    duration: 0.8,
  opacity: 0,
  scale: 0,
  y: 80,
  rotationX: 180,
  transformOrigin: "0% 50% -50",
  ease: "back",
  stagger: 0.01,

    scrollTrigger: {
        trigger: section,
        start: 'top bottom',
        // scrub: true,
        yoyo:false,
        // end: '+=500',
        // markers: true
    }

});

  });
}


}
    
})( jQuery );