var thoughts = {happy:[], sad:[], angry:[], stressed:[], excited:[], calm:[], meh:[], other:[]};

//no hash tag at all: don't even save....but unpreselected hashtag save

//"So many stickers at Brandeis #Codestellation #happy"];
function submitting() {
  var thought_text = document.getElementById('thoughtbox').value;
  var moods = getHashTags(thought_text);
  for (var m in moods) {
	  if (thoughts[moods[m]]) {
		thoughts[moods[m]].push(thought_text);
	  } else {
		thoughts["other"].push(thought_text);
	  }
  }
	setTimeout(function(){  
		$("#thoughtbox").fadeOut(); 
		$("#submit_button").fadeOut();
	}, 1000);
	
	setTimeout(function(){  
		$("#thoughtbox").fadeIn(); 
		$("#submit_button").fadeIn();
	}, 1000);
}

function getHashTags(string) {
	var moods = [];
	var separated = string.split("#");
	for (var i = 1; i < separated.length; i++) {
		moods.push( separated[i].split(" ")[0] );
	}
	return moods;
}

function searching(string) {
	var mood = string.substring(1);
	if (thoughts[mood]) {
		console.log(thoughts[mood]);
	} else {
		console.log("not a valid hashtag");
	}
	// var index;
	// var text;
	// for	(index = 0; index < thought_array.length; index++) {
		// if (thought_array[index].indexOf(string) > -1) {
			// //string is in this index of the array
			// text += "<div class='item'><p>" + thought_array[index] + "</p></div>";
		// }
  // }
  // document.getElementById('LIST').innerHTML = text;
}