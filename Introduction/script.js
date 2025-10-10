const typingElement = document.querySelector('.typing-effect');
const professions = ["Web Developer", "Web Engineer", "Web Designer", "Professional Counter-Strike and Valorant Player"];
let professionIndex = 0;
let charIndex = 0;

function type() {
    if (charIndex < professions[professionIndex].length) {
        typingElement.textContent += professions[professionIndex].charAt(charIndex);
        charIndex++;
        setTimeout(type, 100);
    } else {
        setTimeout(erase, 2000);
    }
}

function erase() {
    if (charIndex > 0) {
        typingElement.textContent = professions[professionIndex].substring(0, charIndex - 1);
        charIndex--;
        setTimeout(erase, 50);
    } else {
        professionIndex = (professionIndex + 1) % professions.length;
        setTimeout(type, 500);
    }
}

document.addEventListener("DOMContentLoaded", function() {
    setTimeout(type, 1000);
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});