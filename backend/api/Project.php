<?php

/**
 * @author : Janith Nirmal
 * @description : this is the test API for system updates.
 */

// import statements
// import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/../model/PasswordHash.php';
require_once __DIR__ . '/../model/UniqueIDGenerator.php';
require_once __DIR__ . '/../model/mail/MailSender.php';
require_once __DIR__ . '/../model/SessionManager.php';

class Project extends Api
{
    public function __construct($apiPath)
    {
        //pares apiPath parent class constructor
        parent::__construct($apiPath);
        $this->init($this);
    }

    //data method
    protected function view()
    {
        // Check if the request method is GET
        if (!self::isPostMethod()) {
            return self::response(2, INVALID_REQUEST_METHOD);
        }

        // Get the user ID from the session
        $userId = $this->sessionManager->getUserId();

        // Check if the user is logged in
        if ($userId === null) {
            return self::response(2, 'User not logged in');
        }

        // Get the project ID from the query parameters
        if (self::postMethodHasError('id')) {
            return self::response(2, 'missing parameters');
        }

        // Get the current logged user's details
        $currentUser = $this->crudOperator->select('user', ['id' => $userId]);
        if (count($currentUser) == 0) {
            return self::response(2, 'User not found');
        }

        $currentUser = $currentUser[0];

        // Determine if the user is an admin or a regular user
        $isAdmin = isset($currentUser['user_type_id']) && $currentUser['user_type_id'] == 1;

        $id = $_POST['id'] ?? null;

        if (!$isAdmin) {
            // check from the table 'assigned to' which has the two columns 'project_id' and 'user_id'
            $hasProject = $this->crudOperator->select('user_has_project', ['project_id' => $id, 'user_id' => $userId]);
            if (count($hasProject) == 0) {
                return self::response(2, 'Project not found');
            }
        }

        $query = "
        SELECT 
        p.*,
        ps.status as project_status,
        u.id as user_id,
        u.name as user_name,
        GROUP_CONCAT(t.project_name SEPARATOR ', ') as project_names
    FROM 
        project p
    INNER JOIN 
        user_has_project up ON p.project_id = up.project_id
    INNER JOIN 
        user u ON up.user_id = u.id
    INNER JOIN 
        project_status ps ON p.project_status_status_id = ps.status_id
    LEFT JOIN 
        project t ON p.project_id = t.project_project_id
    WHERE 
        p.project_id = ?
    GROUP BY
        p.project_id    
    ";

        // Execute the query using dbCall
        $project = $this->dbCall($query, "s", [$id]);


        // Check if the project exists
        if (count($project) === 0) {
            return self::response(2, 'Project not found');
        }

        $project = $project[0];

        return self::response(1, $project);
    }

    protected function add()
    {
        // Check if the request method is POST
        if (!self::isPostMethod()) {
            return self::response(2, INVALID_REQUEST_METHOD);
        }

        // Get the user ID from the session
        $userId = $this->sessionManager->getUserId();

        // Check if the user is logged in
        if ($userId === null) {
            return self::response(2, 'User not logged in');
        }

        // Get the project ID from the query parameters
        if (self::postMethodHasError('project_name', 'project_status_id', 'start_date', 'end_date', 'description')) {
            return self::response(2, 'missing parameters');
        }

        // Get the current logged user's details
        $currentUser = $this->crudOperator->select('user', ['id' => $userId]);
        if (count($currentUser) == 0) {
            return self::response(2, 'User not found');
        }

        $currentUser = $currentUser[0];

        // Determine if the user is an admin
        $isAdmin = isset($currentUser['user_type_id']) && $currentUser['user_type_id'] == 1;

        // If user is not an admin, they cannot add projects
        if (!$isAdmin) {
            return self::response(2, 'Unauthorized');
        }

        // Get data from POST request
        $projectName = $_POST['project_name'] ?? null;
        $description = $_POST['description'] ?? null;
        $startDate = $_POST['start_date'] ?? null;
        $endDate = $_POST['end_date'] ?? null;
        $projectStatusId = $_POST['project_status_id'] ?? null;

        $validateReadyArray = [
            "name" => ["name" => $projectName],
            "date" => ["date" => $startDate],
            "date" => ["date" => $endDate],
        ];

        $error = $this->validateData($validateReadyArray);

        if (!empty($error)) {
            return self::response(3, $error);
        }


        // Check if project status exists
        $projectStatus = $this->crudOperator->select('project_status', ['status_id' => $projectStatusId]);
        if (count($projectStatus) == 0) {
            return self::response(2, 'project status not found');
        }

        // Create project ID
        $projectId = uniqid();

        // Prepare data for insertion
        $projectData = [
            'project_id' => $projectId,
            'project_name' => $projectName,
            'description' => $description,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'project_status_status_id' => $projectStatusId,
        ];

        // Insert project data into the database
        $this->crudOperator->insert('project', $projectData);


        // Return the response
        return self::response(1, 'project added successfully');
    }
}
