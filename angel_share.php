<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kilian Angel's Share | Scent Atelier</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>

<?php include 'nav.php'; ?>

<!-- PRODUCT SECTION -->
<section class="product-page">

    <!-- LEFT IMAGE -->
    <div class="product-left">
        <img src="images/angel_share.png" alt="Kilian Angel's Share">
    </div>

    <!-- RIGHT INFO -->
    <div class="product-right">

        <h1>Angel's Share</h1>

        <p class="price" id="price">$50.00</p>
        <p class="price-note" id="price-note">Sample size (7.5ml)</p>

        <!-- SIZE TOGGLE -->
        <div class="size-toggle">
            <button type="button" class="size-btn active" data-size="7.5">7.5ml</button>
            <button type="button" class="size-btn" data-size="100">100ml</button>
        </div>

        <!-- DESCRIPTION -->
        <p class="description">
            Angels' Share by By Kilian is a warm, boozy fragrance inspired by cognac aging in oak barrels.
        </p>

        <!-- NOTES -->
        <div class="notes">
            <h3>Notes</h3>
            <p>Top: Cognac</p>
            <p>Heart: Cinnamon, Tonka Bean, Oak, Hedione</p>
            <p>Base: Vanilla, Praline, Sandalwood, Candied Almond</p>
        </div>

        <!-- ADD TO BAG -->
        <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="angel-share">
            <input type="hidden" name="product_name" value="Kilian Angel's Share">
            <input type="hidden" name="product_price" id="form-price" value="50">
            <input type="hidden" name="product_size" id="form-size" value="7.5ml">
            <input type="hidden" name="product_image" value="images/angel_share.png">

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
    "7.5": 50.00,
    "100": 325.00
};

let selectedSize = "7.5";

sizeBtns.forEach(btn => {
    btn.addEventListener("click", () => {

        sizeBtns.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        selectedSize = btn.dataset.size;

        priceEl.textContent = `$${prices[selectedSize].toFixed(2)}`;

        if (selectedSize === "7.5") {
            noteEl.textContent = "Sample size (7.5ml)";
        } else {
            noteEl.textContent = "Full size (100ml)";
        }

        // sync hidden inputs
        document.getElementById("form-price").value = prices[selectedSize];
        document.getElementById("form-size").value = selectedSize + "ml";
    });
});
</script>

</body>
</html>