<div class="container col-6 login-view">
    <h2>Administrator login</h2>
    <form action="index.php" method="POST" 
        class="needs-validation" novalidate>
        <input type="hidden" name="action" value="process_login" >
        <div class="form-group">
            <label for="email">Username:</label>
            <input class="form-control" name="username" id="username" placeholder="Enter username" 
                required value="<?php echo (isset($username)) ? $username : "" ; ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password" required >
            <div class="invalid-feedback">Please enter a password</div>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="remember">&nbspRemember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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