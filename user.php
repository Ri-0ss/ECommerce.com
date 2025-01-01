<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/user.css">
   
</head>
<body>
    <!-- navbar -->
    <nav>
        <div class="logo">
            <h1>YSTORE</h1>
        </div>
        <div class="icon" id="toggle-menu">
            <i class="fa-solid fa-bars"></i>
        </div>
        <ul id="nav-links">
            <li><a href="user.php" class="active">Home</a></li>
            <li><a href="about.php" id="shops">About</a></li>
            <li><a href="shop.php" id="reviews">Shop</a></li>
            <li><a href="blogs.php" id="blogs">Blog</a></li>
            <li><a href="contact.php" id="contacts">Contact</a></li>
            <li><a href="logout.php" id="logout" class="logout-button text-info">Logout</a></li> <!-- Logout button -->

        </ul>
    </nav>

    <!-- carousel -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/slider1.jpg" class="d-block w-100 h-50" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/slide2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/slider3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


           

      <div class="container-fluid text-center mt-5">
        <h2 class="mb-5 fw-bold">Trending Products</h2>
        <div class="row justify-content-center g-4">
          <!-- Card 1 -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-lg mx-auto" style="max-width: 300px;">
              <img src="images/p2.jpg" class="card-img-top img-fluid rounded-top" alt="T-Shirt">
              <div class="card-body">
                <h5 class="card-title">Classic White T-Shirt</h5>
                <p class="card-text text-muted">Premium cotton t-shirt for everyday comfort.</p>
                <div class="text-warning mb-3">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                </div>
                <span class="text-success fw-bold fs-5">$19.99</span>
                <a href="shop.php"><button class="btn btn-dark w-100 mt-3">Buy Now</button></a>
              </div>
            </div>
          </div>
    
          <!-- Card 2 -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-lg mx-auto" style="max-width: 300px;">
              <img src="images/p2.jpg" class="card-img-top img-fluid rounded-top" alt="Sneakers">
              <div class="card-body">
                <h5 class="card-title">Sporty Sneakers</h5>
                <p class="card-text text-muted">High-performance sneakers for active lifestyles.</p>
                <div class="text-warning mb-3">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                  <i class="bi bi-star"></i>
                </div>
                <span class="text-success fw-bold fs-5">$49.99</span>
                <button class="btn btn-dark w-100 mt-3">Buy Now</button>
              </div>
            </div>
          </div>
    
          <!-- Card 3 -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-lg mx-auto" style="max-width: 300px;">
              <img src="images/p2.jpg" class="card-img-top img-fluid rounded-top" alt="Smartwatch">
              <div class="card-body">
                <h5 class="card-title">Smartwatch</h5>
                <p class="card-text text-muted">Track your fitness goals with this sleek smartwatch.</p>
                <div class="text-warning mb-3">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
                <span class="text-success fw-bold fs-5">$89.99</span>
                <button class="btn btn-dark w-100 mt-3">Buy Now</button>
              </div>
            </div>
          </div>
    
          <!-- Card 4 -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-lg mx-auto" style="max-width: 300px;">
              <img src="images/p2.jpg" class="card-img-top img-fluid rounded-top" alt="Backpack">
              <div class="card-body">
                <h5 class="card-title">Stylish Backpack</h5>
                <p class="card-text text-muted">Perfect for work, travel, or school.</p>
                <div class="text-warning mb-3">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                </div>
                <span class="text-success fw-bold fs-5">$39.99</span>
                <button class="btn btn-dark w-100 mt-3">Buy Now</button>
              </div>
            </div>
          </div>
    
          <!-- Card 5 -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-lg mx-auto" style="max-width: 300px;">
              <img src="images/p2.jpg" class="card-img-top img-fluid rounded-top" alt="Wireless Earbuds">
              <div class="card-body">
                <h5 class="card-title">Wireless Earbuds</h5>
                <p class="card-text text-muted">Experience true wireless freedom.</p>
                <div class="text-warning mb-3">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                  <i class="bi bi-star"></i>
                </div>
                <span class="text-success fw-bold fs-5">$29.99</span>
                <button class="btn btn-dark w-100 mt-3">Buy Now</button>
              </div>
            </div>
          </div>
    
          <!-- Card 6 -->
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card shadow-lg mx-auto" style="max-width: 300px;">
              <img src="images/p2.jpg" class="card-img-top img-fluid rounded-top" alt="Sunglasses">
              <div class="card-body">
                <h5 class="card-title">Trendy Sunglasses</h5>
                <p class="card-text text-muted">Stay stylish and protected from the sun.</p>
                <div class="text-warning mb-3">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                </div>
                <span class="text-success fw-bold fs-5">$14.99</span>
                <button class="btn btn-dark w-100 mt-3">Buy Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    
    <div class="container mx-auto py-9 mt-5">
    <h2 class="text-3xl font-semibold text-center mb-6 text-gray-800">What Our Customers Say</h2>
    <div class="review-slider-container1">
        <button class="review-slider-button left" onclick="moveReviewSlider(-1)">&#10094;</button>
        <div class="review-slider" id="review-slider">
            <!-- Review Card 1 -->
            <div class="review-card bg-white rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <img src="images/c1.jpg" alt="Customer 1" class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">John Doe</h3>
                    </div>
                </div>
                <p class="text-gray-700">This product exceeded my expectations! The quality is fantastic.</p>
            </div>
            <!-- Review Card 2 -->
            <div class="review-card bg-white rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <img src="images/c1.jpg" alt="Customer 2" class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Jane Smith</h3>
                    </div>
                </div>
                <p class="text-gray-700">Absolutely love this! Will definitely recommend to my friends.</p>
            </div>
            <!-- Review Card 3 -->
            <div class="review-card bg-white rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <img src="images/c2.jpg" alt="Customer 3" class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Alice Johnson</h3>
                    </div>
                </div>
                <p class="text-gray-700">Great product, but I wish the shipping was faster.</p>
            </div>
            <!-- Review Card 4 -->
            <div class="review-card bg-white rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <img src="images/c3.jpg" alt="Customer 4" class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Bob Brown</h3>
                    </div>
                </div>
                <p class="text-gray-700">Best purchase I made this year! Highly recommend.</p>
            </div>
            <!-- Review Card 5 -->
            <div class="review-card bg-white rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <img src="images/c2.jpg" alt="Customer 5" class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Chris Lee</h3>
                    </div>
                </div>
                <p class="text-gray-700">I had a great experience, but the customer service could be improved.</p>
            </div>
            <!-- Additional cards can go here -->
        </div>
        <button class="review-slider-button right" onclick="moveReviewSlider(1)">&#10095;</button>
    </div>
