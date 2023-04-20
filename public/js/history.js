// Get the button that opens the model
var btns = document.querySelectorAll(".btn");

// Loop through all the buttons and add the click event listener
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    // Get the ID of the button
    var historyId = this.id.slice(5); // remove "myImg" from the ID

    // Get the model and image associated with the button
    var model = document.getElementById("myModel"+historyId);
    var img = document.getElementById("img01"+historyId);

    // Set the image source and display the model
    console.log(img.src);
    // img.src = this.src;
    console.log(this);
    model.style.display = "block";

    let exit = document.getElementById(historyId);
    exit.onclick = function () {
        model.style.display = "none";
    }
  });
}
