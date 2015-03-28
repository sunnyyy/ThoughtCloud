var counter;
var thoughts = ["So many stickers at Brandeis #Codestellation #happy"];

function submitting() {
  counter++;
  successful_post();
  document.getElementById('HERE').innerHTML = document.getElementById('thoughtbox').value;
}); // end of .click call

successful_post() {
	$(html).find('h1').css('color','red');
}