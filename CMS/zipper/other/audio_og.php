<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Example 3</title>
	<link rel="stylesheet" href="zipper.css">
</head>
<body>
	<div class="container">
			<audio class="placeholder" controls type="audio/mpeg"></audio>
			<br>
			<div class="button start">Start</div>
			<!-- <div class="button stop">Stop</div> -->
			<button class="btn waves-effect waves-light js-start">Start</button>
			<button class="btn waves-effect waves-light js-stop" disabled>Stop</button>
			<br>
		 	<br>
	</div>

<script src="js/Mp3LameEncoder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script class="containerScript">
	window.URL = window.URL || window.webkitURL;
	/** 
	 * Detecte the correct AudioContext for the browser 
	 * */
	window.AudioContext = window.AudioContext || window.webkitAudioContext;
	navigator.getUserMedia  = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
	var recorder = new RecordVoiceAudios();
	let startBtn = document.querySelector('.js-start');
	let stopBtn = document.querySelector('.js-stop');
	startBtn.onclick = recorder.startRecord;
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
		};

		let getBuffers = (event) => {
			var buffers = [];
			for (var ch = 0; ch < 2; ++ch)
				buffers[ch] = event.inputBuffer.getChannelData(ch);
			return buffers;
		}

		let gotStreamMethod = (stream) => {
			startBtn.setAttribute('disabled', true);
			stopBtn.removeAttribute('disabled');
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
				startBtn.removeAttribute('disabled');
				stopBtn.setAttribute('disabled', true);
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
					alert('MP3 upload complete: ' + result);
				}
			    xhr.send(blob);

			};

		}

		this.stopRecord = function() {
			stopBtnRecord();
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
