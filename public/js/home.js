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

// User Mangement and My Profile View with the Title
document.addEventListener('DOMContentLoaded', () => {
    const userManagementBtn = document.getElementById('user-management-btn');
    const userManagementSection = document.getElementById('user-management-section');
  
    const myProfileBtn = document.getElementById('my-profile-btn');
    const myProfileSection = document.getElementById('my-profile-section');
  
    const titleElement = document.querySelector('.hp-s1-title'); 
  
    const clearDisplayedSection = () => {
      userManagementSection.style.display = 'none'; 
      myProfileSection.style.display = 'none';
    };
  
    const showSectionAndSetTitle = (sectionElement, titleText) => {
      clearDisplayedSection();
      sectionElement.style.display = 'block';
      titleElement.textContent = titleText; 
    };
  
    userManagementBtn.addEventListener('click', () => {
      showSectionAndSetTitle(userManagementSection, 'User Management');
    });
  
    myProfileBtn.addEventListener('click', () => {
      showSectionAndSetTitle(myProfileSection, 'My Profile');
    });
  });
