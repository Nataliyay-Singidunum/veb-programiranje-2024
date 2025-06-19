<!doctype html>
<html>
    <head>
        <title>Plant Shop - Sign In</title>
        <link rel="stylesheet" href="./css/main.css">
        <link rel="icon" href="./assets/main/images/icon.png"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mirza:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Milonga&display=swap" rel="stylesheet">
        <link rel="icon" href="./assets/main/images/icon.png"/>

    </head>

    <body>

    <?php

$poruka = "";
if (isset($_GET['registracija'])) {
    if ($_GET['registracija'] == 1) {
        $poruka = "Vas nalog je registrovan, ceka se potvrda administratora";
    }
}

$greska = "";
if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
        $greska = "Niste uneli parametre";
    }
    if ($_GET['error'] == 2) {
        $greska = "Pogresna sifra ili nepostojeci korisnik";
    }
}
?>

        <header>
            <div id="head_left">
            <a href="home.php"><img src="./assets/main/images/icon.png"></a>
            <a href="#" class="mirza-bold">PLNTS</a>
            </div>
            <div id="head_right">
                <a href="user_home.php"><img src="./assets/main/meadia_icons/user.png"></a>
                <a href="cart.php"><img src="./assets/main/meadia_icons/cart.png"></a>
            </div> 
        </header>

        <nav class="mirza-medium">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="user.php">Plants</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="user_home.php">Account</a></li>
            </ul>
        </nav>


    <main>
        <section id="content">
            <aside>
                <img src="./assets/main/images/aside2.jpg">
            </aside>
            <aside id="sign_up">
                <h2 class="mirza-bold">Sign in</h2>
                <h3><?php echo $greska ?></h3>
                <h3><?php echo $poruka ?></h3>
                </br>
                <form action="check_user.php" method="post"> 
                    <label for="username">Username: </label></br>
                    <input type="text" id="username" name="username" ></br>

                    <label for="password">Password: </label></br>
                    <input type="password" id="password" name="password"></br></br>

                    <button type="submit" > Submit </button>   
            </form>
                    <a class="mirza-medium" href="./register.html"><p id="register">Don't have an account?<br/>Register here.<p></a>
            </aside>
        </section>
    </main>


        <footer class="mirza-medium">
            
                <div class="footer_index">Natalija Jolovic 2022202496</div>
            </BR>
                <div class="footer_icons">
                    <a href="https://www.linkedin.com/in/natalijajolovic/"><img src="./assets/main/meadia_icons/linkedin.png"></a>
                    <a href="https://github.com/Nnataliyay"><img src="./assets/main/meadia_icons/github.png"></a>
                    <a href="https://www.instagram.com/"><img src="./assets/main/meadia_icons/instagram.png"></a>
                </div>
            
        </footer>   


    </body>




</html>