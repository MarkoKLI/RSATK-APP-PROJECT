<div class="container col-md-5">
    <h2>Login to |As yet unnamed|</h2>
    <form action="?action=process_login" method="POST" 
        class="needs-validation" novalidate>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" 
                required value="<?php echo (isset($username)) ? $username : "" ; ?>"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
            <div class="invalid-feedback">Please enter a valid email address</div>
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