<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>O.B.A. Hinode | Scent Atelier</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>

<?php include 'nav.php'; ?>

<section class="product-page">

    <div class="product-left">
        <img src="images/hinode.png" alt="O.B.A. Hinode">
    </div>

    <div class="product-right">

        <h1>O.B.A. Hinode</h1>

        <p class="price" id="price">$30.99</p>
        <p class="price-note" id="price-note">Discovery size (10ml)</p>

        <div class="size-toggle">
            <button class="size-btn active" data-size="10">10ml</button>
            <button class="size-btn" data-size="50">50ml</button>
        </div>

        <p class="description">
            HINODE by The O.B.A. captures a moss-clad oasis where hinoki wood evokes mist-shrouded mountains and rain-soaked pine.
        </p>

        <div class="notes">
            <h3>Notes</h3>
            <p>Top: Sweet Orange, Bergamot</p>
            <p>Heart: Hinoki, Juniper, Cloves</p>
            <p>Base: Cedarwood, Musk, Vetiver, Orchid</p>
        </div>

        <!-- CART FORM -->
        <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="hinode">
            <input type="hidden" name="product_name" value="O.B.A. Hinode">
            <input type="hidden" name="product_price" id="form-price" value="30.99">
            <input type="hidden" name="product_size" id="form-size" value="10ml">
            <input type="hidden" name="product_image" value="images/hinode.png">

            <button class="add-btn" type="submit">Add to Bag</button>

        </form>

    </div>

</section>

<?php include 'footer.php'; ?>

<script>
const priceEl = document.getElementById("price");
const noteEl = document.getElementById("price-note");
const sizeBtns = document.querySelectorAll(".size-btn");

const prices = {
    10: 30.99,
    50: 129.00
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

        document.getElementById("form-price").value = prices[selectedSize];
        document.getElementById("form-size").value = selectedSize + "ml";
    });
});
</script>

</body>
</html>