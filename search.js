/*gradient stuff*/
window.onload = resetGradient;
window.onresize = resetGradient;

function resetGradient() {
	var gradient = document.querySelector("#gradient");
	var height = gradient.clientHeight;
	console.log(gradient);
	console.log(height);
	
	while (gradient.firstChild) {
		gradient.removeChild(gradient.firstChild);
	}
	
	for (var i = height; i >= 0; i-=2) {
		var ombre = document.createElement("div");
		ombre.className = "ombre";
		ombre.style.height = "2px";
		ombre.style.opacity = i/height;
		gradient.appendChild(ombre);
	}
}

/*search button stuff*/
var button = document.querySelector("button"); 
var results = document.querySelector("#results");

button.onclick = function () {
	// while (results.firstChild) {
		// results.removeChild(results.firstChild);
	// } //clear results
	
	var input = document.querySelector("#search");
	var value = input.value;
	
	var result = document.createElement("div");
	result.innerHTML = value;
	result.className = "oneResult";
	results.appendChild(result);
}