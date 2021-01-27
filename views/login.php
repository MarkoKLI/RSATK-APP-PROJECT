<div class="row login-form-row">
    <div class="container col-6 login-form-container">
        <div class="card">
            <div class="card-header">
                <h5>Login to |As yet unnamed|</h5>
            </div>
            <div class="card-body">
                <form action="index.php" method="POST" 
                    class="needs-validation" novalidate>
                    <input type="hidden" name="action" value="process_login" >
                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="email">Email:</label>
                        <div class="col-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" 
                                required value="<?php echo (isset($email)) ? $email : "" ; ?>"
                                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" >
                            <div class="invalid-feedback">Please enter a valid email address</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="pwd">Password:</label>
                        <div class="col-10">
                            <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password" required >
                            <div class="invalid-feedback">Please enter a password</div>
                        </div>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember">&nbspRemember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>