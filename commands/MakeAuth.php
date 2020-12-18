<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakeAuth extends Command
{
    protected $commandName = 'make:auth';
    protected $commandDescription = "Creates a new model";

    protected $commandArgumentName = "";
    protected $commandArgumentDescription = "What Model do you want to create?";

    protected $commandOptionName = "m"; // should be specified like "app:greet John --cap"
    // protected $commandOptionName = $input->getOption();
    protected $commandOptionDescription = 'If set, it will set the directory for model class to be created';

    protected function configure()
    {
        $this
            ->setName($this->commandName)
            ->setDescription($this->commandDescription)
            ->addArgument(
                $this->commandArgumentName,
                InputArgument::OPTIONAL,
                $this->commandArgumentDescription
            )
            ->addOption(
                $this->commandOptionName,
                null,
                InputOption::VALUE_NONE,
                $this->commandOptionDescription
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument($this->commandArgumentName);

        if ($name) {
            $text = $name;
        } else {
            return "error no model name given";
        }

        if ($input->getOption($this->commandOptionName)) {
            var_dump($input->getOption($this->commandOptionName));
            die();
            $text = strtoupper($text);
        }

        //create model
        $newFileName = 'app/models/User.php';
        $newFileContent = '<?php
        // namespace App\Models;
        class User
        {
            private $db;
        
            /**
             * User constructor.
             * @param null $data
             */
            public function __construct()
            {
                $this->db = new Database;
            }
            //find user through email
            public function findUserByEmail($email)
            {
                // $this->db->bind(":email", $email);
                $this->db->query("SELECT * FROM users WHERE email= :email");
                $this->db->bind(":email", $email);
        
                $row = $this->db->single();
                //check row
                if ($this->db->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        
            public function register($data)
            {
                $this->db->query("INSERT INTO users (name, email, password) VALUES(:name, :email, :password)");
                $this->db->bind(":name", $data["name"]);
                $this->db->bind(":email", $data["email"]);
                $this->db->bind(":password", $data["password"]);
        
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
            public function login($email,  $password)
            {
                $this->db->query("SELECT *FROM users WHERE email=:email");
                $this->db->bind(":email", $email);
                $row = $this->db->single();
                $hashed_password = $row->password;
                if (password_verify($password, $hashed_password)) {
                    return $row;
                } else {
                    return false;
                }
            }
            public function getUserbyId($user_id)
            {
                $this->db->query("SELECT * FROM users WHERE id= :user_id");
                $this->db->bind(":user_id", $user_id);
        
                $row = $this->db->single();
                return $row;
            }
        }
        ';
        $myfile = fopen("app/models/User.php", "w") or die("Unable to open or create User.php file!");
        if ($myfile) {
            if (file_put_contents($newFileName, $newFileContent) !== false) {
                echo "Model created at " . basename($newFileName) . "";
            }
        } else {
            echo "Cannot create Model " . basename($newFileName) . "";
        }


        //creates views
        $newFileName = 'app/views/users/register.php';
        $newFileContent = '<?php require APPROOT . "/views/inc/header.php"; ?>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Create An account</h2>
                    <p>Please fill the form to register with us</p>
                    <form action="<?= URLROOT ?>users/register" method="post">
                        <div class="form-group">
                            <label for="name">Name <sup>*</sup></label>
                            <input type="text" name="name" class="form-control form-control-lg <?= (!empty($data["name_err"])) ? "is-invalid" : " "; ?>" value="<?= $data["name"]; ?>">
                            <span class="invalid-feedback"><?= $data["name_err"]; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <sup>*</sup></label>
                            <input type="email" name="email" class="form-control form-control-lg <?= (!empty($data["email_err"])) ? "is-invalid" : ""; ?>" value="<?= $data["email"]; ?>">
                            <span class="invalid-feedback"><?= $data["email_err"]; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password: <sup>*</sup></label>
                            <input type="password" name="password" class="form-control form-control-lg <?= (!empty($data["password_err"])) ? "is-invalid" : ""; ?>" value="<?= $data["password"]; ?>">
                            <span class="invalid-feedback"><?= $data["password_err"]; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Confirm Password: <sup>*</sup></label>
                            <input type="password" name="confirm_password" class="form-control form-control-lg <?= (!empty($data["confirm_password_err"])) ? "is-invalid" : ""; ?>" value="<?= $data["confirm_password"]; ?>">
                            <span class="invalid-feedback"><?= $data["confirm_password_err"]; ?></span>
                        </div>
        
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Register" class="btn btn-success btn-block">
                            </div>
                            <div class="col">
                                <a href="<?= URLROOT;?>users/login " class="btn btn-light btn-block">Have an account? Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <?php require APPROOT . "/views/inc/footer.php"; ?>
        ';
        $myfile = fopen("app/views/users/register.php", "w") or die("Unable to open or create Register.php file!");
        if ($myfile) {
            if (file_put_contents($newFileName, $newFileContent) !== false) {
                echo "Model created at " . basename($newFileName) . "";
            }
        } else {
            echo "Cannot create Model " . basename($newFileName) . "";
        }


        // login
        $newFileName = 'app/views/users/login.php';
        $newFileContent = '<?php require APPROOT . "/views/inc/header.php"; ?>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Login</h2>
                    <p>Please fill the form to login</p>
                    <form action="<?= URLROOT ?>users/login" method="post">
                        <div class="form-group">
                            <label for="email">Email <sup>*</sup></label>
                            <input type="email" name="email" class="form-control form-control-lg <?= (!empty($data["email_err"])) ? "is-invalid" : ""; ?>" value="<?= $data["email"]; ?>">
                            <span class="invalid-feedback"><?= $data["email_err"]; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password: <sup>*</sup></label>
                            <input type="password" name="password" class="form-control form-control-lg <?= (!empty($data["password_err"])) ? "is-invalid" : ""; ?>" value="<?= $data["password"]; ?>">
                            <span class="invalid-feedback"><?= $data["password_err"]; ?></span>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Login" class="btn btn-success btn-block">
                            </div>
                            <div class="col">
                                <a href="<?= URLROOT;?>users/register " class="btn btn-light btn-block">no account? Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <?php require APPROOT . "/views/inc/footer.php"; ?>
        ';
        $myfile = fopen("app/views/users/login.php", "w") or die("Unable to open or create Login.php file!");
        if ($myfile) {
            if (file_put_contents($newFileName, $newFileContent) !== false) {
                echo "view created at " . basename($newFileName) . "";
            }
        } else {
            echo "Cannot create view " . basename($newFileName) . "";
        }

        //controller
        $newFileName = 'app/controllers/Users.php';
        $newFileContent = '<?php
        class Users extends Controller
        {
            public function __construct()
            {
                $this->userModel = $this->model("User");
            }
        
            public function register()
            {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    //process form 
        
                    //sanitize POST data
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                    $data = [
                        "name" => trim($_POST["name"]),
                        "email" => trim($_POST["email"]),
                        "password" => trim($_POST["password"]),
                        "confirm_password" => trim($_POST["confirm_password"]),
                        "name_err" => "",
                        "email_err" => "",
                        "password_err" => "",
                        "confirm_password_err" => ""
                    ];
                    // validate name
        
                    if (empty($data["name"])) {
                        $data["name_err"] = "Please enter name";
                    }
                    //Validate Email
                    if (empty($data["email"])) {
                        $data["email_err"] = "Please enter email";
                    } else {
                        // check email
                        if ($this->userModel->findUserByEmail($data["email"])) {
                            $data["email_err"] = "email already taken";
                        }
                    }
        
                    //Validate Password
                    if (empty($data["password"])) {
                        $data["password_err"] = "Please enter password";
                    } elseif (strlen($data["password"]) < 6) {
                        $data["password_err"] = "Password must have 6 characters";
                    }
        
                    // Validate Confirm Password
        
                    if (empty($data["confirm_password"])) {
                        $data["confirm_password_err"] = "Please confirm password";
                    } else {
                        if ($data["password"] != $data["confirm_password"]) {
                            $data["confirm_password_err"] = "Passwords do not match";
                        }
                    }
        
                    //Make sure errors are empty
                    if (empty($data["email_err"]) && empty($data["name_err"]) && empty($data["password_err"]) && empty($data["confirm_password_err"])) {
                        //validated
                        // Hash Password
                        $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        
                        //Register User
                        if ($this->userModel->register($data)) {
                            //flash("register_success", "You are Registered Successfully");
                            redirect("users/login");
                        } else {
                            die("Something went wrong");
                        }
                        #..
                    } else {
                        //load view with errors
                        $this->view("users/register", $data);
                    }
                } else {
                    //Load Form
                    $data = [
                        "name" => "",
                        "email"=>"",
                        "password"=>"",
                        "confirm_password"=>"",
                        "name_err"=>"",
                        "email_err"=>"",
                        "password_err"=>"",
                        "confirm_password_err" => ""
                    ];
                    $this->view("users/register", $data);
                }
            }
        
            public function login()
            {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                    $data = [
                        "email" => trim($_POST["email"]),
                        "password" => trim($_POST["password"]),
                        "email_err" => "",
                        "password_err" => "",
                    ];
        
                    //Validate Email
                    if (empty($data["email"])) {
                        $data["email_err"] = "Please enter email";
                    }
        
                    //Validate Password
                    if (empty($data["password"])) {
                        $data["password_err"] = "Please enter password";
                    }
                    //Check for user/email
                    if ($this->userModel->findUserByEmail($data["email"])) {
                        //user found
                    } else {
                        $data["email_err"] = "no user found";
                    }
        
                    //Make sure errors are empty
                    if (empty($data["email_err"]) && empty($data["password_err"])) {
                        //validated
                        //check and set logged in user
                        $loggedInUser = $this->userModel->login($data["email"], $data["password"]);
        
                        if ($loggedInUser) {
                            //create session
                            $this->createUserSession($loggedInUser);
                        } else {
                            $data["password_err"] = "Password Incorrect";
        
                            $this->view("users/login", $data);
                        }
                        #..
                    } else {
                        //load view with errors
                        $this->view("users/login", $data);
                    }
                    #..
                } else {
                    //Load Form
                    $data = [
                        "email"=>"",
                        "password"=>"",
                        "email_err"=>"",
                        "password_err"=>"",
                    ];
                    $this->view("users/login", $data);
                }
            }
            public function  createUserSession($user)
            {
                $_SESSION["user_id"] = $user->id;
                $_SESSION["email"] = $user->email;
                $_SESSION["user_name"] = $user->name;
                redirect("posts");
            }
            public function logout()
            {
                unset($_SESSION["user_id"]);
                unset($_SESSION["user_email"]);
                unset($_SESSION["user_name"]);
                session_destroy();
                redirect("users/login");
            }
        }
        
        ';
        $myfile = fopen("app/controllers/Users.php", "w") or die("Unable to open or create Users.php file!");
        if ($myfile) {
            if (file_put_contents($newFileName, $newFileContent) !== false) {
                echo "view created at " . basename($newFileName) . "";
            }
        } else {
            echo "Cannot create view " . basename($newFileName) . "";
        }
    }
}
