<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginmodalLabel">Log in to your account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forum/partials/handleli.php" method="post">
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="loginemail" class="form-label" >Username</label>
                        <input type="text" class="form-control" id="loginemail" name="loginemail"  aria-describedby="emailHelp" required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="lgpassword" class="form-label" >Password</label>
                        <input type="password" class="form-control" id="lgpassword" name="lgpassword"  required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary my-2 mx-2">Submit</button>
            </form>
                <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>