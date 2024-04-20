function deleteItem(event) {
    event.preventDefault(); // Prevent the default behavior of the anchor tag

    var itemId = event.currentTarget.getAttribute('data-itemid'); // Get the value of the data-itemid attribute

    console.log(itemId); // Log the itemId value to the console
    
    // Delete the entire row (tr) containing the node
    var tr = event.currentTarget.closest('tr'); // Get the closest parent tr element of the clicked button
    tr.parentNode.removeChild(tr); // Remove the tr element from its parent

    // Create and configure an XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '', true); // Replace 'delete-url' with the corresponding delete URL on the server-side
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Event handler for when the request is completed
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Handle the successful response from the server
            console.log('Item deleted successfully.');

            // Perform any necessary actions after successful deletion, e.g., updating the user interface
        } else {
            // Handle the error from the server
            console.log('Error occurred while deleting the item.');
            // Handle the error, e.g., displaying an error message to the user
            window.location.reload(); // Reload the page if deletion fails
        }
    };

    // Send the delete request with the passed data
    xhr.send('delete=' + encodeURIComponent(itemId));
}