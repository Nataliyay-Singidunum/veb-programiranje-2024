<!doctype html>
<html>
    <head>
        <title>Plant Shop - Sign Up</title>
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
                <h2 class="mirza-bold">Sign up</h2>
                    <form class="mirza-medium" action="ins_register.php" method="POST">
                        <label for="name">First name: </label></br>
                        <input type="text" id="name" name="name"></input></br>
                        <label for="surname">Surname: </label></br>
                        <input type="text" id="surname" name="surname"></input></br>
                        <label for="username">Username: </label></br>
                        <input type="text" id="username" name="username"></input></br>
                        <label for="password">Password: </label></br>
                        <input type="password" id="password" name="password"></input></br></br>
                        <span id="button-center">
                        <button class="mirza-bold" type="submit" value="OK"> Continue </button>   
                        </span>
                    </form>
                    <a class="mirza-medium" href="./index.php"><p id="register">Already have an account?<br/>Log in here.<p></a>
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