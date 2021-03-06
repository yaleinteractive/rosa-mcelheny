<!DOCTYPE html>
<html>
<head>
	<title>zipper</title>
	<link rel="icon" href="assets/icon.png" type="image/gif" sizes="32x32">
	<link rel="stylesheet" href="zipper.css">
</head>
<body>
	<div class="container center">
		<audio class="placeholder" controls type="audio/mpeg"></audio>

		<div class="button js-start">Start</div>
		<div class="button js-stop">Stop</div>

		<div class="greeting hide">Add your sound!</div>
		<a href='archive.php'>
			<div class="button hide">
				<?php include "arrow.html"; ?>
			</div>
		</a>
	</div>

<script src="js/Mp3LameEncoder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script class="containerScript">
	
	$( document ).ready(function() {
	    var colors = ['AntiqueWhite', 'CadetBlue', 'Chartreuse', 'DarkSeaGreen', 'LightSteelBlue', 'Lavender', 'Thistle', 'MistyRose', 'OrangeRed', 'Yellow','RosyBrown', 'Peru'];
		var max = colors.length;
		function getRandomInt(max) {
		  return Math.floor(Math.random() * Math.floor(max));
		}
		i = (getRandomInt(max));
		color = colors[i];
		$('body').css('background-color', color);
	});

	var colors;
	 var audio_colors = function() {
            var colors = ['AntiqueWhite', 'CadetBlue', 'Chartreuse', 'DarkSeaGreen', 'LightSteelBlue', 'Lavender', 'Thistle', 'MistyRose', 'Yellow','RosyBrown', 'Peru'];
            var max = colors.length;  
            function getRandomInt(max) {
              return Math.floor(Math.random() * Math.floor(max));
            }
            i = (getRandomInt(max));
            color = colors[i];
            $('body').css('background-color', color);
            console.log(color)
        };

    $('.hide').hide();

	window.URL = window.URL || window.webkitURL;
	/** 
	 * Detect the correct AudioContext for the browser 
	 * */
	window.AudioContext = window.AudioContext || window.webkitAudioContext;
	navigator.getUserMedia  = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
	var recorder = new RecordVoiceAudios();
	let startBtn = document.querySelector('.js-start');
	let stopBtn = document.querySelector('.js-stop');
	startBtn.onclick = recorder.startRecord;
						// setTimeout(recorder.stopRecord, 4000)
	stopBtn.onclick = recorder.stopRecord;


	function RecordVoiceAudios() {
		let audioElement = document.querySelector('audio');
		let encoder = null;
		let microphone;
		let isRecording = false;
		var audioContext;
		let processor;
		let config = {
			bufferLen: 4096,
			numChannels: 2,
			mimeType: 'audio/mpeg'
		};

		this.startRecord = function() {
			audioContext = new AudioContext();
			colors = setInterval(audio_colors, 100);
			/** 
			* Create a ScriptProcessorNode with a bufferSize of 
			* 4096 and two input and output channel 
			* */
			if (audioContext.createJavaScriptNode) {
				processor = audioContext.createJavaScriptNode(config.bufferLen, config.numChannels, config.numChannels);
			} else if (audioContext.createScriptProcessor) {
				processor = audioContext.createScriptProcessor(config.bufferLen, config.numChannels, config.numChannels);
			} else {
				console.log('WebAudio API has no support on this browser.');
			}

			processor.connect(audioContext.destination);
			/**
			*  ask permission of the user for use microphone or camera  
			* */
			navigator.mediaDevices.getUserMedia({ audio: true, video: false })
			.then(gotStreamMethod)
			.catch(logError);

			// for buttons
			startBtn.style.display = "none";
			stopBtn.style.display = "flex";

		};

		let getBuffers = (event) => {
			var buffers = [];
			for (var ch = 0; ch < 2; ++ch)
				buffers[ch] = event.inputBuffer.getChannelData(ch);
			return buffers;
		}

		let gotStreamMethod = (stream) => {
			// startBtn.setAttribute('disabled', true);
			// stopBtn.removeAttribute('disabled');
			audioElement.src = "";
			config = {
				bufferLen: 4096,
				numChannels: 2,
				mimeType: 'audio/mpeg'
			};
			isRecording = true;

			let tracks = stream.getTracks();
			/** 
			* Create a MediaStreamAudioSourceNode for the microphone 
			* */
			microphone = audioContext.createMediaStreamSource(stream);
			/** 
			* connect the AudioBufferSourceNode to the gainNode 
			* */
			microphone.connect(processor);
			encoder = new Mp3LameEncoder(audioContext.sampleRate, 160);
			/** 
			* Give the node a function to process audio events 
			*/
			processor.onaudioprocess = function(event) {
				encoder.encode(getBuffers(event));
			};

			stopBtnRecord = () => {
				console.log('stopBtnRecord');
				isRecording = false;
				// startBtn.removeAttribute('disabled');
				// stopBtn.setAttribute('disabled', true);
				audioContext.close();
				processor.disconnect();
				tracks.forEach(track => track.stop());
				let blob = encoder.finish();
				audioElement.src = URL.createObjectURL(blob);

				// TODO: Use jQuery instead of XMLHttpRequest since we have it
				// TODO: We probably don't actuallly want to create the blob?
				// TODO: Redirect when the upload is done?
				let xhr = new XMLHttpRequest();
				xhr.open('POST', 'upload_audio.php', true);
				xhr.onload = function(e) {
					let result = e.target.result;
					// alert('MP3 upload complete: ' + result);
				}
			    xhr.send(blob);
			};
		}


		this.stopRecord = function() {
			clearInterval(colors);
			stopBtnRecord();
			console.log('done');
			$('.js-stop').hide();
			$('.hide').show();
			// window.location = "archive.php";
		};

		let logError = (error) => {
			alert(error);
			console.log(error);
		}
	}
</script>
</body>
</html>
