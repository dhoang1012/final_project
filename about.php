<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us | Scent Atelier</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>

<section class="about-hero">

    <video class="about-video" autoplay muted loop playsinline>
        <source src="videos/mountains.mp4" type="video/mp4">
    </video>

    <div class="about-hero-text">
        <h1>About Scent Atelier</h1>
        <p>Where Every Soul Finds its Scent.</p>
    </div>

</section>

<section class="about-content">

    <div class="about-block">
        <h2>Our Philosophy</h2>
        <p>
            We believe that fragrance is a living medium, not a commodity. At Scent Atelier, a scent is not merely worn; it is an extension of self. Our philosophy is rooted in the artistic, uncompromising will to find something extraordinary. We view perfume as the most intimate form of architecture: an invisible structure that defines space, memory, and identity.
        </p>
    </div>

    <div class="about-block">
        <h2>Curated Artistry</h2>
        <p>
            We've hand-selected each fragrance, focusing on niche houses that treat perfumery as an art form. From botanical storytelling to distilled heritage, every scent carries a soul, raw emotions that grounds you.
        </p>
    </div>

    <div class="about-block">
        <h2>Our Mission</h2>
        <p>
            We exist to serve the collectors and the curious soul. Our mission is to bridge the gap in the global market to bring you true artistry and personal identity. An uncompromising space where fragrance becomes a ritual of discovery.

        </p>
    </div>

</section>

    <?php include 'footer.php'; ?>

</body>
</html>