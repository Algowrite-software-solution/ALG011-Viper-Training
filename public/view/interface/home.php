<!-- home page -->
<!-- author : Niman Wijerathna
     created : 2024/05/02
     Description : this is the Home Page Layout-->
<!-- home page (hp) -->

<section class="hp-s1-container">
    <div class="hp-s1-menu-icon">
        <img src="../resources/images/home/menuicon.png" alt="Menu Icon">
    </div>
    <div class="hp-s1-sidebar" id="sidebar">
        <div class="hp-s1-logo">
            <div class="hp-s1-rounded-icon"></div>
            Algowrite
        </div>
        <div class="hp-s1-close-icon">
            <img src="../../resources/images/home/closeicon.png" alt="Close Icon">
        </div>
        <ul class="hp-s1-menu">
            <li><a href="#" class="active"><img src="../../resources/images/home/category.png" alt="Dashboard Icon">Dashboard</a></li>
            <li><a href="#"><img src="../../resources/images/home/2-user.png" alt="User Icon">User Management</a></li>
            <li><a href="#"><img src="../../resources/images/home/bag.png" alt="Bag Icon"> Project Management</a></li>
        </ul>
    </div>

    <div class="hp-s1-content">
        <div class="hp-s1-profile">
            <div class="hp-s1-title">My Profile</div>
            <button class="hp-s1-btn">Sign Out</button>
            <div class="hp-s1-user-icon">BT</div>
        </div>
    </div>
</section>

<!-- User -->
<section class="hp-s2-profile-container">
    <div class="hp-s2-profile-card">
        <img src="../../resources/images/home/profileimage.png" class="profile-image" alt="User Profile Picture">
        <div class="hp-s2-profile-info">
            <button class="hp-s2-edit-btn">
                <img src="../../resources/images/home/editicon.png" class="button-icon" alt="Button Edit Icon"> Edit
            </button>
            <div class="profile-details">
                <span class="profile-name">Bathiya Thissera</span>
                <span class="profile-position">Admin</span>
                <span class="profile-location">Dematagoda, Colombo, Sri Lanka</span>
            </div>
        </div>
    </div>

    <!-- Personal information -->
    <div class="hp-s2-profile-card">
        <div class="hp-s2-profile-info">
            <button class="hp-s2-edit-btn">
                <img src="../../resources/images/home/editicon.png" class="button-icon" alt="Button Edit Icon" > Edit
            </button>
            <div class="hp-s2-personal-info-wrapper">
                <div class="personal-details personal-info">
                    <span class="profile-name">Personal information</span><br>
                    <span class="profile-position">Name</span>
                    <span class="profile-location">Bathiya Thissera</span>
                    <br>
                    <span class="profile-position">Email</span>
                    <span class="profile-location">Bathiya Thissera</span>
                    <br>
                    <span class="profile-position">Mobile 1</span>
                    <span class="profile-location">0772233439</span>
                </div>
                <div class="personal-details personal-info">
                    <br><br>
                    <span class="profile-position">ID</span>
                    <span class="profile-location">302012</span>
                    <br>
                    <span class="profile-position">Joined date</span>
                    <span class="profile-location">29 Dec 2022</span>
                    <br>
                    <span class="profile-position">Mobile 2</span>
                    <span class="profile-location">0773222654</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Address -->
    <div class="hp-s2-profile-card">
        <div class="hp-s2-profile-info">
            <button class="hp-s2-edit-btn">
                <img src="../../resources/images/home/editicon.png" class="button-icon" alt="Button Edit Icon"> Edit
            </button>
            <div class="hp-s2-personal-info-wrapper address-info-wrapper">
                <div class="personal-details personal-info">
                    <span class="profile-name">Address</span><br>
                    <span class="profile-position">Country</span>
                    <span class="profile-location">Sri Lanka</span>
                    <br>
                    <span class="profile-position">Postal Code</span>
                    <span class="profile-location">022231</span>
                </div>
                <div class="personal-details address-info">
                    <br><br>
                    <span class="profile-position">City/Province</span>
                    <span class="profile-location">Dematagoda, Western province</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Save Button -->
    <div class="hp-s2-save-btn">
        <button>Save</button>
    </div>
</section>