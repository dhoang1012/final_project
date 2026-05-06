<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Arrivals | Scent Atelier</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>


<section class="page-hero">
    <h1>New Arrivals</h1>
    <p>The latest additions to Scent Atelier.</p>
</section>

<section class="product-section new-arrivals">

    <div class="product-grid">

        <div class="product-card">
            <a href="hinode.php">
                <div class="img-box">
                    <img src="images/hinode.png" alt="O.B.A. Hinode">
                </div>
                <h3>O.B.A. Hinode</h3>
            </a>
            <p class="price">$129.99</p>
            <p class="price-note">Discovery sizes available</p>
        </div>

        <div class="product-card">
            <a href="alb.php">
                <div class="img-box">
                    <img src="images/alb.png" alt="O.B.A. ALB">
                </div>
                <h3>O.B.A. ALB</h3>
            </a>
            <p class="price">$129.99</p>
        </div>

        <div class="product-card">
            <a href="pomelo_oolong.php">
                <div class="img-box">
                    <img src="images/pomelo_oolong.png" alt="d'Annam Pomelo Oolong">
                </div>
                <h3>d'Annam Pomelo Oolong</h3>
            </a>
            <p class="price">$169.99</p>
        </div>

        <div class="product-card">
            <a href="sakura_snow.php">
                <div class="img-box">
                    <img src="images/sakura_snow.png" alt="d'Annam Sakura Snow">
                </div>
                <h3>d'Annam Sakura Snow</h3>
            </a>
            <p class="price">$169.99</p>
            <p class="price-note">Discovery sizes available</p>
        </div>

    </div>

</section>

    <?php include 'footer.php'; ?>

</body>
</html>