<?php
include 'db_connect.php';
session_start();
$query = "SELECT * FROM vijesti WHERE id = " . $_GET['id'] . ";";
$rezultat = mysqli_query($conn, $query);
$clanak = mysqli_fetch_array($rezultat);
?>
<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/news.css">
    <meta name="description" content="F1 news page as a uni project">
    <meta name="keywords" content="Formula1, F1, Max Verstappen, Lewis Hamilton">
    <meta name="author" content="Toma Milićević">
    <link rel="shortcut icon" href="images/f1_favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title><?php echo ucfirst($clanak['naslov']); ?></title>
</head>

<body>
    <header>
        <img src="images/F1.svg.png" alt="">
        <h3>Welcome <?php echo isset($_SESSION['korisnicko_ime']) ? $_SESSION['korisnicko_ime'] : 'Guest'; ?></h3>
        <div> <?php
            echo date('D, M jS, Y');?>
        </div>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="unos.php">UNOS VIJESTI</a></li>
                    <?php if (isset($_SESSION['razina']) && $_SESSION['razina'] == 1) : ?>
                        <li><a href="admin.php">ADMIN</a></li>
                    <?php endif; ?>
                    <li><a href="registracija.php">REGISTRACIJA</a></li>
                    <li><a href="prijava.php">PRIJAVA</a></li>
                </ul>
            </nav>
    </header>
    <main>
        <article>
            <h1>FORMULA <span><?php echo substr($clanak['kategorija'],1); ?></span></h1>
            <h2><?php echo $clanak['naslov']; ?></h2>
            <div id="news_date">
                <?php echo date_format(date_create($clanak['datum']), "d/m/Y"); ?>
            </div>
            <img src="images/<?php echo $clanak['slika']; ?>" alt="News 1">
            <p><?php echo $clanak['sadrzaj']; ?></p>
            <br>
            <p><?php echo '<span class="first-letter">' . substr($clanak['tekst'], 0, 1) . '</span>' . substr($clanak['tekst'], 1);; ?></p></br>
        </article>
    </main>
    <footer>
        <p>&copy; 2024 Formula 1 News | Autor: Toma Milićević | Kontakt: tmilicev1@tvz.hr</p>
    </footer>
</body>

</html>