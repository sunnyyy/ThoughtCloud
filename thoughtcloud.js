var thoughts = {happy:[], sad:[], angry:[], stressed:[], excited:[], calm:[], meh:[], other:[]};

//"So many stickers at Brandeis #Codestellation #happy"];
function submitting() {
  var thought_text = document.getElementById('thoughtbox').value;
  document.getElementById('HERE').innerHTML = thought_text;
  var mood = getHashTag(thought_text);
  if (thoughts[mood]) {
	thoughts[mood].push(thought_text);
  } else {
	thoughts["other"].push(thought_text);
  }
}

function getHashTag(string) {
	var mood = string.substring(string.indexOf("#")+1);
	console.log(mood);
	return mood;
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