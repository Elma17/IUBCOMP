function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

// Get the input element where the user enters their search query
// Convert the user's input to uppercase for case-insensitive searching
// Get the unordered list element where the list items are contained
// Get all the list items within the unordered list
     // Loop through all the list items
     // Get the first anchor (link) element within each list item
     // Get the text content of the anchor element
// Check if the text content of the anchor element (case-insensitive) contains the user's filter text
            // If it contains the filter text, display the list item
                        // If it does not contain the filter text, hide the list item