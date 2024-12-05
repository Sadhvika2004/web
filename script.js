$(document).ready(function () {
    // Validate the Registration Form
    $('#registerForm').on('submit', function (event) {
        const name = $('#regName').val().trim();
        const email = $('#regEmail').val().trim();
        const password = $('#regPassword').val().trim();

        if (!name || !email || !password) {
            alert('All fields are required!');
            event.preventDefault(); // Prevent form submission
        } else if (password.length < 6) {
            alert('Password must be at least 6 characters long!');
            event.preventDefault(); // Prevent form submission
        }
    });

    // Validate the Login Form
    $('#loginForm').on('submit', function (event) {
        const email = $('#loginEmail').val().trim();
        const password = $('#loginPassword').val().trim();

        if (!email || !password) {
            alert('Both email and password are required!');
            event.preventDefault(); // Prevent form submission
        }
    });

    // Add animation to form display
    $('.form-box').hide().fadeIn(1000);

    // Highlight the active form (optional)
    $('form').hover(
        function () {
            $(this).css('background-color', '#f0f8ff');
        },
        function () {
            $(this).css('background-color', 'white');
        }
    );
});
