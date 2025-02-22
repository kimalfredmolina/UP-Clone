function readMore() {
    alert("Read more functionality coming soon!");
}


const images = [
    '/images/up_bg.webp',
    '/images/up_bg2.webp',
    '/images/up_bg3.jpg'
];

let currentIndex = 0;

function changeBackground() {
    const heroElement = document.querySelector('.hero');
    
    heroElement.style.backgroundImage = `url('${images[currentIndex]}')`;
    
    currentIndex = (currentIndex + 1) % images.length;
}

setInterval(changeBackground, 6000);
changeBackground();

