document.addEventListener('DOMContentLoaded', function () {
    const logo = document.getElementById('logo');
    const menuContainer = document.querySelector('.menu-container');

    menuContainer.style.display = 'none'; // Hide the menu initially

    logo.addEventListener('click', () => {
        menuContainer.style.display = menuContainer.style.display === 'none' ? 'block' : 'none';
    });
});


