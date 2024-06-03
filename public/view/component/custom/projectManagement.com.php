<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/projectManagement.com.css">
    <title>Project Component</title>
</head>

<body>
    <form action="/home.php">
        <!-- Project Component Section -->
        <section id="project-component-section" class="project-component-section d-none">
            <div class="component-section-card">
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