var thoughts = {happy:[], sad:[], angry:[], stressed:[], excited:[], calm:[], meh:[], other:[]};

var submit_button = document.querySelector("#submit_button");
submit_button.onclick = function() {
	submitting();
	colorMagic();
}

var search_button = document.querySelector("#search_button");
search_button.onclick = searching;

function submitting() {
	var thought_text = document.getElementById('thoughtbox').value;
	console.log("Submitted a thought: " + thought_text); 
	var moods = getHashTags(thought_text);
	for (var m in moods) {
		if (thoughts[moods[m]]) {
			thoughts[moods[m]].push(thought_text);
		} else {
			thoughts["other"].push(thought_text);
		}
	}

	// setTimeout(function(){  
		// $("#thoughtbox").fadeOut(); 
		// $("#submit_button").fadeOut();
	// }, 500);

	// setTimeout(function(){  
		// $("#thoughtbox").fadeIn(); 
		// $("#submit_button").fadeIn();
	// }, 1000);
}

function getHashTags(string) {
	var moods = [];
	var separated = string.split("#");
	for (var i = 1; i < separated.length; i++) {
		moods.push( separated[i].split(" ")[0] );
	}
	return moods;
}

function searching() {
	var search_text = document.getElementById('searchbox').value;
	console.log("Searched a mood: " + search_text); 
	var moods = getHashTags(search_text);
	for (var m in moods) {
		if (thoughts[moods[m]]) {
			showResults(thoughts[moods[m]]);
			console.log(thoughts[moods[m]]);
		} else {
			console.log(moods[m] + " isn't a valid value");
		}
	}
}

function showResults(array) {
	$("#results").empty();
	console.log("showing results");
	for (var i in array) {
		var oneRow = document.createElement("div");
		
		var circle1 = document.createElement("div");
		circle1.className = "circle1";
		var circle2 = document.createElement("div");
		circle2.className = "circle2";
		
		var oneResult = document.createElement("div");
		oneResult.className = "result";
		oneResult.innerHTML = array[i];
		
		oneRow.appendChild(oneResult);
		oneRow.appendChild(circle1);
		oneRow.appendChild(circle2);
		
		$("#results").append(oneRow);
	}
}


/*colors*/
var colors = {
  happy: {dark: "#001a0d", light: "#00b359"},
  sad: {dark: "#333", light: "#999"},
  angry: {dark: "#4d0000", light: "#e60000"},
  stressed: {dark: "#b34700", light: "#ff944d"},
  excited: {dark: "#ff8c00", light: "#ffdb4d"},
  calm: {dark: "#000d1a", light: "#0059b3"},
  meh:{dark: "#1a001a", light: "#b300b3"},
}

/*gradient stuff*/
window.onload = resetGradient("meh");
window.onresize = resetGradient("meh");

function resetGradient(mood) {
  var gradient = document.querySelector("#gradient");
  var height = gradient.clientHeight;
  console.log(gradient);
  console.log(height);
  
  while (gradient.firstChild) {
    gradient.removeChild(gradient.firstChild);
  }
  
  gradient.style.backgroundColor = colors[mood].light;
  
  for (var i = height; i >= 0; i-=2) {
    var ombre = document.createElement("div");
    ombre.className = "ombre";
    ombre.style.backgroundColor = colors[mood].dark;
    ombre.style.height = "2px";
    ombre.style.opacity = i/height;
    gradient.appendChild(ombre);
  }
}

function colorMagic() { 
  var input = document.querySelector("#thoughtbox");
  var value = input.value;

  if (value.search(/#excited/i) != -1 ) { //contains #excited
     resetGradient("excited");
   } else if (value.search(/#happy/i) != -1 ) { 
     resetGradient("happy");
   } else if (value.search(/#sad/i) != -1 )  { 
     resetGradient("sad");
   } else if (value.search(/#angry/i) != -1 ) {
     resetGradient("angry");
   } else if (value.search(/#stressed/i) != -1 ) { 
     resetGradient("stressed");
   } else if (value.search(/#calm/i) != -1 )  { 
     resetGradient("calm");
   } else if (value.search(/#meh/i) != -1 ) {
     resetGradient("meh");
   }
}

function enter(e) {
  if (e.keyCode == 13) {button.click();}
}