</div>  




<div class="container py-5" id="blog">
  <div class="text-center mb-5">
    <h2 class="fw-bold">Read <span class="text-dark">Blogs</span></h2>
  </div>
  <div class="row g-4">
    <!-- Blog Card 1 -->
    <div class="col-md-6">
      <div class="card h-100 shadow-lg">
        <img src="images/fashion.jpg" class="card-img-top" alt="Blog 1">
        <div class="card-body">
          <h5 class="card-title font-semibold">Top Fashion Tips</h5>
          <p class="card-text">Discover the latest fashion trends and styling tips to elevate your wardrobe. Explore creative ideas and inspiration for every season.</p>
          <a href="https://influencermarketinghub.com/best-fashion-blogs/" class="btn btn-dark">Read More</a>
        </div>
      </div>
    </div>
    <!-- Blog Card 2 -->
    <div class="col-md-6">
      <div class="card h-100 shadow-lg">
        <img src="images/gentlemen.jpg" class="card-img-top" alt="Blog 2">
        <div class="card-body">
          <h5 class="card-title font-semibold">Gentleman's Guide</h5>
          <p class="card-text">Dive into a comprehensive guide for modern gentlemen. From grooming to lifestyle tips, this blog has everything you need.</p>
          <a href="https://www.apetogentleman.com/" class="btn btn-dark">Read More</a>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- footer -->
<div class="bg-black py-5 mt-5">
  <div class="container">
    <div class="row text-center text-md-start">
      <!-- Column 1 -->
      <div class="col-md-3 mb-4">
        <h3 class="fw-bold text-light">Shoppy</h3>
        <p class="text-light py-2">Lorem ipsum dolor sit amet consectetur adipisicing.<br> Dolore eum vero dolorem tempore magni!<br> Inventore deleniti voluptas porro eligendi.</p>
      </div>
      <!-- Column 2 -->
      <div class="col-md-3 mb-4">
        <h3 class="fw-bold text-light">Explore</h3>
        <p><a href="#" class="text-decoration-none text-light">All</a></p>
        <p><a href="#" class="text-decoration-none text-light">Rated</a></p>
        <p><a href="#" class="text-decoration-none text-light">Scores</a></p>
        <p><a href="#" class="text-decoration-none text-light">Tipes</a></p>
        <p><a href="#" class="text-decoration-none text-light">Guide</a></p>
      </div>
      <!-- Column 3 -->
      <div class="col-md-3 mb-4">
        <h3 class="fw-bold text-light">Connect</h3>
        <p><a href="#" class="text-decoration-none text-light">YouTube</a></p>
        <p><a href="#" class="text-decoration-none text-light">Instagram</a></p>
        <p><a href="#" class="text-decoration-none text-light">Twitter</a></p>
        <p><a href="#" class="text-decoration-none text-light">Facebook</a></p>
        <p><a href="#" class="text-decoration-none text-light">Pinterest</a></p>
      </div>
      <!-- Column 4 -->
      <div class="col-md-3 mb-4">
        <h3 class="fw-bold text-light">Nity Grity</h3>
        <p><a href="#" class="text-decoration-none text-light">Terms & Conditions</a></p>
        <p><a href="#" class="text-decoration-none text-light">Privacy Policy</a></p>
        <p><a href="#" class="text-decoration-none text-light">FAQs</a></p>
        <p><a href="#" class="text-decoration-none text-light">Special Credits</a></p>
      </div>
    </div>
  </div>
</div>

<!-- Buy Page -->
<div class="container my-5 d-none" id="buyPage">
  <div class="d-flex justify-content-end">
    <i class="fas fa-times fs-3" style="cursor: pointer;"></i>
  </div>
  <div class="text-center">
    <h3 class="fw-bold">Order Summary</h3>
    <p>Details will be displayed here...</p>
  </div>
</div>

<script src="Js/user.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
