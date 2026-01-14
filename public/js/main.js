// Initialize Lucide Icons
lucide.createIcons();

// Navbar Scroll Effect
const navbar = document.getElementById("navbar");
window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
        navbar.classList.add("scrolled", "navbar-dark");
    } else {
        navbar.classList.remove("scrolled");
    }
});

// Filter Function using Bootstrap classes
function filterProducts(category, btnElement) {
    const items = document.querySelectorAll(".product-item");
    const buttons = document.querySelectorAll(".btn-filter");

    // Handle Active Class
    buttons.forEach((btn) => btn.classList.remove("active"));
    btnElement.classList.add("active");

    // Handle Filter Logic — only toggle the column element itself using Bootstrap utility class
    items.forEach((item) => {
        if (category === "all") {
            item.classList.remove("d-none");
        } else {
            if (item.classList.contains(category)) {
                item.classList.remove("d-none");
            } else {
                item.classList.add("d-none");
            }
        }
    });
}
