// scripts.js

// Smooth Scrolling for Navigation Links
document.querySelectorAll('nav ul li a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Gallery Image Modal
const galleryImages = document.querySelectorAll('.gallery-container img');
const modal = document.createElement('div');
const modalImg = document.createElement('img');
modal.classList.add('modal');
modal.appendChild(modalImg);
document.body.appendChild(modal);

// Show modal on image click
galleryImages.forEach(image => {
    image.addEventListener('click', () => {
        modalImg.src = image.src;
        modal.classList.add('open');
    });
});

// Close modal on click
modal.addEventListener('click', () => {
    modal.classList.remove('open');
});

// Booking Form Validation
document.querySelector('#booking form').addEventListener('submit', function (e) {
    const name = this.querySelector('#name').value.trim();
    const email = this.querySelector('#email').value.trim();
    const date = this.querySelector('#date').value;

    if (!name || !email || !date) {
        e.preventDefault();
        alert('Please fill in all required fields before booking.');
    }
});
