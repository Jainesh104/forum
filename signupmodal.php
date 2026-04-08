<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupmodalLabel">Sign up to create account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/forum/partials/handlesu.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="signupemail" aria-describedby="emailHelp" name="signupemail" required>
                            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div> 
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" >Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label" >Confirm Password</label>
                            <input type="cpassword" class="form-control" id="cpassword" name="cpassword" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">Agree to Privacy policy</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-2" >Signup</button>
                </form>
            </div>

        </div>
    </div>
</div>