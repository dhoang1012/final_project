<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Scent Atelier</title>

	<link rel="stylesheet" href="style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<?php include 'nav.php'; ?>

	<section class="hero">
	<a href="perfumes.php">
		<img src="images/banner.png" alt="Perfume Collection">
		<div class="hero-text">Discover Your Next Signature Scent</div>
	</a>
	</section>

	<section class="mini-about">
    <div class="intro-content">
        <h2>Welcome to Scent Atelier</h2>
        <p>A sanctuary for individuals who refuse to be ordinary. We’ve searched the world for rare, artisanal fragrances to bring you scents that linger, long after you’ve left the room.</p>
        <a href="about.php" class="read-more">Our Full Story</a>
    </div>
	</section>

	<section class="product-section new-arrivals">
    	<h2 class="section-title">New Arrivals</h2>
    		<div class="product-grid">
    			<div class="product-card">
    				<a href=hinode.php>
	    				<div class="img-box">
	    					<img src="images/hinode.png" alt="O.B.A. Hinode">
	    				</div>
	    				<h3>O.B.A. Hinode</h3>
    				</a>
    				<p class="price">$129.99</p>
    				<p class="price-note">Discovery sizes available</p>
    			</div>

			    <div class="product-card">
			    	<a href=alb.php>
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

    <section class="feature-section">

    <div class="feature-image">
        <img src="images/to_summer_store.png" alt="To Summer Collection">
    </div>

    <div class="feature-text">
        <h2>Featured Collection: To Summer</h2>
        <p>
            To Summer (观夏) is a Beijing-based fragrance house dedicated to bridging 
            ancient Chinese heritage with contemporary life. By rooting its identity 
            in historic architecture and traditional botanicals, the brand preserves 
            the “true soul” of a place through scent.
        </p>
    </div>
	</section>

	<section class="product-section">    
		<h2 class="section-title">Explore the Scent</h2>
    	<div class="product-grid">
        	<div class="product-card">
        		<a href="triple_tea.php">
            		<div class="img-box">
                		<img src="images/triple_tea.png" alt="To Summer Triple Tea">
            		</div>
	           		<h3>Triple Tea</h3>
	           	</a>	
	            <p class="price">$139.99</p>
	            <p class="price-note">Discovery sizes available</p>
	        </div>
        
	        <div class="product-card">
	        	<a href="osmanthus.php">
		            <div class="img-box">
		                <img src="images/osmanthus.png" alt="To Summer Osmanthus">
		            </div>
		            <h3>Osmanthus</h3>
		        </a>
	            <p class="price">$139.99</p>
	        </div>

	        <div class="product-card">
	        	<a href="magnolia.php">
		            <div class="img-box">
		                <img src="images/magnolia.png" alt="To Summer Magnolia">
		            </div>
		            <h3>Magnolia</h3>
	            </a>
	            <p class="price">$139.99</p>
	        </div>
    	</div>
	</section>

	<section class="feature-split">

    <div class="feature-split-text">
        <h2>Featured Collection: Kilian Paris</h2>
        <p>
            Born from one of France’s most illustrious dynasties in fine liquors, Kilian Paris infuses the heritage of distillation into the world of high perfumery. The house pays homage to French savoir-faire by encapsulating the olfactive memories of oak barrels, sugar, and aged spirits into wearable art.
        </p>
    </div>

    <div class="feature-split-image">
        <img src="images/kiliam.png" alt="Kilian Paris">
    </div>

</section>

	<section class="product-section">
		<h2 class="section-title">Explore the Scent</h2>
	    <div class="product-grid">
	        <div class="product-card">
	        	<a href="angel_share.php"> 
	                <div class="img-box">
	                    <img src="images/angel_share.png" alt="Kilian Angel's Share">
	                </div>
	                <h3>Angel's Share</h3>
	            </a>
	            <p class="price">$325.00</p>
	            <p class="price-note">Discovery sizes available</p>
	        </div>

	        <div class="product-card">
	        	<a href="intoxicated.php"> 
	                <div class="img-box">
	                    <img src="images/intoxicated.png" alt="Kilian Intoxicated">
	                </div>
	                <h3>Intoxicated</h3>
	            </a>
	            <p class="price">$275.00</p>
	        </div>

	        <div class="product-card">
	        	<a href="flower_immortality.php"> 
	                <div class="img-box">
	                    <img src="images/flower_immortality.png" alt="Kilian Flower of Immortality">
	                </div>
	                <h3>Flower of Immortality</h3>
	            </a>
	            <p class="price">$275.00</p>
	        </div>
		</div>
	</section>

	<?php include 'footer.php'; ?>

</body>
</html>