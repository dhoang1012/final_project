<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Summer Triple Tea | Scent Atelier</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>

<?php include 'nav.php'; ?>

<!-- PRODUCT SECTION -->
<section class="product-page">

    <!-- LEFT IMAGE -->
    <div class="product-left">
        <img src="images/triple_tea.png" alt="To Summer Triple Tea">
    </div>

    <!-- RIGHT INFO -->
    <div class="product-right">

        <h1>To Summer Triple Tea</h1>

        <p class="price" id="price">$24.99</p>
        <p class="price-note" id="price-note">Discovery size (5ml)</p>

        <!-- SIZE TOGGLE -->
        <div class="size-toggle">
            <button class="size-btn active" data-size="5">5ml</button>
            <button class="size-btn" data-size="30">30ml</button>
        </div>

        <!-- DESCRIPTION -->
        <p class="description">
            Triple Tea (三重茶) by To Summer | 观夏 encapsulates the process of preparing Chinese tea through a triple harmony of bitter, sweet, and mellow notes.
        </p>

        <!-- NOTES -->
        <div class="notes">
            <h3>Notes</h3>
            <p>Top: Green Tea, Lemongrass, Mate, Mint</p>
            <p>Heart: Tea, Black Tea, Jasmine, Violet</p>
            <p>Base: Brown Sugar, Papyrus, Oolong Tea, Cedar</p>
        </div>

        <!-- ADD TO BAG FORM -->
        <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="triple-tea">
            <input type="hidden" name="product_name" value="To Summer Triple Tea">
            <input type="hidden" name="product_price" id="form-price" value="24.99">
            <input type="hidden" name="product_size" id="form-size" value="5ml">
            <input type="hidden" name="product_image" value="images/triple_tea.png">

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
    5: 24.99,
    30: 139.99
};

let selectedSize = "5";

sizeBtns.forEach(btn => {
    btn.addEventListener("click", () => {

        sizeBtns.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        selectedSize = btn.dataset.size;

        priceEl.textContent = `$${prices[selectedSize].toFixed(2)}`;

        if (selectedSize === "5") {
            noteEl.textContent = "Discovery size (5ml)";
        } else {
            noteEl.textContent = "Full size (30ml)";
        }

        // sync hidden form values
        document.getElementById("form-price").value = prices[selectedSize];
        document.getElementById("form-size").value = selectedSize + "ml";
    });
});
</script>

</body>
</html>