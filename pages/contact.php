<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Infinity</title>
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <header>
        <a href="index.php" class="brand">FITNESS <span>INFINITY</span></a>

        <div class="link-container">
            <a href="../index.php" class="link">Home</a>
            <a href="about.php" class="link">About</a>
            <a href="contact.php" class="link">Contact</a>
            <a href="login.php" class="btn-login">Log In</a>
        </div>
    </header>

    <main>
        <img src="../img/gym-background-vertical.jpg" class="background-img-vertical">
        <img src="../img/gym-background-wide.jpg" class="background-img-wide">

        <div class="row">
            <div class="left col">
                <h1>CONTACT US</h3>
                    <div class="detail">
                        <i class="fas fa-envelope"></i>
                        <p>fitnessinfinityph@gmail.com</p>
                    </div>

                    <div class="detail">
                        <i class="fas fa-phone"></i>
                        <p>+63 935 776 2411</p>
                    </div>

                    <div class="detail">
                        <i class="fas fa-location-dot"></i>
                        <p>Citywalk Sports Center, Malolos, Bulacan, Philippines</p>
                    </div>

                    <div class="detail">
                        <i class="fas fa-clock"></i>
                        <p>08:00 AM - 09:00 PM</p>
                    </div>
            </div>

            <div class="right col">
                <h3>Feel free to contact us anytime. We will get back to you as soon as we can!</h3>
                <form action="send-email.php" method="POST">
                    <label>Subject</label>
                    <input type="text" name="subject" placeholder="Enter subject" required>

                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter email" required>

                    <label>Message</label>
                    <input type="text" name="message" placeholder="Type your message" class="message" required>

                    <button type="submit">Submit</button>

                </form>
            </div>
        </div>

    </main>

</body>

</html>