<!-- any component code -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>

    <form action="/action_page.php">
        <div>
            <div>
                <img class="fa fa-search" src="" alt="">
                <input type="text" placeholder="Search.." name="search">
            </div>
                <button type="submit"><i class="fa fa-search"></i>Search</button>
                <button type="submit"><i class="fa fa-download"></i>Export</button>
        </div>
    </form>
    <div class="navbar">
        <div>
            <a href="#">All Users</a>
            <a href="#">Active</a>
            <a href="#">Inactive</a>
        </div>
        <div>
            <button type="submit"><i class="fa fa-edit"></i>Export</button>
        </div>
    </div>

    <table>
        <th>ID</th>
        <th><img src="" alt="">Name</th>
        <th>Joined Date</th>
        <th>Email</th>
        <th>Mobile 1</th>
        <th>Mobile 1</th>
        <th>Status</th>
        <th>Type</th>
        <th>Actions</th>

        <tr>
            <td>302012</td>
            <td><div><img src="" alt=""></div><div>Eshmika Irosh<br>3 Variants</div></td>
            <td>29 Dec 2022</td>
            <td>eshmika@gmail.com</td>
            <td>0710902997</td>
            <td>0710442997</td>
            <td><div>Deleted</div></td>
            <td><div>User</div></td>
            <td><img src="" alt=""><img src="" alt=""><img src="" alt=""></td>
        </tr>
        <tr>
            <td>302011</td>
            <td><div><img src="" alt=""></div><div>Viraj Kaushal<br>2 Variants</div></td>
            <td>24 Dec 2022</td>
            <td>viraj@gmail.com</td>
            <td>0710903444</td>
            <td>0710902244</td>
            <td><div>Active</div></td>
            <td><div>Admin</div></td>
            <td><img src="" alt=""><img src="" alt=""><img src="" alt=""></td>
        </tr>
        <tr>
            <td>302002</td>
            <td><div><img src="" alt=""></div><div>Thivina Samarakkodi<br>3 Variants</div></td>
            <td>12 Dec 2022</td>
            <td>thivi@gmail.com</td>
            <td>0710902934</td>
            <td>0714302934</td>
            <td><div>Active</div></td>
            <td><div>User</div></td>
            <td><img src="" alt=""><img src="" alt=""><img src="" alt=""></td>
        </tr>
        <tr>
            <td>3019</td>
            <td><div><img src="" alt=""></div><div>Viraj Kaushal<br>2 Variants</div></td>
            <td>24 Dec 2022</td>
            <td>viraj@gmail.com</td>
            <td>0710903444</td>
            <td>0710902244</td>
            <td><div>Active</div></td>
            <td><div>Admin</div></td>
            <td><img src="" alt=""><img src="" alt=""><img src="" alt=""></td>
        </tr>
    </table>

    <div>
        <p>Showing 1-4 from 20</p>
        <div>
            <button><img src="" alt=""></button>
            <button>1</button>
            <button>2</button>
            <button>...</button>
            <button><img src="" alt=""></button>
        </div>
        
    </div>

</body>
</html>