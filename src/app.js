import './main.css';



const slides = document.querySelectorAll(".slide");
const nav = document.querySelector(".main_nav");
const burger = document.querySelector(".burger");
const header = document.querySelector("header");
const mainHeader = document.querySelector(".header__wraper");
const socialNav = document.querySelector(".social__nav");
let index = 0;
if (slides.length > 0) {
  slides[0].classList.add("current");

  setInterval(() => {
    if (index < slides.length - 1) {
      slides[index].classList.remove("current");
      index++;
      slides[index].classList.add("current");
    } else {
      slides[index].classList.remove("current");
      index = 0;
      slides[index].classList.add("current");
    }
  }, 10000);
}

burger.addEventListener("click", () => {
  nav.classList.toggle("show");
  header.classList.toggle("show");
});

let currentoffset;
let offset = window.pageYOffset;

window.addEventListener("scroll", () => {
  if (!header.classList.contains("show")) {
    currentoffset = window.pageYOffset;
    if (currentoffset > offset) {
      header.classList.add("hide");
      offset = window.pageYOffset;
    } else {
      header.classList.remove("hide");
      offset = window.pageYOffset;
    }
  }
  if (currentoffset > 10) {
    socialNav.classList.add("hide");
   
  } else {
   

    socialNav.classList.remove("hide");
  }
});

const controller = new ScrollMagic.Controller();

var Scene = new ScrollMagic.Scene({
  triggerElement: ".news__box",
  //  duration: '80%',
  triggerHook: 0.9,
  offset: 50,
})
  .setClassToggle(".news__box", "fade-in")
  // .addIndicators({
  //   name: "first",
  // })

  .addTo(controller);

var Scene = new ScrollMagic.Scene({
  triggerElement: ".club",
  //  duration: '80%',
  triggerHook: 0.9,
  offset: 50,
})
  .setClassToggle(".club", "fade-in")
  // .addIndicators({
  //   name: "first",
  // })

  .addTo(controller);

var Scene = new ScrollMagic.Scene({
  triggerElement: ".trainer",
  //  duration: '80%',
  triggerHook: 0.9,
  offset: 50,
})
  .setClassToggle(".trainer", "fade-in")
  // .addIndicators({
  //   name: "first",
  // })

  .addTo(controller);
