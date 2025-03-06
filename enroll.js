document.getElementById("enrollmentForm").addEventListener("submit", function (event) {
    event.preventDefault();
    showPopup("Are you sure all the data you have entered is correct?", true);
});

function showPopup(message, isConfirmation) {
    const popup = document.getElementById("popupWarning");
    const popupMessage = document.getElementById("popupMessage");
    const confirmButton = document.getElementById("confirmButton");
    const dismissButton = document.getElementById("dismissButton");

    popupMessage.textContent = message;

    if (isConfirmation) {
        confirmButton.style.display = "inline-block";
        confirmButton.onclick = submitForm;
        dismissButton.textContent = "Cancel";
    } else {
        confirmButton.style.display = "none";
        dismissButton.textContent = "Dismiss";
    }

    popup.style.display = "flex";
}
function submitForm() {
    const form = document.getElementById("enrollmentForm");
    const formData = new FormData(form);

    fetch("enroll.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.text())
        .then((data) => {
            console.log(data);
            showPopup("Your form has been submitted successfully!", false);
        })
        .catch((error) => {
            console.error("Error:", error);
            showPopup("An error occurred while submitting your form. Please try again.", false);
        });
}

function hidePopup() {
    const popup = document.getElementById("popupWarning");
    popup.style.display = "none";
}
