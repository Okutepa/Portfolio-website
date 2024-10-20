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

player.controls = false;
videoControls.classList.remove("hidden");

function showSidebar() {
  sidebar.classList.add("show");
}

function hideSidebar() {
  sidebar.classList.remove("show");
}

function playVideo() {
  player.play();
  bigPlayButton.classList.add("hide-button");
  bigPlayButton.innerHTML = '<i class="fa fa-pause-circle-o"></i>';
}

function pauseVideo() {
  player.pause();
  bigPlayButton.classList.remove("hide-button");
  bigPlayButton.innerHTML = '<i class="fa fa-play-circle-o"></i>';
}

function togglePlayPause() {
  if (player.paused) {
    playVideo();
  } else {
    pauseVideo();
  }
}

function changeVolume() {
  player.volume = volumeSlider.value;
}

function toggleFullScreen() {
  if (document.fullscreenElement) {
    document.exitFullscreen();
  } else if (document.webkitFullscreenElement) {
    // Need this to support Safari
    document.webkitExitFullscreen();
  } else if (playerCon.webkitRequestFullscreen) {
    // Need this to support Safari
    playerCon.webkitRequestFullscreen();
  } else {
    playerCon.requestFullscreen();
  }
}

function updateTimer() {
  const currentTime = player.currentTime;
  const minutes = Math.floor(currentTime / 60);
  const seconds = Math.floor(currentTime % 60);
  timer.textContent = `${minutes < 10 ? "0" + minutes : minutes}:${
    seconds < 10 ? "0" + seconds : seconds
  }`;

  const percentage = (currentTime / player.duration) * 100;
  videoProgress.value = percentage;
}

function hideControls() {
  if (player.paused) {
    return;
  }
  videoControls.classList.add("hide");
}

function showControls() {
  videoControls.classList.remove("hide");
}

function setVideoProgress() {
  const progress = (videoProgress.value / videoProgress.max) * player.duration;
  player.currentTime = progress;
}

showSidebarButton.addEventListener("click", showSidebar);
hideSidebarButton.addEventListener("click", hideSidebar);

playerCon.addEventListener("click", togglePlayPause);
volumeSlider.addEventListener("change", changeVolume);
fullScreen.addEventListener("click", toggleFullScreen);
playerCon.addEventListener("mouseenter", showControls);
playerCon.addEventListener("mouseleave", hideControls);
player.addEventListener("timeupdate", updateTimer);
videoProgress.addEventListener("input", setVideoProgress);

videoControls.addEventListener("mouseenter", showControls);
videoControls.addEventListener("mouseleave", hideControls);
player.addEventListener("mouseenter", showControls);
player.addEventListener("mouseleave", hideControls);
