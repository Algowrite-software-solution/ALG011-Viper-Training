<!-- home page -->
<!-- author : Niman Wijerathna
     created : 2024/05/02
     Description : this is the Home Page Layout-->
<!-- home page (hp) -->

<?php
include "../public/view/component/custom/userProfile.com.php";

include "../public/view/component/custom/projectManagement.com.php";

?>

<!-- Sidebar -->
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
            <li><a href="#" id="project-management-btn"><img src="../../resources/images/home/bag.png" alt="Bag Icon"> Project Management</a></li>
        </ul>
    </div>

    <div class="hp-s1-content">
        <div class="hp-s1-profile">
            <div class="hp-s1-title"></div>
            <button class="hp-s1-btn">Sign Out</button>
            <div class="hp-s1-user-icon" id="my-profile-btn">BT</div>
        </div>
    </div>
</section>

<!-- User Management -->
<div id="user-management-section" style="display: none;">
    <section class="hp-s2-profile-card edit">
        <div class="hp-s3-search-bar">
            <img src="../../resources/images/home/searchicon.png" alt="Search Icon" style="width: 20px;height: 20px;">
            <input type="text" placeholder="Search User...">
        </div>
        <div class="hp-s3-button-group">
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
        <div class="hp-s3-filter-container">
            <div class="hp-s3-filters">
                <button class="filter-button active">All Users</button>
                <button class="filter-button">Active</button>
                <button class="filter-button">Inactive</button>
            </div>
            <div class="filter-btn">
                <button type="button">
                    <img src="../../resources/images/home/filtericon.png" alt="Filter Icon">Filters
                </button>
            </div>
        </div>

        <table class="hp-s3-user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th><img src="../../resources/images/home/user-panel.png" alt="Minimise Icon">Name</th>
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

        <div class="hp-s3-pagination-container">
            <div class="hp-s3-pagination-info">
                Showing 1-4 from 20
            </div>
            <div class="hp-s3-pagination">
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

<!-- Project Management -->
<section id="project-management-section" style="display: none;">
    <div class="hp-s4-container">
        <div class="project-card">
            <div class="project-header">
                <h2>Project Name</h2>
                <div class="project-status">
                    <span class="status-dot green"></span>
                    <span class="status-text">started</span>
                </div>
            </div>
            <div class="project-details">
                <p class="project-id">ALG001</p>
                <p class="project-dates">
                    <span>Start:</span>2024/05/30
                    <span>End:</span>2024/05/30
                </p>
            </div>
            <hr class="hp-s4-divider">
            <div class="project-tasks">
                <h3>Tasks</h3>
                <div class="task">
                    <span class="task-id">A003</span>
                    <span class="task-status green"></span>
                    <span class="task-name">Create UI</span>
                </div>
                <div class="task">
                    <span class="task-id">A012</span>
                    <span class="task-status yellow"></span>
                    <span class="task-name">Develop admin panel</span>
                </div>
            </div>
        </div>

        <div class="project-card">
            <div class="project-header">
                <h2>Project Name</h2>
                <div class="project-status">
                    <span class="status-dot yellow"></span>
                    <span class="status-text">hold</span>
                </div>
            </div>
            <div class="project-details">
                <p class="project-id">ALG001</p>
                <p class="project-dates">
                    <span>Start:</span>2024/05/30
                    <span>End:</span>2024/05/30
                </p>
            </div>
            <hr class="hp-s4-divider">
            <div class="project-tasks">
                <h3>Tasks</h3>
                <div class="task">
                    <span class="task-id">A003</span>
                    <span class="task-status green"></span>
                    <span class="task-name">Create UI</span>
                </div>
                <div class="task">
                    <span class="task-id">A012</span>
                    <span class="task-status yellow"></span>
                    <span class="task-name">Develop admin panel</span>
                </div>
                <div class="task">
                    <span class="task-id">A012</span>
                    <span class="task-status red"></span>
                    <span class="task-name">Server hosting part</span>
                </div>
                <div class="task">
                    <span class="task-id">A012</span>
                    <span class="task-status blue"></span>
                    <span class="task-name">create login UI</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Project Component Section -->
<section id="project-component-section" class="project-component-section d-none">
    <div class="component-section-card bg-white">
        <div class="project-header">
            <h2>Task Name</h2>
        </div>
        <div class="project-details">
            <p class="project-id">A003</p>
            <p class="project-dates">
                <span>Start:</span>2024/05/30
                <span>End:</span>2024/05/30
            </p>
        </div>
        <div class="project-component-tasks task2">
            <div class="toggle-container">
                <input type="checkbox" id="toggle-1" class="toggle-checkbox">
                <label for="toggle-1" class="toggle-label">
                    <span class="toggle-switch"></span>
                </label>
                <span class="toggle-text">Pending</span>
            </div>

            <div class="toggle-container">
                <input type="checkbox" id="toggle-2" class="toggle-checkbox">
                <label for="toggle-2" class="toggle-label">
                    <span class="toggle-switch"></span>
                </label>
                <span class="toggle-text">In Progress</span>
            </div>

            <div class="toggle-container">
                <input type="checkbox" id="toggle-3" class="toggle-checkbox">
                <label for="toggle-3" class="toggle-label">
                    <span class="toggle-switch"></span>
                </label>
                <span class="toggle-text">Completed</span>
            </div>

            <div class="toggle-container">
                <input type="checkbox" id="toggle-4" class="toggle-checkbox">
                <label for="toggle-4" class="toggle-label">
                    <span class="toggle-switch"></span>
                </label>
                <span class="toggle-text">Deleted</span>
            </div>
        </div>
        <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

                Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It's not Latin, though it looks like it, and it actually says nothing,” Before & After magazine answered a curious reader, “Its ‘words’ loosely approximate the frequency with which letters occur in English, which is why at a glance it looks pretty real.”</p>
        </div>

    </div>
</section>

</body>

</html>