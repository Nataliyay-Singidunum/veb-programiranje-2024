<?php include 'session_checker.php'; ?>
<?php include 'conn.php'; ?>
<?php

$name = $_SESSION['name'];  // korisnikovo ime zapamceno kao session globalna promenljiva, settovano u check_user
$surname = $_SESSION['surname']; 
$username = $_SESSION['username']; // DODATI OVO

$user_id = $_SESSION['user_id']; // id trenutnog korisnika

$sql = "SELECT * FROM user WHERE user_id != :user_id"; // dohvatamo iz baze podatke o svim korisnicima osim trenutnog
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$users = $stmt->fetchAll(); // vraca asocijativni niz tj niz za svakog korisnika

// nakon kreiranja tabele automobil i sifarnickih tabela za tip i proizvodjaca,
// vrsimo upit i preuzimamo sve automobile iz baze
// upit vrsimo tako sto radimo spajanje tabela sa left join, i na mesta u tabeli automobili gde su idjevi iz sifarnickih tabela upisujemo polja iz istih
$sql = "SELECT plant.plant_name, plant.price, plant.plant_id, plant.current_stock,
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
$plants = $stmt->fetchAll(); // uzeli smo rezultat iz baze . on je u obliku asocijativnog niza.
// automobile kasnije izlistavamo kroz tabelu pomocu #foreach

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

        <!-- key index u nizu -->

        <?php foreach ($users as $key => $user) {
            $key++;
            // $key pocinje sa 0 da bismo ispisali redni broj od 1 pa nadalje radimo inkrementaciju
        ?>

            <div>
                <?php echo $key ?>.
                Ime: <?php echo $user['name'] ?>
                Prezime: <?php echo $user['surname'] ?>
                Username: <?php echo $user['username'] ?>
                <?php if ($user['is_active'] == 1) { ?>
                    <!-- Za deaktivaciju, šaljemo status=0 -->
                    <a href="activation.php?status=0&user_id=<?php echo $user['user_id'] ?>">Deaktiviraj</a>
                <?php } ?>
                <?php if ($user['is_active'] == 0) { ?>
                    <!-- Za aktivaciju, šaljemo status=1 -->
                    <a href="activation.php?status=1&user_id=<?php echo $user['user_id'] ?>">Aktiviraj</a>
                <?php } ?>
            </div>

        <?php } ?>

            <h1 style="padding: 20px 0;">Plant list</h1>
            <div class="mirza-medium" id="admin">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Family name</th>
                            <th>Size</th>
                            <th>Characteristic</th>
                            <th>Price</th>
                            <th>Current stock</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($plants as $plant) { ?>
                            <tr>
                                <td><?php echo $plant['plant_name'] ?></td>
                                <td><?php echo $plant['plant_family'] ?></td>
                                <td><?php echo $plant['plant_size'] ?></td>
                                <td><?php echo $plant['plant_characteristic'] ?></td>
                                <td><?php echo $plant['price'] ?> EUR</td>
                                <td><?php echo $plant['current_stock'] ?></td>
                                <td>
                                    <div>
                                        <a href="update_plant.php?plant_id=<?php echo $plant['plant_id'] ?>">+ </a>
                                    </div>
                                </td>
                                <td>
                                <div>
                                        <a href="delete_plant.php?plant_id=<?php echo $plant['plant_id'] ?>">+ </a>
                                    </div>
                                </td>
                            </tr>
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