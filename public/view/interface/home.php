<!-- home page -->
<!-- author : Niman Wijerathna
     created : 2024/05/02
     Description : this is the Home Page Layout-->
<!-- home page (hp) -->

<?php
include "../public/view/component/custom/userProfile.com.php";

include "../public/view/component/custom/dashborad.com.php";

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
            <li><a href="#" class="active" id="dashboard-btn"><img src="../../resources/images/home/category.png" alt="Dashboard Icon">Dashboard</a></li>
            <li><a href="#" id="user-management-btn"><img src="../../resources/images/home/2-user.png" alt="User Icon">User Management</a></li>
            <li><a href="#" id="project-management-btn"><img src="../../resources/images/home/bag.png" alt="Bag Icon"> Project Management</a></li>
            <li><a href="#" id="task-management-btn"><img src="../../resources/images/home/task management.png" alt="task icon"> Task Management</a></li>
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

<!-- Dashboard -->
<section id="dashboard-section" style="display: none;">
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

<!-- Project Management -->
<section id="project-management-section" >
    <div class="prj-sec"> 
        <div class="container text-center ">
            <hr class="hp-s5-divider prj-divider-size" > 
            <div class="row">  
                <div class="col-7 d-flex flex-column prj-sec-col1">                
                    <form action="/" method="post">
                        <div class="alg-text-dark fw-bold d-flex flex-row justify-content-center align-items-center">
                                <label style="width: 300px; text-align: left;" for="pname">Project Name</label>
                                <input type="text" class="prj-input" id="pname" required>
                        </div>  
                        <br>                  
                        <div class="alg-text-dark fw-bold d-flex flex-row justify-content-center align-items-center">
                                <label style="width: 300px; text-align: left;" for="pid">Project ID</label>
                                <input type="text" class="prj-input2" id="pid" placeholder="ALG0011" required>
                        </div>
                        <br>
                        <div class="alg-text-dark fw-bold d-flex flex-row justify-content-center align-items-center">
                                <label style="width: 300px; text-align: left;" for="description">Description</label>
                                <textarea class="prj-input rounded-4" id="description" rows="3"></textarea>
                        </div>     
                        <br>
                        <div> 
                            <div class="row">             
                                <div class="alg-text-dark fw-bold d-flex flex-row align-items-center col-6 prj-date-col1">
                                        <label class="prj-date-label1" style="text-align: left;" for="pname">Start Date</label>
                                        <input type="date" class="prj-input3"  id="pname" required>
                                </div>
                                <div class="alg-text-dark fw-bold d-flex flex-row align-items-center col-6 prj-date-col2">
                                        <label class="prj-date-label2" for="pname">End Date</label>
                                        <input type="date" class="prj-input3"  id="pname" required>
                                </div>
                            </div>
                        </div> 
                        <br>
                        <div class="alg-text-dark fw-bold d-flex flex-row justify-content-center align-items-center">
                                <label style="width: 300px; text-align: left;" for="addusers">Add users</label>
                                <select class="prj-input" >
                                    <option selected> </option>
                                    <option value="1">Sample</option>
                                    <option value="2">Sample</option>
                                    <option value="3">Sample</option>
                                </select>
                        </div>
                    </form>
                </div>   
                <div class="col prj-status-box">          
                    <div class="status-card">
                        <div class="align-items-center">
                            <p><b>Set Statue</b></p>                        
                        </div>                    
                        <div class="text-center prj-status-box-data">
                            <div class="row"> 
                                <div class="col form-check form-switch" >
                                    <input class="form-check-input" style="width: 65px; height: 35px;" type="checkbox" role="switch" id="PlanningCheck" checked><br><br>
                                    <label class="form-check-label" style="display:flex; margin-left: -35px;" for="PlanningCheck">Planning</label>
                                </div>
                                <div class="col form-check form-switch prj-status-box-switchsec">
                                    <input class="form-check-input" style="width: 65px; height: 35px;" type="checkbox" role="switch" id="StartedCheck"><br><br>
                                    <label class="form-check-label" style="display:flex; margin-left: -35px;" for="StartedCheck">Started</label>
                                </div>
                            </div>
                            <br>
                            <div class="row prj-status-box-row"> 
                                <div class="col form-check form-switch ">
                                    <input class="form-check-input" style="width: 65px; height: 35px;" type="checkbox" role="switch" id="HoldCheck" ><br><br>
                                    <label class="form-check-label" style="display:flex; margin-left: -25px;" for="HoldCheck">Hold</label>
                                </div>
                                <div class="col form-check form-switch prj-status-box-switchsec2">
                                    <input class="form-check-input" style="width: 65px; height: 35px;" type="checkbox" role="switch" id="CancelledCheck"><br><br>
                                    <label class="form-check-label" style="display:flex; margin-left: -45px;" for="CancelledCheck">Cancelled</label>
                                </div>
                            </div>
                            <br>
                            <div class="form-check form-switch prj-status-box-switchsec3">
                                <input class="form-check-input" style="width: 65px; height: 35px;" type="checkbox" role="switch" id="CompletedCheck" ><br><br>
                                <label class="form-check-label" style="display:flex; margin-left: -45px;" for="CompletedCheck">Completed</label>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="prj-user-tb">
                <hr class="hp-s6-divider prj-divider-size">
                <table class="hp-s4-user-table">
                    <thead>
                        <tr style="text-align: left;">
                            <th>ID</th>
                            <th><img src="../../resources/images/home/user-panel.png" alt="Minimise Icon" width="20px">Name</th>
                            <th>Email</th>
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
                            <td class="details">eshmika@gmail.com</td>
                            <td><span class="type user">User</span></td>
                            <td>
                                <button class="action-button delete">
                                    <img src="../../resources/images/home/deleteicon.png" alt="Delete Icon">
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br><br>
                <hr class="hp-s6-divider prj-divider-size">
            </div>       
            <button type="submit" class="alg-btn alg-btn-size" >Create</button>
            <button type="submit" class="alg-btn alg-btn-size" >Update</button>

            <br><br>
            <hr class="hp-s5-divider prj-divider-size"> 
            
            <div class="row prj-st-card" >
                <div class="col-3 project-card" style="height: 200px;">
                    <div class="project-header">
                        <h2>Project Name</h2>
                        <img src="../../resources/images/home/edit_pencil.png" alt="Edit Icon" style="width: 15px; height: 15px; margin-right: -50px;"> 
                        <img src="../../resources/images/home/deletebin.png" alt="Delete Icon" style="width: 15px; height: 15px;"> 
                    </div>
                    <p class="project-id" style="text-align: left;">ALG001</p>
                    <div class="project-status">
                        <span class="status-dot yellow"></span>
                        <span class="status-text">hold</span>
                    </div>
                    <br>
                    <div>
                        <div class="text-left" style="margin-left: -50px;">
                            <div class="row" style="font-size: 13px; font-weight: 700;">
                                <div class="col" style="color: rgba(134, 134, 134, 1);">Start:<br> <span style="color: black; margin-left: 30px;">2024/05/30<span></div>
                                <div class="col" style="color: rgba(134, 134, 134, 1);">End:<br> <span style="color: black; margin-left: 30px;">2024/05/30<span></div>
                            </div>
                        </div> 
                    </div>
                    <hr class="hp-s4-divider">                
                </div>

                <div class="col-3 project-card prj-st-cardtop" style="height: 200px;">
                    <div class="project-header">
                        <h2>Project Name</h2>
                        <img src="../../resources/images/home/edit_pencil.png" alt="Edit Icon" style="width: 15px; height: 15px; margin-right: -50px;"> 
                        <img src="../../resources/images/home/deletebin.png" alt="Delete Icon" style="width: 15px; height: 15px;"> 
                    </div>
                    <p class="project-id" style="text-align: left;">ALG001</p>
                    <div class="project-status">
                        <span class="status-dot yellow"></span>
                        <span class="status-text">hold</span>
                    </div>
                    <br>
                    <div>
                        <div class="text-left" style="margin-left: -50px;">
                            <div class="row" style="font-size: 13px; font-weight: 700;">
                                <div class="col" style="color: rgba(134, 134, 134, 1);">Start:<br> <span style="color: black; margin-left: 30px;">2024/05/30<span></div>
                                <div class="col" style="color: rgba(134, 134, 134, 1);">End:<br> <span style="color: black; margin-left: 30px;">2024/05/30<span></div>
                            </div>
                        </div> 
                    </div>                
                    <hr class="hp-s4-divider">                
                </div>
            </div>
        </div>  
    </div>
