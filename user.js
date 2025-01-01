//navbar toggler
const toggleMenu = document.getElementById('toggle-menu');
const navLinks = document.getElementById('nav-links');

toggleMenu.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

//review carousel
let currentIndex = 0; // Track the current index
    const reviewSlider = document.getElementById("review-slider");
    const reviewCards = document.querySelectorAll(".review-card");
    const totalReviewCards = reviewCards.length;
    const reviewsToShow = 3; // Adjust this number to show multiple reviews

    function moveReviewSlider(direction) {
        // Calculate the new index based on the direction
        currentIndex += direction;

        // Loop back to the start or end if needed
        if (currentIndex < 0) {
            currentIndex = Math.max(0, totalReviewCards - reviewsToShow);
        } else if (currentIndex >= totalReviewCards) {
            currentIndex = 0;
        }

        // Update the review slider position
        const offset = -currentIndex * (reviewCards[0].clientWidth + 20); // Adjust for margin
        reviewSlider.style.transform = `translateX(${offset}px)`;
    }