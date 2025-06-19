<?php include 'session_checker.php'; ?>
<?php include 'conn.php'; ?>
<?php

$plant_id = $_GET['plant_id'];

$sql = "SELECT *
        FROM plant
        WHERE plant_id = :plant_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':plant_id', $plant_id);
$stmt->execute();

// uzeli smo podatke one biljke koju zelimo izmeniti
$plant_to_update = $stmt->fetch(PDO::FETCH_ASSOC);

$upit = $pdo->prepare("SELECT * FROM plant_family");
// Vezivanje parametara
$upit->execute();
$plant_families = $upit->fetchAll(PDO::FETCH_ASSOC);

$upit = $pdo->prepare("SELECT * FROM plant_size");
// Vezivanje parametara
$upit->execute();
$plant_sizes = $upit->fetchAll(PDO::FETCH_ASSOC);

$upit = $pdo->prepare("SELECT * FROM plant_characteristic");
// Vezivanje parametara
$upit->execute();
$plant_characteristics = $upit->fetchAll(PDO::FETCH_ASSOC);

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
            <div class="mirza-medium" id="update_plant">
                <h1>Update plant</h1>
    <form action="update_plant_action.php" method="POST">

        <div>
            <label for="plant_name">Name</label>
            <input type="text" name="plant_id" hidden value="<?php echo $plant_id // ovo je hidden jer korisniku nije bitno ali bi trebalo postojati?>">
            <input id="plant_name" type="text" name="plant_name" value="<?php echo $plant_to_update['plant_name'] ?>">
        </div>

        <div>
            <label for="plant_family_name">Family name</label>
            <select name="plant_family_name" id="plant_family_name">
                <?php foreach ($plant_families as $row) {
                    $selected = "";
                    if ($row['plant_family_id'] == $plant_to_update['family_id']) {
                        $selected = "selected";
                    }
                ?>
                    <option <?php echo $selected ?> value="<?php echo $row['plant_family_id'] ?>"><?php echo $row['plant_family'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <label for="plant_size">Size</label>
            <select name="plant_size" id="plant_size">
                <!-- uzimamo prvi red, i u foreach petlji ga nazivamo $row (ili bilo kako drugacije), i tretiramo ga kao red iz niza -->
                <?php foreach ($plant_sizes as $row) {
                    $selected = "";
                    if ($row['plant_size_id'] == $plant_to_update['size_id']) {
                        $selected = "selected";
                    }
                ?>
                    <option <?php echo $selected ?> value="<?php echo $row['plant_size_id'] ?>"><?php echo $row['plant_size'] ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div>
            <label for="plant_characteristic">Characteristic</label>
            <select name="plant_characteristic" id="plant_characteristic">
                <!-- uzimamo prvi red, i u foreach petlji ga nazivamo $row (ili bilo kako drugacije), i tretiramo ga kao red iz niza -->
                <?php foreach ($plant_characteristics as $row) {
                    $selected = "";
                    if ($row['plant_characteristic_id'] == $plant_to_update['characteristic_id']) {
                        $selected = "selected";
                    }
                ?>
                    <option <?php echo $selected ?> value="<?php echo $row['plant_characteristic_id'] ?>"><?php echo $row['plant_characteristic'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <label for="price">Price</label>
            <input id="price" type="number" name="price" value="<?php echo $plant_to_update['price'] ?>">
        </div>

        <div>
            <label for="current_stock">Current stock</label>
            <input id="current_stock" type="number" name="current_stock" value="<?php echo $plant_to_update['current_stock'] ?>">
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>

    </form>
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