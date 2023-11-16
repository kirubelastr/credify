<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
        }
        
        header {
        background-color: #333;
        color: #fff;
        padding: 25px 0;
        text-align: center;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: static;
        width: 100%;
        z-index: 1000;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header-title {
        padding-left: 3%;
        font-size: 24px;
        font-weight: bold;
        }

        .logo {
        padding: 0 25px;
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 10px;
        }

        nav ul {
        
        list-style-type: none;
        margin: 0;
        padding-right: 10px;
        text-align: center;
        }

        nav ul li {
        display: inline;
        margin: 0 15px;
        }

        nav ul li a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s ease;
        }

        nav ul li a:hover {
        color: #e74c3c;
        }

        .disc {
            margin-top: 50px;
            margin-bottom: 5px;
            display: flex;
            justify-content: center;
            align-items: center;

            height: 15px;
            padding-top: 0;
        }
        .disc h2{
            font-size: 2rem;
            color: #ff7f50;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40vh;
            padding-top: 100px;
        }

        .form-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin: 0 20px;
        }

        .form-container h2 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #333;
        }

        .form-container input,
        .form-container select {
            width: calc(100% - 20px);
            margin-bottom: 1rem;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .form-container input:focus,
        .form-container select:focus {
            outline: none;
            border-color: #ff7f50;
        }

        .form-container button {
            background-color: #ff7f50;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #ff6347;
        }
    </style>
</head>

<body>
    <header>
    <div class="header-title">NDVS</div>
        <nav>
            <ul>
                <li><a href="index.php#home">Home</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#services">Services</a></li>
                <li><a href="index.php#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="disc"><h2>register/ login</h2>
    </div>
    <div class="container">
        <div class="form-container" id="registrationForm">
            <h2>Registration</h2>
            <form method="post" action="signup.php" onsubmit="return validateForm()">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>

                <!-- Role Selection -->
                <label for="role">Select Role:</label>
                <select id="role" name="role" onchange="handleRoleChange()" required>
                    <option value="user">User</option>
                    <option value="institute">Institute</option>
                    <option value="company">Company</option>
                </select>
                    <!-- Company Fields (Initially Hidden) -->
                    <div id="companyFields" style="display: none;">
                        <label for="companyname">Company Name:</label>
                        <input type="text" id="companyname" name="companyname">
                        <label for="subscription">Subscription Type:</label>
                        <select id="subscription" name="subscription" required>
                            <option value="monthly">Monthly</option>
                            <option value="halfyearly">Half Yearly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                        <label for="paymentMethod">Payment Method:</label>
                        <select id="paymentMethod" name="paymentMethod" required>
                            <option value="creditcard">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="banktransfer">Bank Transfer</option>
                        </select>
                        <label for="accountNumber">Account Number:</label>
                        <input type="text" id="accountNumber" name="accountNumber">
                    </div>
                <button type="submit" name="signup">Sign up</button>
            </form>
        </div>

        <div class="form-container" id="login">
            <h2>Login</h2>
            <form method="post" action="loginauth.php" onsubmit="return validateLoginForm()">
                <label for="loginEmail">Email:</label>
                <input type="email" id="loginEmail" name="loginEmail" required>
                <label for="loginPassword">Password:</label>
                <input type="password" id="loginPassword" name="loginPassword" required>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>

<script>
        function handleRoleChange() {
            var role = document.getElementById("role").value;
            var companyFields = document.getElementById("companyFields");

            if (role === "company") {
                companyFields.style.display = "block";
            } else {
                companyFields.style.display = "none";
            }
        }

        document.getElementById("role").addEventListener("change", handleRoleChange);

        function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var role = document.getElementById("role").value;
    var companyname = document.getElementById("companyname").value;
    var subscription = document.getElementById("subscription").value;
    var paymentMethod = document.getElementById("paymentMethod").value;

    if (email === "" || password === "" || confirmPassword === "") {
        alert("Email, password, and confirm password are required");
        return false;
    }

    // Password validation
    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordPattern.test(password)) {
        alert("Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match");
        return false;
    }

    if (role === "company") {
        if (companyname === "" || subscription === "" || paymentMethod === "") {
            alert("Company name, subscription, and payment method are required for companies");
            return false;
        }
    }

    return true; 
}


    function validateLoginForm() {
        var loginEmail = document.getElementById("loginEmail").value;
        var loginPassword = document.getElementById("loginPassword").value;

        if (loginEmail === "" || loginPassword === "") {
            alert("Email and password are required");
            return false;
        }

        return true; 
    }
</script>

</body>

</html>
