function triggerAutocomplete(searchTerm) {
    // Send an AJAX request to a new file (autocomplete.php) to fetch student names
    $.ajax({
        url: "autocomplete.php", // New PHP file to handle autocomplete functionality
        method: "POST",
        data: { searchQuery: searchTerm },
        dataType: "json",
        success: function (data) {
            // Populate the datalist with the returned student names
            var datalist = document.getElementById("studentSuggestions");
            datalist.innerHTML = "";

            data.forEach(function (studentName) {
                var option = document.createElement("option");
                option.value = studentName;
                datalist.appendChild(option);
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

// Function to auto-fill other fields based on the selected student name
function fillStudentDetails() {
    var selectedStudent = document.getElementById("searchStudent").value;

    // Send an AJAX request to fetch student details based on the selected student name
    $.ajax({
        url: "getStudentDetails.php", // New PHP file to handle the AJAX request
        method: "POST",
        data: { studentName: selectedStudent },
        dataType: "json",
        success: function (data) {
            // Update the corresponding input fields with the fetched data
            document.getElementById("studentNationality").value = data.studentNationality;
            document.getElementById("studentPassportNo").value = data.studentPassportNo;
            document.getElementById("studentID").value = data.studentID;
            // Update other fields if needed
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}
