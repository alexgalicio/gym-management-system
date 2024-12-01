<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Infinity</title>
    <link rel="stylesheet" href="../../css/loginregister.css">

</head>

<body>

    <main>
        <div class="background">
            <a href="../../index.php">
                <h1>Fitness Infinity</h1>
            </a>
        </div>

        <div class="form-container">
            <div class="form">
                <div class="form-greet">
                    <h2>Hello!</h2>
                    <h3>Sign up to get started</h3>
                </div>

                <form id="recoverform" method="POST" action="register-cust.php" onsubmit="return validateForm()">

                    <div class="input-fields">

                        <input type="text" name="fullname" placeholder="Full Name" minlength="3" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="text" name="contact" pattern="09[0-9]{9}"
                            placeholder="Contact Number (09XXXXXXXXX)" required>
                        <input type="text" name="address" placeholder="Address" minlength="10" required>

                        <select name="gender" required>
                            <option value="" disabled selected>Please select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>

                        <select name="type" required>
                            <option value="" disabled selected>Please select Membership Type</option>
                            <option value="Walk-in">Walk-in</option>
                            <option value="Regular">Regular</option>
                            <option value="Student">Student</option>
                        </select>


                        <input type="text" name="username" placeholder="Username" required minlength="4"
                            onkeyup="checkUsername(this.value)">
                        <div id="username-status" class="username-status"></div>

                        <input type="password" name="password" placeholder="Password"
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
                            title="Password must contain at least one uppercase letter, one lowercase letter, one number, one symbol, and be at least 8 characters long."
                            required>
                    </div>

                    <div class="submit">
                        <button type="submit" class="login" type="submit">Create Account</button>
                        <a class="align-center" href="../login.php">Already have an account? Login</a>
                    </div>

                </form>

            </div>
        </div>
    </main>

    <script>
        let isUsernameAvailable = false;

        function checkUsername(username) {
            const statusDiv = document.getElementById('username-status');

            if (username.length < 4) {
                statusDiv.className = 'username-status';
                statusDiv.textContent = '';
                isUsernameAvailable = false;
                return;
            }

            fetch('actions/check-username-register.php?username=' + username)
                .then(response => response.text())
                .then(data => {
                    if (data === 'available') {
                        statusDiv.textContent = 'Username is available';
                        statusDiv.className = 'username-status available';
                        isUsernameAvailable = true;
                    } else {
                        statusDiv.textContent = 'Username is not available';
                        statusDiv.className = 'username-status not-available';
                        isUsernameAvailable = false;
                    }
                });
        }

        function validateForm() {
            if (!isUsernameAvailable) {
                alert('Please choose a different username. This one is not available.');
                return false;
            }
            return true;
        }
    </script>

</body>

</html>