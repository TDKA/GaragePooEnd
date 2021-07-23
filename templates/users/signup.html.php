<form action="index.php?controller=user&task=register" method="POST" class="col-md-4 mx-auto">

        <h1 class="h3 mb-3 fw-normal text-center">Please Sign Up:</h1>

        <div class="form-floating py-2">
            <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="usernameSignUp">
            <label for="floatingInput">Username</label>
         </div>

       
        <div class="form-floating py-2">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="passwordSignUp">
            <label for="floatingPassword">Password</label>
         </div>
       

         <div class="form-floating py-2">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="emailSignUp">
            <label for="floatingInput">Email address</label>
        </div>


        <div class="checkbox mb-3 text-center">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        

            <div class="form-group text-center ">
                <button type="submit" class="btn btn-secondary mt-1 rounded-pill p-3"> Sign up </button>
            </div>

        </form>