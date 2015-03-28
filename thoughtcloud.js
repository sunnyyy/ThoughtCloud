var thought_array = ["So many stickers at Brandeis #Codestellation #happy"];

function submitting() {
  successful_post();
  var thought_text = document.getElementById('thoughtbox').value;
  document.getElementById('HERE').innerHTML = thought_text;
  thought_array.push(thought_text);
}); // end of .click call

function searching(string) {
	var index;
	var text;
	for	(index = 0; index < thought_array.length; index++) {
		if (thought_array[index].indexOf(string) > -1) {
			//string is in this index of the array
			text += "<div class='item'><p>" + thought_array[index] + "</p></div>";
		}
  }
  document.getElementById('LIST').innerHTML = text;
}

successful_post() {
	$(html).find('h1').css('color','red');
}