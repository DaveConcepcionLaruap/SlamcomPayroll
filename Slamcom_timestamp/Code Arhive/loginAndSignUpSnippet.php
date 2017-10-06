<div class="form-div">
    <div class="signIn-div" id="DivLogin">
        <h2 class="section-heading">Login</h2>
        <hr class="light">
        <form action="LoginBackground.php" method="post" id="login_Form">
            <div class="form-group">
                <input class="form-control" id="LoginEmail" placeholder="email address" name="txt_loginEmail" type="email" autofocus required>
            </div>
            <div class="form-group">
                <input class="form-control" id="LoginPassword" placeholder="password" name="txt_loginPassword" type="password" required>

            </div>
            <div class="form-group">
                <input id="btnLogin" type="submit" class="btn btn-primary btn-xl page-scroll" value="Login">
            </div>
        </form>
        <div class="form-group" id="divLoginError" style="display: none;">
            <p id="LoginErrorAlert" aria-atomic="true" role="alert">
                The email or password you entered does not belong to an account
                please check your input.
            </p>
        </div>
        <div class="form-group" id="divFillFields" style="display: none;">
            <p id="FillFields" aria-atomic="true" role="alert">
                Please fill out required fields.
            </p>
        </div>
        <div class="form-group">
            <a  id="LoginNoAccount" href="#" >Don't have an account? </a>
            <a href="#">||</a>
            <a id="forgotPassword" href="forgotpassword.html"> Forgot?</a>
        </div>
    </div>

    <div class="signIn-div" id="DivSignUp" style="display:none;">
        <h2 class="section-heading">Don't have an account? Sign up</h2>
        <hr class="light">

        <form action="signUpBackground.php" method="post" id="signUp_Form">
            <div class="form-group">
                <input class="form-control" id="signUpFirstName" placeholder="first name" name="txt_firstname" type="text" autofocus required>
            </div>
            <div class="form-group">
                <input class="form-control" id="signUpLastName" placeholder="last name" name="txt_lastname" type="text" required>
            </div>
            <div class="form-group">
                <input class="form-control" id="signUpEmail" placeholder="email address" name="txt_signUpEmail" type="email" required>
            </div>
            <div class="form-group" id="signUpPasswordPadding">

                <input class="form-control" id="signUpPassword" placeholder="password" name="txt_signUpPassword" type="password" required>
            </div>
            <div class="form-group">
                <input class="form-control" id="signUpConfPassword" placeholder="confirm password" name="txt_userconfpassword" type="password" required>
            </div>
            <div class="form-group">
                <input id="btnSignup" type="submit" class="btn btn-primary btn-xl page-scroll" value="Sign Up">
            </div>
        </form>
        <div class="divErrorSignUp" id="divFillFieldsSignUp" style="display: none;">
            <p id="FillFieldsSignUp" aria-atomic="true" role="alert">
                Please fill out required fields.
            </p>
        </div>
        <div class="divErrorSignUp" id="divErrorConfPassword" style="display:none;">
            <p id="PasswordConfErrorSignUp" aria-atomic="true" role="alert">
                Please make sure password confirmation is true.
            </p>
        </div>
        <div class="divErrorSignUp" id="divPasswordLength" style="display:none;">
            <p id="PasswordLength" aria-atomic="true" role="alert">

                Please make sure password is inbetween 6-20 characters with atleast 1 number.

            </p>
        </div>
        <div class="divErrorSignUp" id="divEmailalreadyexist" style="display:none;">
            <p id="PasswordLength" aria-atomic="true" role="alert">

                The email you entered already exists.

            </p>
        </div>
        <div class="form-group">
            <a id="signUpHasAcc" href="#">Already have an account?</a>
        </div>
    </div>
</div>
