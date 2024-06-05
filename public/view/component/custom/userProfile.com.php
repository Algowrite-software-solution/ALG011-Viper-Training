<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/userProfile.css">
    <title>User Profile</title>
</head>

<body>

    <form action="/home.php">
        

        <!-- User -->
        <section class="hp-s2-profile-container" id="my-profile-section" style="display: none;">
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
                        <img src="../../resources/images/home/editicon.png" class="button-icon" alt="Button Edit Icon"> Edit
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

</body>

</html>