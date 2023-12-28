// Get the select element
var selectElement = document.getElementById("accounting-select");

// Add a change event listener to the select element
selectElement.addEventListener("change", function() {
  // Get the selected value
  var selectedValue = this.value;

  // Check the selected value and redirect the user to the appropriate page
  if (selectedValue === "finance") {
    window.location.href = "recieptform.php";
  } 
});
