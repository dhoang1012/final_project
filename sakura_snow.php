<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>d'Annam Sakura Snow | Scent Atelier</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>

<?php include 'nav.php'; ?>

<!-- PRODUCT SECTION -->
<section class="product-page">

    <!-- LEFT IMAGE -->
    <div class="product-left">
        <img src="images/sakura_snow.png" alt="d'Annam Sakura Snow">
    </div>

    <!-- RIGHT INFO -->
    <div class="product-right">

        <h1>d'Annam Sakura Snow</h1>

        <p class="price" id="price">$39.99</p>
        <p class="price-note" id="price-note">Discovery size (10ml)</p>

        <!-- SIZE TOGGLE -->
        <div class="size-toggle">
            <button class="size-btn active" data-size="10">10ml</button>
            <button class="size-btn" data-size="50">50ml</button>
        </div>

        <!-- DESCRIPTION -->
        <p class="description">
            Sakura Snow by d’Annam was inspired by the silence of falling snow, a serene moment where winter meets spring. It is a poetic tribute to stillness and the elegant beauty of nature’s transition.
        </p>

        <!-- NOTES -->
        <div class="notes">
            <h3>Details</h3>
            <p>Note: Cherry Blossom, Snow, Solar Notes, Juniper Berry, Muguet, White Musk</p>
            <p>Main Accords: Floral / Fresh</p>
        </div>

        <!-- ADD TO BAG FORM -->
        <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="sakura-snow">
            <input type="hidden" name="product_name" value="d'Annam Sakura Snow">
            <input type="hidden" name="product_price" id="form-price" value="39.99">
            <input type="hidden" name="product_size" id="form-size" value="10ml">
            <input type="hidden" name="product_image" value="images/sakura_snow.png">

            <button class="add-btn" type="submit">Add to Bag</button>

        </form>

    </div>

</section>

<?php include 'footer.php'; ?>

<!-- JS -->
<script>
const priceEl = document.getElementById("price");
const noteEl = document.getElementById("price-note");
const sizeBtns = document.querySelectorAll(".size-btn");

const prices = {
    10: 39.99,
    50: 169.00
};

let selectedSize = "10";

sizeBtns.forEach(btn => {
    btn.addEventListener("click", () => {

        sizeBtns.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        selectedSize = btn.dataset.size;

        priceEl.textContent = `$${prices[selectedSize].toFixed(2)}`;

        if (selectedSize === "10") {
            noteEl.textContent = "Discovery size (10ml)";
        } else {
            noteEl.textContent = "Full size (50ml)";
        }

        // sync form values
        document.getElementById("form-price").value = prices[selectedSize];
        document.getElementById("form-size").value = selectedSize + "ml";
    });
});
</script>

</body>
</html>