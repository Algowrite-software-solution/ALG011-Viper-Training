
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
                            'user_type_id' => 2

                     ]
              );
              //send the mail
              $mailSender = new MailSender($email);
              $mailSender->mailInitiate('Verification Code', 'Verification Code', 'Your verification code is ' . $verification);
              if(!$mailSender->sendMail()){
                     return self::response(5,'mail sending failed');
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

              if (self::postMethodHasError('email','verification_code')) {
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

              if($result[0]['verification_code'] != $verification_code){
                     return self::response(5, 'verification code incorrect');
              }

              //call sign in
              $this->signin();
              
              //response
              return self::response(1);
              
              
       }
}
