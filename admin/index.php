<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website With Login & Registration | Codehal</title>
    <body>
        <div class="wrapper">
            <!-- Add your logo here -->
            <img src="https://raw.githubusercontent.com/liz173/ACICSTANCE-CORNER/refs/heads/liz173-patch-1/acicstance%20logo.png" alt="Logo" style="width: 100px; margin-bottom: 20px;">
    
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
                
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'Poppins', sans-serif;
                }
            
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    margin: 0;
                    overflow: hidden;
                    position: relative;
                }
            
                /* Blurred image background */
                body::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: url('https://media.licdn.com/dms/image/v2/C5605AQFcnq9q1v2ISw/videocover-low/videocover-low/0/1598795336501?e=2147483647&v=beta&t=JlgGhUFnrv4PQfP6KbCV0Q3C9aVz8gaweDy4GGqpbow') no-repeat center center / cover;
                    filter: blur(8px);
                    z-index: -2;
                }
            
                /* Gradient and frosted glass effect */
                body::after {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: radial-gradient(circle, rgb(219, 221, 222), rgba(33, 182, 241, 0.4), rgba(10, 117, 204, 0.6));
                    backdrop-filter: blur(10px);
                    z-index: -1;
                }
            
                .wrapper {
                    position: relative;
                    z-index: 0;
                    width: 100%;
                    max-width: 500px;
                    padding: 40px;
                    background: rgba(255, 255, 255, 0.1);
                    border-radius: 16px;
                    backdrop-filter: blur(15px) saturate(180%);
                    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
                    text-align: center;
                    border: 1px solid rgba(255, 255, 255, 0.1);
                    overflow: hidden;
                }

                /* Add a pseudo-element to create a decorative border effect outside the padding */
                .wrapper::before {
                    content: "";
                    position: absolute;
                    top: -10px;
                    left: -10px;
                    right: -10px;
                    bottom: -10px;
                    border-radius: 24px; /* Slightly more rounded than the inner box */
                    border: 2px dashed rgba(255, 255, 255, 0.2); /* Decorative dashed border */
                    pointer-events: none; /* Ensure it doesn't affect interactions */
                    background: linear-gradient(
                        135deg,
                        rgba(255, 255, 255, 0.1) 0%,
                        rgba(255, 255, 255, 0.2) 100%
                    );
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
                    backdrop-filter: blur(10px);
                }



                .login-link, .register-link {
                    color: #056b97;
                    text-decoration: none;
                }
            
                .login-link:hover, .register-link:hover {
                    text-decoration: underline;
                }
            
                .btnLogin-popup {
                    display: block;
                    margin-top: 20px;
                    padding: 10px 20px;
                    background-color: #056b97;
                    color: rgb(255, 255, 255);
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
            
                .btnLogin-popup:hover {
                    background-color: #056b97;
                }
            
                .icon-close {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    font-size: 24px;
                    cursor: pointer;
                }
            
                /* Container for forms */
                .form-container {
                    display: none;
                }
            
                .active {
                    display: block;
                }
            
                .input-group {
                    margin-bottom: 15px;
                    text-align: left;
                }
            
                .input-group label {
                    font-size: 14px;
                    color: #056b97;
                    margin-bottom: 5px;
                    display: block;
                }
            
                .input-group input {
                    width: 100%;
                    padding: 10px;
                    font-size: 16px;
                    border: 1px solid #cccccc;
                    border-radius: 4px;
                }
            
                #forgot-password-link {
                    color: #056b97;
                    text-decoration: none;
                }
            
                #forgot-password-link:hover {
                    color: #056b97;
                    text-decoration: underline;
                }
            
                .checkbox-container {
                    display: flex;
                    align-items: center;
                    margin-top: 5px;
                }
            
                .checkbox-container input[type="checkbox"] {
                    width: auto;
                    margin-left: 5px;
                    vertical-align: top;
                    
                }
            
                .checkbox-container label {
                    margin-left: 5px;
                    font-size: 14px;
                    color: #056b97;
                }
            
                button {
                    width: 100%;
                    padding: 10px;
                    font-size: 16px;
                    background-color: #18a6e8bf;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
            
                button:hover {
                    background-color: #055397ab;
                }
            
                #login-error-message {
                    color: red;
                    font-size: 14px;
                    margin-top: 10px;
                }

            
                /* Add a background overlay for the wrapper */
                .wrapper::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;

                background: rgba(255, 255, 255, 0.253); /* Dark overlay for contrast */
                    border-radius: 8px;
                    z-index: -1; /* Keep overlay behind the content */
                }
            
                /* Custom Scrollbar for Webkit Browsers */
                ::-webkit-scrollbar {
                    width: 8px;
                }
            
                ::-webkit-scrollbar-thumb {
                    background: #00796b;
                    border-radius: 10px;
                }
            
                ::-webkit-scrollbar-thumb:hover {
                    background: #00695c;
                }
            </style>
            
        </head>
        <body>
    <div class="wrapper">

        <!-- Login Form -->
        <div id="login-form" class="form-container active">
            <h2>Login</h2>
            <form id="loginForm" action="login.php" method="POST">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="password-group">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('password')">&#128065;</span>
                    </div>
                </div>
                <button type="submit">Login</button>
                <p id="login-error-message"></p>
                <p>Don't have an account? <a href="#" class="register-link">Register here</a></p>
                <p><a href="#" id="forgot-password-link">Forgot Password?</a></p>
            </form>
        </div>

        <!-- Forgot Password Form -->
        <div id="forgot-password-form" class="form-container">
            <h2>Forgot Password</h2>
            <form id="forgotPasswordForm">
                <div class="input-group">
                    <label for="forgot-email">Email</label>
                    <input type="email" id="forgot-email" name="forgot-email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <label for="new-password">New Password</label>
                    <div class="password-group">
                        <input type="password" id="new-password" name="new-password" placeholder="New Password" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('new-password')">&#128065;</span>
                    </div>
                </div>
                <button type="submit">Submit</button>
                <p id="forgot-password-error-message"></p>
                <p>Remembered your password? <a href="#" class="login-link">Login here</a></p>
            </form>
        </div>

        <!-- Registration Form -->
        <div id="register-form" class="form-container">
            <h2>Create Account</h2>
            <form id="registerForm">
                <div class="input-group">
                    <label for="reg-name">Full Name</label>
                    <input type="text" id="reg-name" name="full_name" placeholder="Your Name" required>
                </div>
                <div class="input-group">
                    <label for="reg-email">Email</label>
                    <input type="email" id="reg-email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <label for="reg-password">Password</label>
                    <div class="password-group">
                        <input type="password" id="reg-password" name="password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility('reg-password')">&#128065;</span>
                    </div>
                </div>
                <button type="button" id="registerSubmitButton">Register</button>
                <p id="register-error-message"></p>
                <p>Already have an account? <a href="#" class="login-link">Login here</a></p>
            </form>
        </div>

        <script>
        // Toggle password visibility
        function togglePasswordVisibility(passwordFieldId) {
            const passwordField = document.getElementById(passwordFieldId);
            passwordField.type = passwordField.type === "password" ? "text" : "password";
        }

        // Form navigation
        document.querySelectorAll('.register-link').forEach(link => {
            link.addEventListener('click', () => showForm('register-form'));
        });

        document.querySelectorAll('.login-link').forEach(link => {
            link.addEventListener('click', () => showForm('login-form'));
        });

        document.getElementById('forgot-password-link').addEventListener('click', () => {
            showForm('forgot-password-form');
        });

        function showForm(formId) {
            document.querySelectorAll('.form-container').forEach(form => {
                form.classList.remove('active');
            });
            document.getElementById(formId).classList.add('active');
        }

        // Handle login form submission
        document.getElementById('registerSubmitButton').addEventListener('click', function () {
        const name = document.getElementById('reg-name').value;
        const email = document.getElementById('reg-email').value;
        const password = document.getElementById('reg-password').value;

        if (name && email && password) {
            fetch('register.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `full_name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    showForm('login-form'); // Show login form
                } else {
                    document.getElementById('register-error-message').textContent = data.message;
                }
            })
            .catch(() => {
                document.getElementById('register-error-message').textContent = 'Something went wrong. Please try again.';
            });
        } else {
            document.getElementById('register-error-message').textContent = 'Please fill all fields.';
        }
    });

    </script>


        <style>
            .form-container {
                display: none;
            }
            .form-container.active {
                display: block;
            }
            .password-group {
                position: relative;
            }
            .toggle-password {
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                font-size: 18px;
            }
        </style>




            <script>
                const wrapper = document.querySelector('.wrapper');
                const loginLink = document.querySelectorAll('.login-link');
                const registerLink = document.querySelector('.register-link');
                const forgotPasswordLink = document.getElementById('forgot-password-link');

                const loginForm = document.getElementById('login-form');
                const registerForm = document.getElementById('register-form');
                const forgotPasswordForm = document.getElementById('forgot-password-form');

                let registeredEmail = null;
                let registeredPassword = null;

                loginLink.forEach(link => {
                    link.addEventListener('click', () => {
                        loginForm.classList.add('active');
                        registerForm.classList.remove('active');
                        forgotPasswordForm.classList.remove('active');
                    });
                });

                registerLink.addEventListener('click', () => {
                    registerForm.classList.add('active');
                    loginForm.classList.remove('active');
                    forgotPasswordForm.classList.remove('active');
                });

                forgotPasswordLink.addEventListener('click', (event) => {
                    event.preventDefault();
                    forgotPasswordForm.classList.add('active');
                    loginForm.classList.remove('active');
                    registerForm.classList.remove('active');
                });

                document.getElementById('registerForm').addEventListener('submit', function(event) {
                event.preventDefault();
                const email = document.getElementById('reg-email').value;
                const password = document.getElementById('reg-password').value;

                if (email && password) {
                registeredEmail = email;
                registeredPassword = password;
                alert('Registration successful');
                
                // Remove or hide the wrapper after successful registration
                wrapper.style.display = 'none'; // Hides the wrapper
                // Alternatively, to completely remove it from the DOM, use:
                // wrapper.remove();
                } else {
                document.getElementById('register-error-message').textContent = 'All fields are required';
            }
        });


        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            fetch('login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    // Redirect to a dashboard or homepage
                    window.location.href = 'dashboard.php'; // Adjust as needed
                } else {
                    document.getElementById('login-error-message').textContent = data.message;
                }
            })
            .catch(() => {
                document.getElementById('login-error-message').textContent = 'An error occurred. Please try again.';
            });
        });

        
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const email = document.getElementById('forgot-email').value;
            const newPassword = document.getElementById('new-password').value;

            if (email === registeredEmail) {
                registeredPassword = newPassword;
                alert('Password reset successful');
                forgotPasswordForm.classList.remove('active');
                loginForm.classList.add('active');
            } else {
                document.getElementById('forgot-password-error-message').textContent = 'Email not found';
            }
        });

        function togglePasswordVisibility(id) {
            const passwordField = document.getElementById(id);
            passwordField.type = passwordField.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>