</section>

<!-- Task Management -->
<section id="task-management-section" >
    <div class="prj-sec"> 
        <div class="container text-center ">
            <hr class="hp-s5-divider prj-divider-size" > 
            <div class="row">  
                <div class="col-7 d-flex flex-column prj-sec-col1">                
                    <form action="/" method="post">
                        <div class="alg-text-dark fw-bold d-flex flex-row justify-content-center align-items-center">
                                <label style="width: 300px; text-align: left;" for="pname">Task Name</label>
                                <input type="text" class="prj-input" id="pname" required>
                        </div>  
                        <br>                  
                        <div class="alg-text-dark fw-bold d-flex flex-row justify-content-center align-items-center">
                                <label style="width: 300px; text-align: left;" for="pid">Task ID</label>
                                <input type="text" class="prj-input2" id="pid" placeholder="0003A" required>
                        </div>
                        <br>
                        <div class="alg-text-dark fw-bold d-flex flex-row justify-content-center align-items-center">
                                <label style="width: 300px; text-align: left;" for="description">Description</label>
                                <textarea class="prj-input rounded-4" id="description" rows="3"></textarea>
                        </div>     
                        <br>
                        <div> 
                            <div class="row">             
                                <div class="alg-text-dark fw-bold d-flex flex-row align-items-center col-6 prj-date-col1">
                                        <label class="prj-date-label1" style="text-align: left;" for="pname">Start Date</label>
                                        <input type="date" class="prj-input3"  id="pname" required>
                                </div>
                                <div class="alg-text-dark fw-bold d-flex flex-row align-items-center col-6 prj-date-col2">
                                        <label class="prj-date-label2" for="pname">End Date</label>
                                        <input type="date" class="prj-input3"  id="pname" required>
                                </div>
                            </div>
                        </div> 
                        <br>
                        <div class="alg-text-dark fw-bold d-flex flex-row justify-content-center align-items-center">
                                <label style="width: 300px; text-align: left;" for="addusers">Set project</label>
                                <select class="prj-input" >
                                    <option selected> </option>
                                    <option value="1">Sample</option>
                                    <option value="2">Sample</option>
                                    <option value="3">Sample</option>
                                </select>
                        </div>
                        <div class="alg-text-dark fw-bold d-flex flex-row justify-content-center align-items-center">
                                <label style="width: 300px; text-align: left;" for="addusers">Assign users</label>
                                <select class="prj-input" >
                                    <option selected> </option>
                                    <option value="1">Sample</option>
                                    <option value="2">Sample</option>
                                    <option value="3">Sample</option>
                                </select>
                        </div>
                        <div style="display: flex; margin-top: 10px;">
                            <div style="background-color: #0387FF; width: 27%; text-align: left; padding: 10px; padding-left: 20px; display: flex; border-radius: 20px; margin-left: 135px;">
                                <b>Eshmika Irosh</b>
                                <img src="../../resources/images/home/Close Square.png" alt="close Icon" style="width: 25px; height: 25px; margin-left: 30px; justify-content: center;">
                            </div>
                            <div style="background-color: #0387FF; width: 27%; text-align: left; padding: 10px; padding-left: 20px; display: flex; border-radius: 20px; margin-left: 20px;">
                                <b>Eshmika Irosh</b>
                                <img src="../../resources/images/home/Close Square.png" alt="close Icon" style="width: 25px; height: 25px; margin-left: 30px; justify-content: center;">
                            </div>
                        </div>
                    </form>
                </div>   
                <div class="col prj-status-box">          
                    <div class="status-card2">
                        <div class="align-items-center">
                            <p><b>Set Statue</b></p>                        
                        </div>                    
                        <div class="text-center prj-status-box-data">
                            <div class="row"> 
                                <div class="col form-check form-switch" >
                                    <input class="form-check-input" style="width: 65px; height: 35px;" type="checkbox" role="switch" id="PlanningCheck" checked><br><br>
                                    <label class="form-check-label" style="display:flex; margin-left: -35px;" for="PlanningCheck">pending</label>
                                </div>
                                <div class="col form-check form-switch prj-status-box-switchsec">
                                    <input class="form-check-input" style="width: 65px; height: 35px;" type="checkbox" role="switch" id="StartedCheck"><br><br>
                                    <label class="form-check-label" style="display:flex; margin-left: -45px;" for="StartedCheck">in progress</label>
                                </div>
                            </div>
                            <br>
                            <div class="row prj-status-box-row"> 
                                <div class="col form-check form-switch ">
                                    <input class="form-check-input" style="width: 65px; height: 35px;" type="checkbox" role="switch" id="HoldCheck" ><br><br>
                                    <label class="form-check-label" style="display:flex; margin-left: -45px;" for="HoldCheck">completed</label>
                                </div>
                                <div class="col form-check form-switch prj-status-box-switchsec2">
                                    <input class="form-check-input" style="width: 65px; height: 35px;" type="checkbox" role="switch" id="CancelledCheck"><br><br>
                                    <label class="form-check-label" style="display:flex; margin-left: -35px;" for="CancelledCheck">deleted</label>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="prj-user-tb">
                <hr class="hp-s6-divider prj-divider-size">
            </div>       
            <button type="submit" class="alg-btn alg-btn-size" >Create</button>
            <button type="submit" class="alg-btn alg-btn-size" >Update</button>

            <br><br>
            <hr class="hp-s5-divider prj-divider-size"> 
            
            <table class="hp-s4-user-table">
                <thead>
                    <tr style="text-align: left;">
                        <th>Task ID</th>
                        <th>Task name</th>
                        <th>Project name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody style="text-align: left;">
                    <tr>
                        <td><a href="#">302012</a></td>
                        <td class="details">0003AL</td>
                        <td class="details">ALG00011</td>
                        <td><span class="status active">in progress</span></td>
                        <td>
                            <button class="action-button edit">
                                <img src="../../resources/images/home/editicon1.png" alt="Edit Icon">
                            </button>
                            <button class="action-button delete">
                                <img src="../../resources/images/home/deleteicon.png" alt="Delete Icon">
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <hr class="hp-s6-divider prj-divider-size" > 
        </div>  
    </div>
</section>

