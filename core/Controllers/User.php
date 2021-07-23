<?php

namespace Controllers;


class User extends Controller
{


    protected $modelName = \Model\User::class;


    /**
     * 
     * 
     * 
     */
    // public function login()
    // {

    //     if (!empty($_POST['username']) && !empty($_POST['password'])) {

    //         $newUser = new \Model\User();

    //         $setPassword = htmlspecialchars($_POST['password']);

    //         $newUser->username = htmlspecialchars($_POST['username']);

    //         $newUser->setPassword($setPassword);

    //         if ($this->model->signIn($newUser, $setPassword)) {

    //             \Http::redirect('index.php');
    //         } else {
    //             die("Sorry problem");
    //         }
    //     } else {

    //         $modelUser = new \Model\User();
    //         $user = $modelUser->getUser();

    //         $titlePage = "Login";

    //         \Rendering::render('users/login', compact('user', 'titlePage'));
    //     }
    // }
    /**
     * 
     * 
     */
    public function login()
    {



        if (!empty($_POST['username']) && !empty($_POST['password'])) {

            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);



            if ($this->model->signIn($username, $password)) {


                \Http::redirect('index.php');
            } else {
                die("not logged in");
            }
        } else {
            $userModel = new \Model\User();

            $user = $userModel->getUser();

            $titreDeLaPage = "Connexion";
            \Rendering::render('users/login', compact('user', 'titreDeLaPage'));
        }
    }

    /**
     * 
     * 
     * 
     */
    public function loginApi()
    {



        if (!empty($_POST['username']) && !empty($_POST['password'])) {


            $username = htmlspecialchars($_POST['username']);

            $password = htmlspecialchars($_POST['password']);



            if ($this->model->signIn('titi', 'titi')) {

                $user = $this->model->getUser();

                header('Access-Control-Allow-Origin: *');

                echo json_encode($user);
            } else {
                die("Sorry problem");
            }
        } else {

            $message = "Please fill all the empty fields !";

            header('Access-Control-Allow-Origin: *');

            echo json_encode($message);
        }
    }


    /**
     * 
     * Deconnect user and redirect
     * 
     */
    public function logOut()
    {


        $this->model->signOut();

        \Https::redirect('index.php');
    }
    /**
     * 
     * Deconnect user and redirect
     * 
     */
    public function logOutApi()
    {


        $this->model->signOut();
    }

    /**
     * 
     * User SIGNUP
     * 
     */
    public function register()
    {


        if (!empty($_POST['usernameSignUp']) && !empty($_POST['passwordSignUp']) && !empty($_POST['emailSignUp'])) {

            $newUser = new \Model\User();


            $newUser->username = htmlspecialchars($_POST['usernameSignUp']);

            $setPassword = htmlspecialchars($_POST['passwordSignUp']);
            $newUser->setPassword($setPassword);

            $newUser->email = htmlspecialchars($_POST['emailSignUp']);


            if ($this->model->signUp($newUser)) {

                \Http::redirect('index.php?controller=user&task=login');
            } else {
                echo "Problem";
            }
        } else {

            $modelUser = new \Model\User();
            $user = $modelUser->getUser();

            $titlePage = "Sign Up";

            \Rendering::render('users/signup', compact('user', 'titlePage'));
        }
    }
}
