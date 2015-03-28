/*colors*/
var colors = {
	happy: {dark: "#001a0d", light: "#00b359"},
	sad: {dark: "#333", light: "#999"},
	angry: {dark: "#4d0000", light: "#e60000"},
	stressed: {dark: "#b34700", light: "#ff944d"},
	excited: {dark: "#ff8c00", light: "#ffdb4d"},
	calm: {dark: "#000d1a", light: "#0059b3"},
	meh:{dark: "#1a001a", light: "#b300b3"},
	"default":{dark: "#1a001a", light: "#b300b3"}
}

/*gradient stuff*/
window.onload = resetGradient;
window.onresize = resetGradient;

function resetGradient(mood) {
	console.log("resetting");
	var body = document.querySelector("body");
	var gradient = document.querySelector("#gradient");
	var height = gradient.clientHeight;
	console.log(gradient);
	console.log(height);
	
	while (gradient.firstChild) {
		gradient.removeChild(gradient.firstChild);
	}
	if (colors[mood]) {
		gradient.style.backgroundColor = colors[mood].light;
		body.style.backgroundColor = colors[mood].light;
	} 
	else {
		gradient.style.backgroundColor = colors["default"].light;
		body.style.backgroundColor = colors["default"].light;
	} 
	
	for (var i = height; i >= 0; i-=2) {
		var ombre = document.createElement("div");
		ombre.className = "ombre";
		if (colors[mood]) {ombre.style.backgroundColor = colors[mood].dark;} 
		else {ombre.style.backgroundColor = colors["default"].dark;} 
		ombre.style.height = "2px";
		ombre.style.opacity = i/height;
		gradient.appendChild(ombre);
	}
}