<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfumes | Scent Atelier</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>

<section class="page-hero">
    <h1>Perfumes</h1>
    <p>Explore our curated fragrance collection.</p>
</section>

<!-- FILTER BAR -->
<section class="filter-bar">

    <input type="text" placeholder="Search perfumes..." class="search-input">

    <select class="brand-filter">
        <option value="all">All Brands</option>
        <option value="oba">O.B.A.</option>
        <option value="dannam">d'Annam</option>
        <option value="kilian">Kilian</option>
        <option value="tosummer">To Summer</option>
    </select>

    <select class="sort-filter">
        <option value="default">Sort by</option>
        <option value="low-high">Price: Low to High</option>
        <option value="high-low">Price: High to Low</option>
    </select>

</section>

<!-- PRODUCT SECTION -->
<section class="product-section">

    <div class="product-grid">

        <!-- KILIAN -->
        <div class="product-card" data-id="angel-share" data-brand="kilian" data-price="325">
            <a href="angel_share.php">
                <div class="img-box">
                    <img src="images/angel_share.png" alt="Kilian Angel's Share">
                </div>
                <h3>Kilian Angel's Share</h3>
            </a>
            <p class="price">$325.00</p>
            <p class="price-note">Discovery sizes available</p>
        </div>

        <div class="product-card" data-id="intoxicated" data-brand="kilian" data-price="275">
            <a href="intoxicated.php">
                <div class="img-box">
                    <img src="images/intoxicated.png" alt="Kilian Intoxicated">
                </div>
                <h3>Kilian Intoxicated</h3>
            </a>
            <p class="price">$275.00</p>
        </div>

        <div class="product-card" data-id="flower-immortality" data-brand="kilian" data-price="275">
            <a href="flower_immortality.php">
                <div class="img-box">
                    <img src="images/flower_immortality.png" alt="Kilian Flower of Immortality">
                </div>
                <h3>Kilian Flower of Immortality</h3>
            </a>
            <p class="price">$275.00</p>
        </div>

        <!-- To Summer -->
        <div class="product-card" data-id="triple-tea" data-brand="tosummer" data-price="139">
            <a href="triple_tea.php">
                <div class="img-box">
                    <img src="images/triple_tea.png" alt="To Summer Triple Tea">
                </div>
                <h3>To Summer Triple Tea</h3>
            </a>
            <p class="price">$139.99</p>
            <p class="price-note">Discovery sizes available</p>
        </div>

        <div class="product-card" data-id="osmanthus" data-brand="tosummer" data-price="139">
            <a href="osmanthus.php">
                <div class="img-box">
                    <img src="images/osmanthus.png" alt="To Summer Osmanthus">
                </div>
                <h3>To Summer Osmanthus</h3>
            </a>
            <p class="price">$139.99</p>
        </div>

        <div class="product-card" data-id="magnolia" data-brand="tosummer" data-price="139">
            <a href="magnolia.php">
                <div class="img-box">
                    <img src="images/magnolia.png" alt="To Summer Magnolia">
                </div>
                <h3>To Summer Magnolia</h3>
            </a>
            <p class="price">$139.99</p>
        </div>

        <!-- O.B.A. -->
        <div class="product-card" data-id="hinode" data-brand="oba" data-price="129">
            <a href="hinode.php">
                <div class="img-box">
                    <img src="images/hinode.png" alt="O.B.A. Hinode">
                </div>
                <h3>O.B.A. Hinode</h3>
            </a>
            <p class="price">$129.99</p>
            <p class="price-note">Discovery sizes available</p>
        </div>

        <div class="product-card" data-id="alb" data-brand="oba" data-price="129">
            <a href="alb.php">
                <div class="img-box">
                    <img src="images/alb.png" alt="O.B.A. ALB">
                </div>
                <h3>O.B.A. ALB</h3>
            </a>
            <p class="price">$129.99</p>
        </div>

        <!-- d'ANNAM -->
        <div class="product-card" data-id="pomelo-oolong" data-brand="dannam" data-price="169">
            <a href="pomelo_oolong.php">
                <div class="img-box">
                    <img src="images/pomelo_oolong.png" alt="d'Annam Pomelo Oolong">
                </div>
                <h3>d'Annam Pomelo Oolong</h3>
            </a>
            <p class="price">$169.99</p>
        </div>

        <div class="product-card" data-id="sakura-snow" data-brand="dannam" data-price="169">
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

<script>
const searchInput = document.querySelector('.search-input');
const brandFilter = document.querySelector('.brand-filter');
const sortFilter = document.querySelector('.sort-filter');
const productGrid = document.querySelector('.product-grid');

let products = Array.from(document.querySelectorAll('.product-card'));
const originalOrder = [...products]; // save original order

// FILTER FUNCTION
function filterProducts() {
    const searchValue = searchInput.value.toLowerCase();
    const selectedBrand = brandFilter.value;

    products.forEach(product => {
        const name = product.querySelector('h3').textContent.toLowerCase();
        const brand = product.dataset.brand;

        const matchesSearch = name.includes(searchValue);
        const matchesBrand = selectedBrand === 'all' || brand === selectedBrand;

        if (matchesSearch && matchesBrand) {
            product.style.display = ''; // restore default grid display
        } else {
            product.style.display = 'none';
        }
    });
}

// SORT FUNCTION
function sortProducts() {
    const sortValue = sortFilter.value;

    let sorted = [...products];

    if (sortValue === 'low-high') {
        sorted.sort((a, b) => Number(a.dataset.price) - Number(b.dataset.price));
    } else if (sortValue === 'high-low') {
        sorted.sort((a, b) => Number(b.dataset.price) - Number(a.dataset.price));
    } else if (sortValue === 'default') {
        sorted = [...originalOrder];
    }

    // re-append in correct order
    sorted.forEach(product => productGrid.appendChild(product));
}

// EVENT LISTENERS
searchInput.addEventListener('input', filterProducts);
brandFilter.addEventListener('change', filterProducts);

sortFilter.addEventListener('change', () => {
    sortProducts();
    filterProducts(); // keep filtering after sorting
});
</script>

    <?php include 'footer.php'; ?>

</body>
</html>