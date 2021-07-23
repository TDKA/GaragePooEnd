<?php

namespace Model;



class User extends Model {


protected $table = "users";


public $id;
public $username;
public $password;
public $email;

/**
 * 
 * find USER by username
 * @param string $username
 * 
 * User $user (za da go napravya na object)
 */
public function findByUserName($username) {


    $req = $this-> pdo->prepare("SELECT * FROM users WHERE username = :username");

    $req->execute(['username' => $username]);

    $user = $req->fetchObject(\Model\User::class );

    return $user;


}

/**
 * Check if the username exist and if the password is OK then add THIS USER to the session
 * @param string $username
 * @param string $password
 * 
 *  User $user (za da go napravya na object)
 */
public function signIn($username, $password) {

  $user = $this->findByUserName($username);

  if(!$user) {
      die("Sorry, this user don't exist");
  }

  if($password == $user->password) {


    // Compare date with this to the user
    $_SESSION["user"] = [
        "id" => $user->id,
        "username" => $user->username,
        "email" => $user->email
    ];

    return true;

  }
  else {

      return false;
      
  }


}

/**
 * 
 * check if i'm loggedIn or no 
 * return true or false
 */
 public function isLoggedIn() {
     if(isset($_SESSION['user']) && !empty($_SESSION['user']['id']) ) {

        return true;
     }
     else {
         return false;
     }
 }


 /**
  * 
  *
  */
public function getUser() {

    if($this->isLoggedIn()) {

        // check if there is user in the session
        $user = $this->find($_SESSION['user']['id'], \Model\User::class);

        return $user;
    }
    else {
        return false;
    }

}


  /**
   * 
   * Close the session and logout user
   * 
   */
  public function signOut() {
  
      session_unset();
  
      \Http::redirect('index.php?controller=user&task=login');
  
  }


/**
 * 
 * user SignUP 
 * @param object $user
 * 
 */
public function signUp(User $user) {

 // public function signUp(string $username, string $password, string $email) {

    $req = $this->pdo->prepare("INSERT INTO users(username, password, email) VALUES(:username, :password, :email)" );

    $req->execute([

        "username" => $user->username,
        "password" => $user->password,
        "email" => $user->email

    ]);

   $userFree= $req->rowCount();

   if($userFree == 1) {

       return $userFree;

   }else {

       die("User exist already");
      
   }

}

/**
 * 
 * this method let me use "private $password" outsite of this class
 * @param $password
 * 
 */
public function setPassword($password) {

    $this->password = $password;

}

/**
 * Check if the id of the user is the same like the user_id of the Cake or Receipt
 * 
 * @param object $gateauOrRecette
 * 
 * return TRUE if the id's match
 * return FALSE if the id's DON'T MATCH
 */
public function isAuthor(object $gateauOrRecette) {

    if($this->id == $gateauOrRecette->user_id) {
        return true;
    }
    else {
        return false;
    }

}


/**
 * 
 * 
 * 
 * 
 */
public function hasMade(object $gateauOrRecette) {

    $make = new \Model\Make();

  if($make->findByUser($gateauOrRecette, $this) ) {

      return true;
      
  }
  else {
      return false;
  }

}

}
