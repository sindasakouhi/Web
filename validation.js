document.getElementById("travel").addEventListener("submit", function(event) {
    let title = document.getElementById("Title").value.trim();
    let destination = document.getElementById("Destination").value.trim();
    let departureDate = new Date(document.getElementById("departureDate").value);
    let returnDate = new Date(document.getElementById("returnDate").value);
    let price = document.getElementById("Price").value.trim();
    if (title.length < 3) {
        alert("The title must be at least 3 characters long.");
        event.preventDefault();
        return;
    }
    let destinationRegex = /^[A-Za-zÀ-ÿ ]{3,}$/;
    if (!destinationRegex.test(Destination)) {
        alert("Destination must be at least 3 letters long and contain only letters and spaces.");
        event.preventDefault();
        return;
    }
    if (returnDate <= departureDate) {
        alert("Return Date must be after Departure Date.");
        event.preventDefault();
        return;
    }


    if (isNaN(Price) || parseFloat(Price) <= 0) {
        alert("Price must be a positive number.");
        event.preventDefault();
        return;
    }

    alert("Travel offer added successfully!");
});