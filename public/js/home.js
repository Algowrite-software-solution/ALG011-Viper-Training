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

//display User Mangement
document.addEventListener('DOMContentLoaded', () => {
    const userManagementBtn = document.getElementById('user-management-btn');
    const userManagementSection = document.getElementById('user-management-section');

    if (userManagementSection.style.display === 'none') {
        userManagementSection.style.display = 'none';
    }

    userManagementBtn.addEventListener('click', () => {
        userManagementSection.style.display = 'block';
    });
});

//display My Profile
document.addEventListener('DOMContentLoaded', () => {
    const userProfileBtn = document.getElementById('my-profile-btn');
    const userProfileSection = document.getElementById('my-profile-section');

    if (userProfileSection.style.display === 'd-none') {
        userProfileSection.style.display = 'none';
    }

    userProfileBtn.addEventListener('click', () => {
        userProfileSection.style.display = 'block';
    });
});

