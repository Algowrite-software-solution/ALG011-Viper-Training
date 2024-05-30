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
            <li><a href="#" id="user-management-btn"><img src="../../resources/images/home/2-user.png" alt="User Icon">User Management</a></li>
            <li><a href="#"><img src="../../resources/images/home/bag.png" alt="Bag Icon"> Project Management</a></li>
        </ul>
    </div>

    <div class="hp-s1-content">
        <div class="hp-s1-profile">
            <div class="hp-s1-title">Title</div>
            <button class="hp-s1-btn">Sign Out</button>
            <div class="hp-s1-user-icon" id="my-profile-btn">BT</div>
        </div>
    </div>
</section>

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

<!-- User Management -->
<div id="user-management-section" style="display: none;">
    <section class="hp-s2-profile-card edit">
        <div class="search-bar">
            <img src="../../resources/images/home/searchicon.png" alt="Search Icon">
            <input type="text" placeholder="Search User...">

        </div>
        <div class="button-group">
            <div class="search-btn">
                <button type="button">
                    Search <img src="../../resources/images/home/searchicon2.png" alt="Search Icon">
                </button>
            </div>
            <div class="export-btn">
                <button type="button">
                    <img src="../../resources/images/home/exporticon.png" alt="Export Icon">Export
                </button>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="filters">
            <button class="filter-button active">All Users</button>
            <button class="filter-button">Active</button>
            <button class="filter-button">Inactive</button>
        </div>
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th><img src="../../resources/images/home/user-panel.png" alt="User Panel Icon">Name</th>
                    <th>Joined Date</th>
                    <th>Email</th>
                    <th>Mobile 1</th>
                    <th>Mobile 2</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#">302012</a></td>
                    <td>
                        <div class="user-info"><img src="../../resources/images/home/userimage.png" alt="Avatar"><span>Eshmika Irosh</span>
                            <p>3 Variants</p>
                        </div>
                    </td>
                    <td class="details">29 Dec 2022</td>
                    <td class="details">eshmika@gmail.com</td>
                    <td class="details">0719029297</td>
                    <td class="details">0710429297</td>
                    <td><span class="status deleted">Deleted</span></td>
                    <td><span class="type user">User</span></td>
                    <td>
                        <button class="action-button edit">
                            <img src="../../resources/images/home/editicon1.png" alt="Edit Icon">
                        </button>
                        <button class="action-button view">
                            <img src="../../resources/images/home/viewicon.png" alt="View Icon">
                        </button>
                        <button class="action-button delete">
                            <img src="../../resources/images/home/deleteicon.png" alt="Delete Icon">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><a href="#">302011</a></td>
                    <td>
                        <div class="user-info"><img src="../../resources/images/home/userimage.png" alt="Avatar"><span>Viraj Kaushal</span>
                            <p>2 Variants</p>
                        </div>
                    </td>
                    <td class="details">24 Dec 2022</td>
                    <td class="details">viraj@gamil.com</td>
                    <td class="details">0710903444</td>
                    <td class="details">0710902244</td>
                    <td><span class="status active">Active</span></td>
                    <td><span class="type admin">Admin</span></td>
                    <td>
                        <button class="action-button edit">
                            <img src="../../resources/images/home/editicon1.png" alt="Edit Icon">
                        </button>
                        <button class="action-button view">
                            <img src="../../resources/images/home/viewicon.png" alt="View Icon">
                        </button>
                        <button class="action-button delete">
                            <img src="../../resources/images/home/deleteicon.png" alt="Delete Icon">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><a href="#">302002</a></td>
                    <td>
                        <div class="user-info"><img src="../../resources/images/home/userimage.png" alt="Avatar"><span>Thivina Samarakkodi</span>
                            <p>3 Variants</p>
                        </div>
                    </td>
                    <td class="details">29 Dec 2022</td>
                    <td class="details">thivi@gamil.com</td>
                    <td class="details">0710902934</td>
                    <td class="details">0714302934</td>
                    <td><span class="status active">Active</span></td>
                    <td><span class="type user">User</span></td>
                    <td>
                        <button class="action-button edit">
                            <img src="../../resources/images/home/editicon1.png" alt="Edit Icon">
                        </button>
                        <button class="action-button view">
                            <img src="../../resources/images/home/viewicon.png" alt="View Icon">
                        </button>
                        <button class="action-button delete">
                            <img src="../../resources/images/home/deleteicon.png" alt="Delete Icon">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><a href="#">301901</a></td>
                    <td>
                        <div class="user-info"><img src="../../resources/images/home/userimage.png" alt="Avatar"><span>Niman Wijerathna</span>
                            <p>1 Variants</p>
                        </div>
                    </td>
                    <td class="details">21 Oct 2022</td>
                    <td class="details">niman@gmail.com</td>
                    <td class="details">07109021231</td>
                    <td class="details">07109026541</td>
                    <td><span class="status active">Active</span></td>
                    <td><span class="type user">User</span></td>
                    <td>
                        <button class="action-button edit">
                            <img src="../../resources/images/home/editicon1.png" alt="Edit Icon">
                        </button>
                        <button class="action-button view">
                            <img src="../../resources/images/home/viewicon.png" alt="View Icon">
                        </button>
                        <button class="action-button delete">
                            <img src="../../resources/images/home/deleteicon.png" alt="Delete Icon">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="pagination-container">
            <div class="pagination-info">
                Showing 1-4 from 20
            </div>
            <div class="pagination">
                <button class="page-button">&lt;</button>
                <button class="page-button active">1</button>
                <button class="page-button">2</button>
                <button class="page-button">3</button>
                <button class="page-button">...</button>
                <button class="page-button">&gt;</button>
            </div>
        </div>
    </section>
</div>

</body>

</html>