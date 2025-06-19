<?php
// echo "<pre>";
// // var_dump($_post) ISPIS VARIJABLE SA TIPOM PODATKA I DUZINOM
// echo "</pre>";


if (isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {


    // var_dump($_POST); // izlistava sve promenljive iz forme 
    include 'conn.php'; 
    // bindovanje se koristi kako bi se sprecio sql injection
    // prednost PDO u odnosu na mySQLi
    $username = $_POST['username']; // ovo je povezano preko name-a u formi
    $password = $_POST['password'];
    $is_active = 1; // defaukt vrednost

                                                               //mapa ka usernameu, tehnocki moze se staviti i odmah promenljiva ali je pravilnije mapirati
    $upit = $pdo->prepare("SELECT * FROM user WHERE username = :username AND password = :password AND is_active =:is_active"); // poklapa vrednosti kako bi se nasao pass za odredjeni username
    // Vezivanje parametara
    $upit->bindParam(':username', $username);  // vrednost mape je ona dobavljena iz forme
    $upit->bindParam(':password', $password);
    $upit->bindParam(':is_active', $is_active); // ostavljamo aktivnost kao polje kako bi moglo da se izvede banovanje usera ili slicno

    $upit->execute();

    // Fetch rezultata = fetch vraca samo 1 red
    // fetchAll = fetchAll vraca sve redove za koje se poklopio uslov
    $rezultat = $upit->fetch(PDO::FETCH_ASSOC); // fetch_ASSOC vraca asocijativni niz.


    if (!$rezultat) {  // ako je los rezultat
        header("Location:index.php?error=2"); // vrsi se redirekcija
        exit();
    } else { 
        session_start(); // settujemo vrednosti za sesiju iz naseg rezultata
        $_SESSION['user_id'] = $rezultat['user_id']; 
        $_SESSION['name'] = $rezultat['name'];
        $_SESSION['surname'] = $rezultat['surname'];
        $_SESSION['username'] = $rezultat['username'];
        $_SESSION['role_id'] = $rezultat['role_id'];


        if ($_SESSION['role_id'] == 1) {
            header("Location:admin.php"); // redirekcija na admin home
            exit();
        }
        if ($_SESSION['role_id'] == 2) {
            header("Location:user.php");     // redirekcija na user home 
            exit();
        }

        // USPESNO
    }
} else {
    header("Location:index.php?error=1");
    exit();
    // header redirektuje korisnika na stranu upisanu nakon location:
    // error 1  znaci da nisu uneti parametri
}
