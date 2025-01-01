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

<!-- Header Section -->
<div class="container py-5 mt-9">
  <div class="row align-items-center">
    <div class="col-md-6 mt-5">
      <h1 class="mb-4 text-left" style="font-family: 'Playfair Display', serif; font-weight: 700; letter-spacing: 1px; color: #333;">Welcome to Fashion World</h1>

<p class="lead">
    Discover the glamorous and ever-evolving universe of fashion:
</p>
<ul class="fs-5">
    <li class="mb-3">
        <strong>Latest Trends:</strong> Stay ahead with insights into cutting-edge styles, colors, and patterns dominating the world of fashion.
    </li>
    <li class="mb-3">
        <strong>Style Tips:</strong> Elevate your wardrobe with expert advice tailored to suit your personality, occasion, and lifestyle.
    </li>
    <li class="mb-3">
        <strong>Inspiration for All:</strong> From high-end couture to street style, find ideas that resonate with your unique fashion sense.
    </li>
    <li class="mb-3">
        <strong>Creative Expression:</strong> Explore how fashion reflects culture, identity, and innovation through timeless classics and bold contemporary designs.
    </li>
    <li class="mb-3">
        <strong>Sustainability in Fashion:</strong> Learn about eco-friendly practices and make choices that are both stylish and environmentally conscious.
    </li>
    <li class="mb-3">
        <strong>Celebrity Insights:</strong> Get inspired by iconic looks from red carpets to casual outings, and replicate them with ease.
    </li>
</ul>
<p class="lead">
    Whether you're here to find sustainable fashion tips, explore <br> celebrity styles, or uncover your personal fashion identity, our curated blogs are your gateway to a world of inspiration.
</p>

    </div>
    <div class="col-md-6">
      <img src="images/blog1.jpg" class="img-fluid rounded mb-3 shadow-lg" alt="Fashion">
      <img src="images/blog2.jpeg" class="img-fluid rounded shadow-lg" alt="Style">
    </div>
  </div>
</div>

<!-- Blog Section -->
<div class="container py-5">
  <h2 class="text-center mb-5">Fashion Blogs</h2>
  <div class="row">
    <!-- Blog Card 1 -->
    <div class="col-md-4 mb-4">
      <div class="card shadow h-100">
        <img src="images/blog1.jpg" class="card-img-top" alt="Blog 1">
        <div class="card-body">
          <h5 class="card-title">Latest Fashion Trends</h5>
          <p class="card-text">Discover what's trending this season in the world of fashion and stay ahead in style.</p>
          <a href="https://www.vogue.com/fashion" class="btn btn-dark" target="_blank">Read More</a>
        </div>
      </div>
    </div>

    <!-- Blog Card 2 -->
    <div class="col-md-4 mb-4">
      <div class="card shadow h-100">
        <img src="images/blog2.jpeg" class="card-img-top" alt="Blog 2">
        <div class="card-body">
          <h5 class="card-title">Wardrobe Essentials</h5>
          <p class="card-text">From classic staples to statement pieces, learn what every wardrobe should have.</p>
          <a href="https://www.whowhatwear.com/basics-every-woman-should-own" class="btn btn-dark" target="_blank">Read More</a>
        </div>
      </div>
    </div>

    <!-- Blog Card 3 -->
    <div class="col-md-4 mb-4">
      <div class="card shadow h-100">
        <img src="https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080" class="card-img-top" alt="Blog 3">
        <div class="card-body">
          <h5 class="card-title">Street Style Inspiration</h5>
          <p class="card-text">Take cues from street style icons to elevate your daily fashion game.</p>
          <a href="https://www.elle.com/fashion/street-style/" class="btn btn-dark" target="_blank">Read More</a>
        </div>
      </div>
    </div>

    <!-- Blog Card 4 -->
    <div class="col-md-4 mb-4">
      <div class="card shadow h-100">
        <img src="images/blog3.jpg" class="card-img-top" alt="Blog 4">
        <div class="card-body">
          <h5 class="card-title">Sustainable Fashion</h5>
          <p class="card-text">Learn how to adopt eco-friendly fashion practices and shop responsibly.</p>
          <a href="https://www.sustainablefashionmatterz.com/" class="btn btn-dark" target="_blank">Read More</a>
        </div>
      </div>
    </div>

    <!-- Blog Card 5 -->
    <div class="col-md-4 mb-4">
      <div class="card shadow h-100">
        <img src="images/gentlemen.jpg" class="card-img-top" alt="Blog 5">
        <div class="card-body">
          <h5 class="card-title">Fashion for Every Occasion</h5>
          <p class="card-text">Dressing tips for weddings, work, casual outings, and everything in between.</p>
          <a href="https://www.instyle.com/fashion" class="btn btn-dark" target="_blank">Read More</a>
        </div>
      </div>
    </div>

    <!-- Blog Card 6 -->
    <div class="col-md-4 mb-4">
      <div class="card shadow h-100">
        <img src="images/blog5.jpg" class="card-img-top" alt="Blog 6">
        <div class="card-body">
          <h5 class="card-title">Accessories That Pop</h5>
          <p class="card-text">Find out how to accessorize your outfits to make a statement.</p>
          <a href="https://www.purewow.com/fashion/best-fashion-accessories" class="btn btn-dark" target="_blank">Read More</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
