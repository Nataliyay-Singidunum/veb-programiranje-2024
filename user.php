<?php include 'session_checker.php'; ?>
<?php include 'conn.php'; ?>
<?php

$user_id = $_SESSION['user_id'];

$sql = "SELECT  plant.plant_name, plant.price, plant.plant_id, plant.current_stock,
                plant_family.plant_family,
                plant_size.plant_size ,
                plant_characteristic.plant_characteristic
        FROM plant 
        LEFT JOIN plant_family on plant.family_id = plant_family.plant_family_id
        LEFT JOIN plant_size on plant.size_id = plant_size.plant_size_id
        LEFT JOIN plant_characteristic on plant.characteristic_id = plant_characteristic.plant_characteristic_id
        ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$plants = $stmt->fetchAll();


$sql = "SELECT plant_id
FROM cart 
WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$userCart = $stmt->fetchAll();

$cartItemNumber = count($userCart);

$poruka = "";
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == "uspesno") {
        $poruka = "You have added the selected plant to your cart!";
    }
}
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
                <        <h2>Available plants</h2>
                <h3 style="color:green"><?php echo $poruka ?></h3>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Family name</th>
                            <th>Size</th>
                            <th>Characteristic</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($plants as $plant) { ?>
                            <?php $inCart = 0; ?>
                            <!-- pretpostavljamo da automobil nije u korpi -->
                            <?php foreach ($userCart as $item) { ?>
                                <?php if ($plant['plant_id'] == $item['plant_id']) {
                                    $inCart = 1;
                                    break;
                                    // ako se podudara idAutomobil sa idAutomovbil u bazi onda varijablu 
                                    // za kontrolu setujemo na 1 i u tom slucaju ne ispisujemo automobil na ekran
                                } ?>
                            <?php } ?>
                            <!-- ukoliko je uslov ispunjen onda ispisujemo ponudu automobila dostupnu za bukiranje -->
                            <?php if ($inCart == 0) {    ?>
                                <tr>
                                <td><?php echo $plant['plant_name'] ?></td>
                                <td><?php echo $plant['plant_family'] ?></td>
                                <td><?php echo $plant['plant_size'] ?></td>
                                <td><?php echo $plant['plant_characteristic'] ?></td>
                                <td><?php echo $plant['price'] ?> EUR</td>
                                    <td>
                                        <form action="ins_cart.php" method="post">
                                            <input type="text" hidden name="user_id" value="<?php echo $user_id ?>">
                                            <input type="text" hidden name="plant_id" value="<?php echo $plant['plant_id'] ?>">
                                            <input type="number" placeholder="Quantity" name="quantity">
                                            <input type="submit" value="Add">
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
        
                        <?php } ?>
                    </tbody>
                </table>
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