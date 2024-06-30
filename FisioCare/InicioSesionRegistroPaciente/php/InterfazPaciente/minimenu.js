window.addEventListener('DOMContentLoaded', (event) => {
    var dropdown = document.querySelector('.menu_Cuenta');
    var perfil = document.querySelector('#perfil');

    perfil.addEventListener('click', function(event) {
        event.stopPropagation();
        dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
    });

    window.addEventListener('click', function(event) {
        dropdown.style.display = 'none';
    });
});
