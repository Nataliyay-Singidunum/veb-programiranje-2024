<?php include 'session_checker.php' ?>
<?php include 'conn.php' ?>

<?php
$user_id = $_SESSION['user_id'];
$sql = "SELECT  cart.cart_id,
                cart.quantity,
                plant.plant_name,
                plant.price,
                plant_family.plant_family,
                plant_size.plant_size
FROM cart
LEFT JOIN plant on cart.plant_id = plant.plant_id
LEFT JOIN plant_family on plant.family_id = plant_family.plant_family_id
LEFT JOIN plant_size on plant.size_id = plant_size.plant_size_id
WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
            <div class="mirza-medium" id="cart">
                <h2>Cart</h2>
                            <table >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Family name</th>
                                        <th>Size</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Bill</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($cartItems as $item) { ?>
                                        <?php $bill = $item['quantity'] * $item['price'] ?>
                                        <?php $total += $bill ?>

                                        <tr>
                                            <form action="update_cart.php" method="POST">
                                                <input type="text" hidden name="cart_id" value="<?php echo $item['cart_id'] ?>">
                                                <td><?php echo $item['plant_name'] ?></td>
                                                <td><?php echo $item['plant_family'] ?></td>
                                                <td><?php echo $item['plant_size'] ?></td>
                                                <td><input type="number" name="new_quantity" value="<?php echo $item['quantity'] ?>"></td>
                                                <td><?php echo $item['price'] ?> EUR</td>
                                                <td><?php echo $bill ?> EUR</td>
                                                <td><input type="submit" value="Change quantity"></td>
                                                <td>
                                                    <a href="delete_item_from_cart.php?cart_id=<?php echo $item['cart_id'] ?>">Delete item</a>
                                                </td>
                                            </form>

                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $total ?> eur</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
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