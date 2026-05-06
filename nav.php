<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$current_page = basename($_SERVER['PHP_SELF']);

require_once "db.php";

$cartCount = 0;

if (isset($_SESSION["user_id"])) {

    $user_id = $_SESSION["user_id"];

    $stmt = $conn->prepare("
        SELECT SUM(quantity) AS total
        FROM cart_items
        WHERE user_id = ?
    ");

    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $cartCount = $row["total"] ?? 0;
}
?>

<nav class="navbar">

    <!-- LOGO -->
    <div class="logo">
        <a href="index.php" style="text-decoration: none; color: inherit;">
            Scent Atelier
        </a>
    </div>

    <!-- CENTER LINKS -->
    <ul class="nav-links">
        <?php if ($current_page != 'about.php'): ?>
            <li><a href="about.php">About Us</a></li>
        <?php endif; ?>

        <?php if ($current_page != 'new_arrivals.php'): ?>
            <li><a href="new_arrivals.php">New Arrivals</a></li>
        <?php endif; ?>

        <?php if ($current_page != 'perfumes.php'): ?>
            <li><a href="perfumes.php">Perfumes</a></li>
        <?php endif; ?>

        <?php if ($current_page != 'bath_body.php'): ?>
            <li><a href="bath_body.php">Bath & Body</a></li>
        <?php endif; ?>
    </ul>

    <!-- ICONS -->
    <div class="nav-icons">

        <!-- SEARCH -->
        <div class="nav-search">
            <input 
                type="text" 
                class="search-input"
                placeholder="Search perfumes..."
            >
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>

        <!-- USER -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php" class="nav-auth">Logout</a>
        <?php else: ?>
            <a href="login.php" class="nav-icon">
                <i class="fa-regular fa-user"></i>
            </a>
        <?php endif; ?>

        <!-- BAG -->
        <a href="bag.php" class="nav-icon cart-wrapper" style="position:relative;">
            <i class="fa-solid fa-bag-shopping"></i>

            <?php if ($cartCount > 0): ?>
                <span class="cart-count">
                    <?php echo $cartCount; ?>
                </span>
            <?php endif; ?>
        </a>

    </div>

</nav>

<script>
const searchInput = document.querySelector('.search-input');

const searchMap = [
    { keys: ["angel", "angels share", "angel's share"], url: "angel_share.php" },
    { keys: ["intoxicated"], url: "intoxicated.php" },
    { keys: ["flower", "immortality", "flower of immortality"], url: "flower_immortality.php" },

    { keys: ["triple", "triple tea"], url: "triple_tea.php" },
    { keys: ["osmanthus"], url: "osmanthus.php" },
    { keys: ["magnolia"], url: "magnolia.php" },

    { keys: ["hinode"], url: "hinode.php" },
    { keys: ["alb"], url: "alb.php" },

    { keys: ["pomelo", "oolong", "dannam"], url: "pomelo_oolong.php" },
    { keys: ["sakura", "snow"], url: "sakura_snow.php" },

    // BRAND SEARCH
    { keys: ["kilian"], url: "perfumes.php#kilian" },
    { keys: ["dannam"], url: "perfumes.php#dannam" },
    { keys: ["oba"], url: "perfumes.php#oba" },
    { keys: ["tosummer"], url: "perfumes.php#tosummer" }
];

if (searchInput) {

    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();

            const query = searchInput.value.toLowerCase().trim();

            for (let item of searchMap) {
                for (let key of item.keys) {
                    if (query.includes(key)) {
                        window.location.href = item.url;
                        return;
                    }
                }
            }

            alert("No matching product found.");
        }
    });

}
</script>