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

class Task extends Api
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

        // Get the task ID from the query parameters
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
            // check from the table 'assigned to' which has the two columns 'task_id' and 'user_id'
            $assignedTo = $this->crudOperator->select('assigned_to', ['task_task_id' => $id, 'user_id' => $userId]);
            if (count($assignedTo) == 0) {
                return self::response(2, 'Task not found');
            }
        }

        $query = "
        SELECT 
            t.*, 
            u.id as user_id, u.name as user_name, 
            p.project_name, 
            ts.status as task_status, 
            ps.status as project_status
        FROM 
            task t
        INNER JOIN 
            assigned_to at ON t.task_id = at.task_task_id
        INNER JOIN 
            user u ON at.user_id = u.id
        INNER JOIN 
            project p ON t.project_project_id = p.project_id
        INNER JOIN 
            task_status ts ON t.task_status_status_id = ts.status_id
        INNER JOIN 
            project_status ps ON p.project_status_status_id = ps.status_id
        WHERE 
            t.task_id = ?
    ";

        // Execute the query using dbCall
        $task = $this->dbCall($query, "s", [$id]);


        // Check if the task exists
        if (count($task) === 0) {
            return self::response(2, 'Task not found');
        }

        $task = $task[0];

        return self::response(1, $task);
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

        // Get the task ID from the query parameters
        if (self::postMethodHasError('task_name', 'task_status_id', 'project_id', 'start_date', 'end_date', 'description')) {
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

        // If user is not an admin, they cannot add tasks
        if (!$isAdmin) {
            return self::response(2, 'Unauthorized');
        }

        // Get data from POST request
        $taskName = $_POST['task_name'] ?? null;
        $description = $_POST['description'] ?? null;
        $startDate = $_POST['start_date'] ?? null;
        $endDate = $_POST['end_date'] ?? null;
        $taskStatusId = $_POST['task_status_id'] ?? null;
        $projectId = $_POST['project_id'] ?? null;

        $validateReadyArray = [
            "name" => ["name" => $taskName],
            "date" => ["date" => $startDate],
            "date" => ["date" => $endDate],
        ];

        $error = $this->validateData($validateReadyArray);

        if (!empty($error)) {
            return self::response(3, $error);
        }

        // Check if project exists
        $project = $this->crudOperator->select('project', ['project_id' => $projectId]);
        if (count($project) == 0) {
            return self::response(2, 'Project not found');
        }

        // Check if task status exists
        $taskStatus = $this->crudOperator->select('task_status', ['status_id' => $taskStatusId]);
        if (count($taskStatus) == 0) {
            return self::response(2, 'Task status not found');
        }

        // Create task ID
        $taskId = uniqid();

        // Prepare data for insertion
        $taskData = [
            'task_id' => $taskId,
            'task_name' => $taskName,
            'description' => $description,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'task_status_status_id' => $taskStatusId,
            'project_project_id' => $projectId
        ];

        // Insert task data into the database
        $this->crudOperator->insert('task', $taskData);


        // Return the response
        return self::response(1, 'Task added successfully');
    }

    protected function edit()
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

        // Get the task ID from the query parameters
        if (self::postMethodHasError('task_id')) {
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

        // If user is not an admin, they cannot add tasks
        if (!$isAdmin) {
            return self::response(2, 'Unauthorized');
        }

        // Get data from POST request
        $taskId = $_POST['task_id'] ?? null;
        $taskName = $_POST['task_name'] ?? null;
        $description = $_POST['description'] ?? null;
        $startDate = $_POST['start_date'] ?? null;
        $endDate = $_POST['end_date'] ?? null;
        $taskStatusId = $_POST['task_status_id'] ?? null;
        $projectId = $_POST['project_id'] ?? null;

        // Fetch the task details to ensure it exists
        $task = $this->crudOperator->select('task', ['task_id' => $taskId]);
        if (count($task) == 0) {
            return self::response(2, 'Task not found');
        }

        // Prepare data for validation and update
        $validateReadyArray = [];
        $updateData = [];
        if ($taskName !== null) {
            $validateReadyArray['name'] = ["name" => $taskName];
            $updateData['task_name'] = $taskName;
        }
        if ($startDate !== null) {
            $validateReadyArray['date'] = ["date" => $startDate];
            $updateData['start_date'] = $startDate;
        }
        if ($endDate !== null) {
            $validateReadyArray['date'] = ["date" => $endDate];
            $updateData['end_date'] = $endDate;
        }

        $error = $this->validateData($validateReadyArray);

        if (!empty($error)) {
            return self::response(3, $error);
        }

        if ($description !== null) {
            $updateData['description'] = $description;
        }

        if ($projectId !== null) {
            // Check if project exists
            $project = $this->crudOperator->select('project', ['project_id' => $projectId]);
            if (count($project) == 0) {
                return self::response(2, 'Project not found');
            }
            $updateData['project_project_id'] = $projectId;
        }

        if ($taskStatusId !== null) {
            // Check if task status exists
            $taskStatus = $this->crudOperator->select('task_status', ['status_id' => $taskStatusId]);
            if (count($taskStatus) == 0) {
                return self::response(2, 'Task status not found');
            }
            $updateData['task_status_status_id'] = $taskStatusId;
        }

        // Update task details in the database
        $this->crudOperator->update('task', $updateData, ['task_id' => $taskId]);

        // Return the response
        return self::response(1, 'Task updated successfully');
    }

    protected function delete()
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

        // Get the task ID from the query parameters
        if (self::postMethodHasError('task_id')) {
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

        // If user is not an admin, they cannot add tasks
        if (!$isAdmin) {
            return self::response(2, 'Unauthorized');
        }

        // Get data from POST request
        $taskId = $_POST['task_id'] ?? null;

        // Fetch the task details to ensure it exists
        $task = $this->crudOperator->select('task', ['task_id' => $taskId]);
        if (count($task) == 0) {
            return self::response(2, 'Task not found');
        }

        // Delete the assignments related to the task
        $this->crudOperator->delete('assigned_to', ['task_task_id' => $taskId]);

        // Delete the task details from the database
        $this->crudOperator->delete('task', ['task_id' => $taskId]);

        // Return the response
        return self::response(1, 'Task deleted successfully');
    }
}
