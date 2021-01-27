<div class="row login-form-row">
    <div class="container col-5 login-form-container">
        <div class="card">
            <div class="card-header">
                <h5 class="mt-2">Login to |As yet unnamed|</h5>
            </div>
            <div class="card-body">
                <form action="index.php" method="POST" 
                    class="needs-validation" novalidate>
                    <input type="hidden" name="action" value="process_login" >
                    <div class="form-group row">
                        <label class="col-3 col-form-label" for="email">Email:</label>
                        <div class="col-9">
                            <input type="email" name="email" id="email" placeholder="Enter email" 
                                class="form-control <?php echo ($requestFailed || $invalidCredentials) ? "is-invalid" : ""; ?>" 
                                required value="<?php echo (isset($email)) ? $email : "" ; ?>"
                                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" >
                            <div class="invalid-feedback">
                                <?php 
                                    if ($requestFailed && !$invalidCredentials) {
                                        echo "Something went wrong. Please try again!";
                                    } else if (!$requestFailed && $invalidCredentials) {
                                        echo "";
                                    } else {
                                        echo "Please enter a valid email address!";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label" for="pwd">Password:</label>
                        <div class="col-9">
                            <input type="password" name="pwd" id="pwd" placeholder="Enter password" required
                            class="form-control <?php echo ($requestFailed || $invalidCredentials) ? "is-invalid" : ""; ?>" >
                            <div class="invalid-feedback">
                                <?php 
                                    if ($requestFailed && !$invalidCredentials) {
                                        echo "";
                                    } else if (!$requestFailed && $invalidCredentials) {
                                        echo "Wrong username or password. Please try again!";
                                    } else {
                                        echo "Please enter a password!";
                                    }
                                ?>
                            </div>
                        </div>
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