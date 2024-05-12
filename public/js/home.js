/* author : Niman Wijerathna
Created : 2024/05/11
Description : this is the home layout js */

document.addEventListener('DOMContentLoaded', function () {
    var menuIcon = document.querySelector('.hp-s1-menu-icon');
    var closeIcon = document.querySelector('.hp-s1-close-icon');
    var sidebar = document.getElementById('sidebar');

    menuIcon.addEventListener('click', function () {
        sidebar.classList.add('active');
    });

    closeIcon.addEventListener('click', function () {
        sidebar.classList.remove('active');
    });
});
