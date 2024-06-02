
<?php

/**
 * @author : Author Name
 * @description : This file is an Example for developing an API
 */

// import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/../model/PasswordHash.php';
require_once __DIR__ . '/../model/UniqueIDGenerator.php';
require_once __DIR__ . '/../model/mail/MailSender.php';
require_once __DIR__ . '/../model/SessionManager.php';


require_once __DIR__ . '/Test.php';

class User extends Api
{
       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }

       public function register()
       {

              //check whether request method is post
              if (!self::isPostMethod()) {
                     return INVALID_REQUEST_METHOD;
              }
              //check whether post method has error
              if (self::postMethodHasError('name', 'email', 'password', 'role', 'mobile1', 'mobile2')) {
                     return self::response(2, 'missing parameters');
              }

              //get post data
              $name = $_POST['name'] ?? null;
              $email = $_POST['email'] ?? null;
              $password = $_POST['password'] ?? null;
              $role = $_POST['role'] ?? null;
              $mobile1 = $_POST['mobile1'] ?? null;
              $mobile2 = $_POST['mobile2'] ?? null;

              // validate the data
              $validateReadyArray = [
                     "name" => ["name" => $name],
                     "email" => ["email" => $email],
                     "password" => ["password" => $password],
                     "phone_number" => ["phone_number" => $mobile1],
                     "phone_number" => ["phone_number" => $mobile2],
              ];
              $error = $this->validateData($validateReadyArray);
              if (!empty($error)) {
                     return self::response(3, $error);
              }

              ///check whether email already exists
              $result = $this->crudOperator->select('user', array('email' => $email));


              if (count($result) > 0) {
                     return self::response(4, 'email already exists');
              }

              //hash the password

              $passwordHasher = new PasswordHash();
              $hash = $passwordHasher->hash($password);

              //genearte 4 uniq numbers and save it ti ti verification variable
              $verification = rand(100000, 999999);

              $uniqeIdGenerator = new UniqueIDGenerator($this->databaseDriver);
              $id = $uniqeIdGenerator->generateUniqueID('user', 'id', 10);

              //insert data to the database
              $result = $this->crudOperator->insert(
                     'user',
                     [
                            'id' => $id,
                            'name' => $name,
                            'email' => $email,
                            'password_hash' => $hash,
                            'user_role_id' => $role,
                            'verification_code' => $verification,
                            'registered_date' => date('Y-m-d H:i:s'),
                            'last_logged' => date('Y-m-d H:i:s'),
                            'mobile_1' => $mobile1,
                            'mobile_2' => $mobile2,
                            'user_status_id' => 1,
                            'user_type_id' => 2,
                            'verification_code_time' => date('Y-m-d H:i:s')

                     ]
              );
              //send the mail
              $mailSender = new MailSender($email);
              $mailSender->mailInitiate('Verification Code', 'Verification Code', 'Your verification code is ' . $verification);
              if (!$mailSender->sendMail()) {
                     return self::response(5, 'mail sending failed');
              }

              //return success massege
              return self::response(1);
       }

       protected function signin()
       {
              if (!self::isPostMethod()) {
                     return INVALID_REQUEST_METHOD;
              }

              //catch request parameter sent data

              if (self::postMethodHasError('email', 'password')) {
                     return self::response(2, 'missing parameters');
              }

              $email = $_POST['email'] ?? null;
              $password = $_POST['password'] ?? null;

              //validate data

              $validateReadyArray = [
                     "email" => ["email" => $email],
                     "password" => ["password" => $password]

              ];
              $error = $this->validateData($validateReadyArray);
              if (!empty($error)) {
                     return self::response(3, $error);
              }

              //validate if user exist or not

              $result = $this->crudOperator->select('user', array('email' => $email));

              if (count($result) == 0) {
                     return self::response(4, 'email not found');
              }

              $hash = $result[0]['password_hash'];

              $passwordHasher = new PasswordHash();

              if (!$passwordHasher->isValid($password, $hash)) {
                     return self::response(5, 'password incorrect');
              }

              //sign in user to session
              $sessionManager = new SessionManager();
              $sessionManager->login($result[0]['id']);

              //return success massege
              return self::response(1);
       }


       protected function userverify()
       {
              if (!self::isPostMethod()) {
                     return INVALID_REQUEST_METHOD;
              }

              //catch request parameter sent data

              if (self::postMethodHasError('email', 'verification_code')) {
                     return self::response(2, 'missing parameters');
              }

              $email = $_POST['email'] ?? null;
              $verification_code = $_POST['verification_code'] ?? null;

              //validate data

              $validateReadyArray = [
                     "email" => ["email" => $email],
              ];

              $error = $this->validateData($validateReadyArray);
              if (!empty($error)) {
                     return self::response(3, $error);
              }

              //check if the code is valid for the email of the user
              $result = $this->crudOperator->select('user', array('email' => $email));

              if (count($result) == 0) {
                     return self::response(4, 'email not found');
              }

              if ($result[0]['verification_code'] != $verification_code) {
                     return self::response(5, 'verification code incorrect');
              }

              // call sign in
              $sessionManager = new SessionManager();
              $sessionManager->login($result[0]['id']);

              //response
              return self::response(1);
       }

       protected function isLoged()
       {
              if (!self::isGetMethod()) {
                     return INVALID_REQUEST_METHOD;
              }

              //catch request parameter sent data
              $sessionManager = new SessionManager();
              if ($sessionManager->isLoggedIn()) {
                     return self::response(1, 'logged in');
              } else {
                     return self::response(1, 'not logged in');
              }
       }

       protected function ChechIsLogged()
       {
              if (!self::isGetMethod()) {
                     return INVALID_REQUEST_METHOD;
              }

              //catch request parameter sent data
              $sessionManager = new SessionManager();
              if ($sessionManager->isLoggedIn()) {
                     return true;
              } else {
                     return false;
              }
       }

       protected function adminVerification()
       {
              if (!self::isGetMethod()) {
                     return INVALID_REQUEST_METHOD;
              }

              if ($this->ChechIsLogged() == true) {
                     $sessionManager = new SessionManager();
                     $result = $this->crudOperator->select('user', array('id' => $sessionManager->getUserId()));
                     if ($result[0]['user_type_id'] == 1) {
                            return self::response(1, 'admin');
                     } else {
                            return self::response(2, 'not admin');
                     }
              } else {
                     return self::response(3, 'not logged in');
              }
       }

       protected function verify()
       {
              if (!self::isPostMethod()) {
                     return INVALID_REQUEST_METHOD;
              }

              $verification = rand(100000, 999999);

              if ($this->ChechIsLogged() == true) {
                     $sessionManager = new SessionManager();
                     $result = $this->crudOperator->select('user', array('id' => $sessionManager->getUserId()));
                     $email = $result[0]['email'];
                     $result = $this->crudOperator->update('user', array('verification_code' => $verification, 'verification_code_time' => date('Y-m-d H:i:s')), array('id' => $sessionManager->getUserId()));
                     //send the mail
                     $mailSender = new MailSender($email);
                     $mailSender->mailInitiate('Verification Code', 'Verification Code', 'Your verification code is ' . $verification);
                     if (!$mailSender->sendMail()) {
                            return self::response(5, 'mail sending failed');
                     }
                     return self::response(1, 'verification code sent');
              } else {
                     return self::response(2, 'not logged in');
              }
       }

       protected function passwordReset()
       {
              if (!self::isPostMethod()) {
                     return INVALID_REQUEST_METHOD;
              }

              //catch request parameter sent data

              if (self::postMethodHasError('password', 'verification_code', 'new_password', 'reenter_newpassword')) {
                     return self::response(2, 'missing parameters');
              }

              $password = $_POST['password'] ?? null;
              $verification_code = $_POST['verification_code'] ?? null;
              $new_password = $_POST['new_password'] ?? null;
              $reenter_newpassword = $_POST['reenter_newpassword'] ?? null;

              //validate data

              $validateReadyArray = [
                     "password" => ["password" => $password],
                     "password" => ["new_password" => $new_password],
                     "password" => ["reenter_newpassword" => $reenter_newpassword]
              ];

              $error = $this->validateData($validateReadyArray);
              if (!empty($error)) {
                     return self::response(3, $error);
              }

              //catch request parameter sent data

              $sessionManager = new SessionManager();
              if ($this->ChechIsLogged() == true) {
                     $current_time = date('Y-m-d H:i:s');

                     $result = $this->crudOperator->select('user', array('id' => $sessionManager->getUserId()));
                     $hash = $result[0]['password_hash'];
                     $verification = $result[0]['verification_code'];
                     $verificationTime = $result[0]['verification_code_time'];

                     $dateTime = new DateTime($verificationTime);

                     $dateTime->modify('+1 minutes');

                     $updatedTime = $dateTime->format('Y-m-d H:i:s');

                     $passwordHasher = new PasswordHash();

                     if (!$passwordHasher->isValid($password, $hash)) {
                            return self::response(5, 'password incorrect');
                     } else {
                            if ($verification == $verification_code) {

                                   if ($current_time > $updatedTime) {
                                          // Regenerate a new verification code verify() 
                                          $this->verify();
                                          return self::response(2, 'verification code expired, new code generated');
                                   } else {
                                          if ($new_password == $reenter_newpassword) {
                                                 //update password
                                                 $hash2 = $passwordHasher->hash($reenter_newpassword);
                                                 $result = $this->crudOperator->update('user', array('password_hash' => $hash2), array('id' => $sessionManager->getUserId()));
                                                 return self::response(1, 'password updated');
                                          }
                                   }
                                   return self::response(6, 'passwords do not match');
                            }
                            return self::response(5, 'verification code incorrect');
                     }
              } else {
                     return self::response(2, 'not logged in');
              }
       }

       protected function getProfile()
       {
              if (!self::isGetMethod()) {
                     return INVALID_REQUEST_METHOD;
              }

              if ($this->ChechIsLogged() == true) {
                     //get user data
                     $sessionManager = new SessionManager();
                     $result = $this->crudOperator->select('user', array('id' => $sessionManager->getUserId()));
                     return self::response(1, $result);
              } else {
                     return self::response(2, 'not logged in');
              }
       }

       protected function profileListView()
       {
              if (!self::isGetMethod()) {
                     return INVALID_REQUEST_METHOD;
              }

              //get all user data
              $result = $this->crudOperator->select('user');
              return self::response(1, $result);
       }

       protected function profileListupdate()
       {
              if (!self::isPostMethod()) {
                     return INVALID_REQUEST_METHOD;
              }

              //check whether post method has error
              if (self::postMethodHasError('name', 'email', 'password', 'role', 'mobile1', 'mobile2')) {
                     return self::response(2, 'missing parameters');
              }

              //get post data
              $name = $_POST['name'] ?? null;
              $email = $_POST['email'] ?? null;
              $password = $_POST['password'] ?? null;
              $role = $_POST['role'] ?? null;
              $mobile1 = $_POST['mobile1'] ?? null;
              $mobile2 = $_POST['mobile2'] ?? null;

              // validate the data
              $validateReadyArray = [
                     "name" => ["name" => $name],
                     "email" => ["email" => $email],
                     "password" => ["password" => $password],
                     "phone_number" => ["phone_number" => $mobile1],
                     "phone_number" => ["phone_number" => $mobile2],
              ];
              $error = $this->validateData($validateReadyArray);
              if (!empty($error)) {
                     return self::response(3, $error);
              }

              if ($this->ChechIsLogged() == true) {
                     //hash the password
                     $passwordHasher = new PasswordHash();
                     $hash = $passwordHasher->hash($password);

                     //update data to the database
                     $sessionManager = new SessionManager();
                     $this->crudOperator->update(
                            'user',
                            [
                                   'name' => $name,
                                   'email' => $email,
                                   'password_hash' => $hash,
                                   'user_role_id' => $role,
                                   'mobile_1' => $mobile1,
                                   'mobile_2' => $mobile2
                            ],
                            array('id' => $sessionManager->getUserId())
                     );

                     //return success massege
                     return self::response(1, 'profile updated');
              } else {
                     return self::response(2, 'not logged in');
              }
       }

       protected function delete()
       {
              // check REQ method is POST
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              // get current logged user
              $id = $this->sessionManager->getUserId();

              // check verification code
              //check whether post method has error
              if (self::postMethodHasError('code')) {
                     return self::response(2, 'missing parameters');
              }

              $code = $_POST['code'] ?? null;
              $result  = $this->crudOperator->select('user', ['verification_code' => $code, 'id' => $id]);
              if (count($result) == 0) {
                     return self::response(2, 'Invalid verification code');
              }

              // delete record from DB
              $this->crudOperator->delete('user', ['id' => $id]);

              $this->sessionManager->logout();

              // response
              return self::response(1);
       }

       protected function update()
       {
              // check REQ method is POST
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              // get current logged user
              $id = $this->sessionManager->getUserId();

              // validate required fields
              $requiredFields = ['name', 'role', 'mobile1', 'mobile2'];
              foreach ($requiredFields as $field) {
                     if (self::postMethodHasError($field)) {
                            return self::response(2, 'missing parameters');
                     }
              }

              // get data from POST request
              $name = $_POST['name'] ?? null;
              $role = $_POST['role'] ?? null;
              $mobile1 = $_POST['mobile1'] ?? null;
              $mobile2 = $_POST['mobile2'] ?? null;

              // Validate the data
              $validateReadyArray = [
                     "name" => ["name" => $name],
                     "phone_number" => ["phone_number" => $mobile1],
                     "phone_number" => ["phone_number" => $mobile2],
              ];

              $error = $this->validateData($validateReadyArray);
              if (!empty($error)) {
                     return self::response(3, $error);
              }

              // check if user exists
              $user = $this->crudOperator->select('user', ['id' => $id]);
              if (count($user) == 0) {
                     return self::response(2, 'User not found');
              }

              // update user details in DB
              $updateData = [
                     'name' => $name,
                     'user_role_id' => $role,
                     'mobile_1' => $mobile1,
                     'mobile_2' => $mobile2
              ];

              $this->crudOperator->update('user', $updateData, ['id' => $id]);

              // response
              return self::response(1, 'User details updated successfully');
       }

       public function display()
       {
              // Check if the request method is GET
              if (!self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              // Get the user ID from the session
              $id = $this->sessionManager->getUserId();

              // Fetch the user details along with role, status, and type using INNER JOIN
              $query = "
                     SELECT 
                            u.id, u.name, u.email, u.mobile_1, u.mobile_2, u.registered_date, u.last_logged,
                            u.user_role_id, u.user_status_id, u.user_type_id,
                            ur.role, us.status, ut.type
                     FROM 
                            user u
                     INNER JOIN 
                            user_role ur ON u.user_role_id = ur.id
                     INNER JOIN 
                            user_status us ON u.user_status_id = us.id
                     INNER JOIN 
                            user_type ut ON u.user_type_id = ut.id
                     WHERE 
                            u.id = ?
                     ";

              // Execute the query using dbCall
              $userDetails = $this->dbCall($query,"i", [$id]);
              
              // Check if the user exists
              if (count($userDetails) == 0) {
                     return self::response(2, 'User not found');
              }

              
              $userDetails = $userDetails[0];

              $responseData = [
                     'id' => $userDetails['id'],
                     'name' => $userDetails['name'],
                     'email' => $userDetails['email'],
                     'user_role_id' => $userDetails['user_role_id'],
                     'role' => $userDetails['role'],
                     'mobile1' => $userDetails['mobile_1'],
                     'mobile2' => $userDetails['mobile_2'],
                     'registered_date' => $userDetails['registered_date'],
                     'last_logged' => $userDetails['last_logged'],
                     'user_status_id' => $userDetails['user_status_id'],
                     'user_status' => $userDetails['status'],
                     'user_type_id' => $userDetails['user_type_id'],
                     'user_type' => $userDetails['type']
              ];

              // Return the response
              return self::response(1, $responseData);
       }
}
