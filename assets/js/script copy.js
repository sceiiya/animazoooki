// // for legacy browsers
// const AudioContext = window.AudioContext || window.webkitAudioContext;

// const audioContext = new AudioContext();

// // get the audio element
// const audioElement = document.querySelector("audio");

// // pass it into the audio context
// const track = audioContext.createMediaElementSource(audioElement);

// track.connect(audioContext.destination);


// // Select our play button
// const playButton = document.querySelector("button");

// playButton.addEventListener(
//   "click",
//   () => {
//     // Check if context is in suspended state (autoplay policy)
//     if (audioContext.state === "suspended") {
//       audioContext.resume();
//     }

//     // Play or pause track depending on state
//     if (playButton.dataset.playing === "false") {
//       audioElement.play();
//       playButton.dataset.playing = "true";
//     } else if (playButton.dataset.playing === "true") {
//       audioElement.pause();
//       playButton.dataset.playing = "false";
//     }
//   },
//   false
// );


// audioElement.addEventListener(
//     "ended",
//     () => {
//       playButton.dataset.playing = "false";
//     },
//     false
//   );

//   const gainNode = audioContext.createGain();

//   track.connect(gainNode).connect(audioContext.destination);

//   <input type="range" id="volume" min="0" max="2" value="1" step="0.01" />

//   const volumeControl = document.querySelector("#volume");

// volumeControl.addEventListener(
//   "input",
//   () => {
//     gainNode.gain.value = volumeControl.value;
//   },
//   false
// );

// const pannerOptions = { pan: 0 };
// const panner = new StereoPannerNode(audioContext, pannerOptions);

// <input type="range" id="panner" min="-1" max="1" value="0" step="0.01" />

// const pannerControl = document.querySelector("#panner");

// pannerControl.addEventListener(
//   "input",
//   () => {
//     panner.pan.value = pannerControl.value;
//   },
//   false
// );

// track.connect(gainNode).connect(panner).connect(audioContext.destination);

