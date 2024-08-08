document.getElementById('menu-button').addEventListener('click', function() {
    var mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.remove('hidden');
    } else {
        mobileMenu.classList.add('hidden');
    }
});


// document.getElementById('reservationForm').addEventListener('submit', function(event) {
//     event.preventDefault(); // Empêche l'envoi du formulaire pour afficher le pop-up
//     document.getElementById('popup').style.display = 'flex'; // Affiche le pop-up
// });

// document.getElementById('closePopup').addEventListener('click', function() {
//     document.getElementById('popup').style.display = 'none'; // Masque le pop-up
// });


// const passwordInput = document.getElementById('passwordInput');
// const togglePassword = document.getElementById('togglePassword');

document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById('passwordInput');
    const togglePassword = document.getElementById('togglePassword');

    if (passwordInput && togglePassword) {
        togglePassword.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    } else {
        console.error("Elements with IDs 'passwordInput' and/or 'togglePassword' were not found.");
    }
});


document.addEventListener("DOMContentLoaded", function() {
    const passwordInput1 = document.getElementById('passwordInput1');
    const togglePassword1 = document.getElementById('togglePassword1');

    if (passwordInput1 && togglePassword1) {
        togglePassword1.addEventListener('click', () => {
            if (passwordInput1.type === 'password') {
                passwordInput1.type = 'text';
            } else {
                passwordInput1.type = 'password';
            }
        });
    } else {
        console.error("Elements with IDs 'passwordInput' and/or 'togglePassword' were not found.");
    }
});
  
