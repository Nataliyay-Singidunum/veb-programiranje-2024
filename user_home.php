<?php include 'session_checker.php'; ?>
<?php include 'conn.php'; ?>
<?php

$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];  // korisnikovo ime zapamceno kao session globalna promenljiva, settovano u check_user
$surname = $_SESSION['surname']; 
$username = $_SESSION['username']; // DODATI OVO


$sql = "SELECT plant_id
FROM cart 
WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$userCart = $stmt->fetchAll();

$cartItemNumber = count($userCart);

?>

<!doctype html>
<html>
    <head>
        <title>Plant Shop - Account</title>
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
                <span style="color: white;"><?php echo $cartItemNumber; ?></span>
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
            <div class="mirza-medium" id="user_account">
                <h2 class="mirza-bold">Welcome!</h2><br/><br/>
                <h3>Username: <?php echo $username; ?></h3><br/>
                <h3>Name: <?php echo $name; ?></h3><br/>
                <h3>Surname: <?php echo $surname; ?></h3><br/><br/>
                <h3><a href="log_out.php">Log out</a></h3><br/>
                <span style="position: absolute; top:0; right:20px">
            </div>
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