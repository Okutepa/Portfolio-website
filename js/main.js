const sidebar = document.querySelector(".sidebar");
const showSidebarButton = document.querySelector(".hideondesktop a");
const hideSidebarButton = document.querySelector(".sidebar li:first-child a");
const playerCon = document.querySelector("#player-container");
const player = document.querySelector("video");
const videoControls = document.querySelector("#video-controls");
const bigPlayButton = document.querySelector("#big-play-button");
const volumeSlider = document.querySelector("#change-vol");
const fullScreen = document.querySelector("#full-screen");
const timer = document.querySelector("#timer");
const videoProgress = document.querySelector("#video-progress");

function showSidebar() {
  sidebar.classList.add("show");
}

function hideSidebar() {
  sidebar.classList.remove("show");
}

showSidebarButton.addEventListener("click", showSidebar);
hideSidebarButton.addEventListener("click", hideSidebar);
  showSidebarButton.addEventListener("click", showSidebar);
  hideSidebarButton.addEventListener("click", hideSidebar);