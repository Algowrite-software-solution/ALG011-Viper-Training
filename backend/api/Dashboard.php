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


class Dashboard extends Api
{
    public function __construct($apiPath)
    {
        //pares apiPath parent class constructor
        parent::__construct($apiPath);
        $this->init($this);
    }


    protected function load()
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

        // Get the current logged user's details
        $currentUser = $this->crudOperator->select('user', ['id' => $userId]);
        if (count($currentUser) == 0) {
            return self::response(2, 'User not found');
        }

        $currentUser = $currentUser[0];

        // Check if 'admin' parameter is set
        $isAdminRequest = isset($_POST['admin']);


        if ($isAdminRequest) {
            // Determine if the user is an admin
            $isAdmin = isset($currentUser['user_type_id']) && $currentUser['user_type_id'] == 1;
        }


        // SQL query to get project and task details
        $query = "
            SELECT 
                p.project_id, p.project_name, p.start_date, p.end_date, ps.status as project_status,
                t.task_id, t.task_name, t.description, t.start_date as task_start_date, t.end_date as task_end_date, ts.status as task_status
            FROM 
                project p
            INNER JOIN 
                project_status ps ON p.project_status_status_id = ps.status_id
            LEFT JOIN 
                task t ON p.project_id = t.project_project_id
            LEFT JOIN 
                task_status ts ON t.task_status_status_id = ts.status_id
        ";

        if (!$isAdminRequest) {
            // If not an admin request, filter by user projects and tasks
            $query .= "
                INNER JOIN 
                    user_has_project up ON p.project_id = up.project_id
                LEFT JOIN 
                    assigned_to at ON t.task_id = at.task_task_id
                WHERE 
                    up.user_id = ? AND (t.task_id IS NULL OR at.user_id = ?)
            ";
            $params = ["ss", [$userId, $userId]];
        } else {
            // If admin request, check if the user is admin
            if (!$isAdmin) {
                return self::response(2, 'Unauthorized access');
            }
            $params = [];
        }

        // Execute the query using dbCall
        $result = $this->dbCall($query, ...$params);

        // Check if the result is empty
        if (count($result) == 0) {
            return self::response(2, 'No projects or tasks found');
        }

        // Process the result into a structured response
        $projects = [];
        foreach ($result as $row) {
            $projectId = $row['project_id'];
            if (!isset($projects[$projectId])) {
                $projects[$projectId] = [
                    'project_id' => $row['project_id'],
                    'project_name' => $row['project_name'],
                    'start_date' => $row['start_date'],
                    'end_date' => $row['end_date'],
                    'status' => $row['project_status'],
                    'tasks' => []
                ];
            }
            if ($row['task_id'] !== null) {
                $projects[$projectId]['tasks'][] = [
                    'task_id' => $row['task_id'],
                    'task_name' => $row['task_name'],
                    'description' => $row['description'],
                    'start_date' => $row['task_start_date'],
                    'end_date' => $row['task_end_date'],
                    'status' => $row['task_status']
                ];
            }
        }

        // Return the response
        return self::response(1, $projects);
    }
}
