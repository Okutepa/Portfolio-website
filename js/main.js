
gsap.registerPlugin(ScrollTrigger)
const sidebar = document.querySelector(".sidebar");
const showSidebarButton = document.querySelector(".hideondesktop a");
const hideSidebarButton = document.querySelector(".sidebar li:first-child a");
const player = new Plyr('video');
const headingCon = document.querySelector('.heading')

gsap.fromTo(headingCon, 
  {opacity: 0}, {opacity: 1, duration: 1.4});


function showSidebar() {
  sidebar.classList.add("show");
}

function hideSidebar() {
  sidebar.classList.remove("show");
}

showSidebarButton.addEventListener("click", showSidebar);
hideSidebarButton.addEventListener("click", hideSidebar);
