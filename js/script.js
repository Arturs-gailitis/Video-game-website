document.getElementById("years_before").textContent = 2015 + " - ";

document.getElementById("corrent_year").textContent = new Date().getFullYear();

const footer = document.getElementById("footer");

footer.addEventListener("mouseover", function() {
    footer.style.backgroundColor = "darkgrey";
    footer.style.color = "brown";
});

footer.addEventListener("mouseout", function() {
    footer.style.backgroundColor = "black";
    footer.style.color = "white";
});

document.getElementById("contactForm").addEventListener("submit", function(event) {

    event.preventDefault(); 

    let error = false;
    let e_massage = ''

    document.getElementById("ErrorMassage").innerHTML = ''; 

    let name = document.getElementById("name").value.trim();

    let email = document.getElementById("email").value.trim();

    let message = document.getElementById("message").value.trim();

    if (name.length == 0) {
        error = true;
        e_massage = '<div class="alert alert-danger">Name is required.</div>';
    } else if (email.length == 0) {
        error = true;
        e_massage = '<div class="alert alert-danger">Email is required.</div>';
    }

    let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (!emailRegex.test(email)) {
        error = true;
        e_massage = '<div class="alert alert-danger">The email is not valid.</div>';
    }

    if (message.length < 10) {
        error = true;
        e_massage = '<div class="alert alert-danger">Message is to short.</div>';
    }

    if (error == true) {
        document.getElementById("ErrorMassage").innerHTML = e_massage;
    } else {
        document.getElementById("ErrorMassage").innerHTML = '<div class="alert alert-success">Form is submitted correctly.</div>';
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.getElementById("serviceDropdown");
    if (dropdown) {
        const cards = Array.from(document.querySelectorAll(".card"));

        dropdown.addEventListener("change", function () {
            const selected = dropdown.value.toLowerCase();

            cards.forEach(card => {
                const content = card.innerText.toLowerCase();
                const matches = selected === "" || content.includes(selected);
                card.parentElement.style.display = matches ? "block" : "none";
            });
        });
    }
});