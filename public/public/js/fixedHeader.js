let fixedHeader = document.querySelector("nav")
let lastScrollY = 0;
window.addEventListener('scroll', () => {
    if (window.scrollY >= 110 && window.scrollY < lastScrollY)
    {
        fixedHeader.style.top = '0px';
    }
    else
    {
        fixedHeader.style.top = '0px';
    }

    lastScrollY = window.scrollY;
})