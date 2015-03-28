var thoughts = {happy:[], sad:[], angry:[], stressed:[], excited:[], calm:[], meh:[], other:[]};

var submit_button = document.querySelector("#submit_button");
submit_button.onclick = submitting;

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
