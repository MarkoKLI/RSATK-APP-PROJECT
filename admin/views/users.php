<div class="card">
    <div class="card-header">
        <h2>Корисници</h2>
    </div>
    <div class="card-body">
        <div class="row form-group">
            <label class="col-form-label col-2" for="search-users">Пребарај корисник:</label>
            <div class="col-10">
                <input type="search" name="search-users" id="search-users"
                        placeholder="Search" class="form-control">
            </div>
        </div>
        <table id="user-table" class="table table-hover">
            <tr>
                <th>id</th>
                <th>Име и презиме</th>
                <th>Тип на корисник</th>
                <th>Избриши</th>
            </tr>
            <tr>
                <th>1</th>
                <th>John Doe</th>
                <th>Doctor</th>
                <th>x</th>
            </tr>
            <tr>
                <th>2</th>
                <th>John Doe</th>
                <th>Doctor</th>
                <th>x</th>
            </tr>
            <tr>
                <th>3</th>
                <th>John Doe</th>
                <th>Doctor</th>
                <th>x</th>
            </tr>
        </table>
    </div>
</div>

<div class="container">
    <div class="row justify-content-between">
        <div class="card create-user-card">
            <div class="card-header">
                <h3>Креирај корисник:</h3>
            </div>
            <div class="card-body">
                <form action="index.php" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="action" value="create-user">
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Име: </label>
                        <div class="col-8">
                            <input class="form-control" id="name" placeholder="Име">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="surname" class="col-4 col-form-label">Презиме: </label>
                        <div class="col-8">
                            <input class="form-control" id="surname" placeholder="Презиме">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="embr" class="col-4 col-form-label">ЕМБР: </label>
                        <div class="col-8">
                            <input class="form-control" id="embr" placeholder="ЕМБР">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">Email: </label>
                        <div class="col-8">
                            <input class="form-control" type="email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phoneNr" class="col-4 col-form-label">Телефонски број: </label>
                        <div class="col-8">
                            <input type="tel" class="form-control" id="phoneNr" 
                            pattern="[0-9]{0,14}$" placeholder="Telephone number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-4 col-form-label">Датум на раѓање: </label>
                        <div class="col-8">
                            <input class="form-control" type="date" id="dob">
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Креирај">
                </form>
            </div>
        </div>
        <div class="card create-user-card">
            <div class="card-header">
                <h3>Креирај администратор: </h3>
            </div>
            <div class="card-body">
                <form action="index.php" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="action" value="create-admin">
                    <div class="form-group row">
                        <label for="username" class="col-4 col-form-label">Корисничко име: </label>
                        <div class="col-8">
                            <input class="form-control" id="username" placeholder="Корисничко име:">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="surname" class="col-4 col-form-label">Лозинка: </label>
                        <div class="col-8">
                            <input type="password" class="form-control" id="pwd" placeholder="Лозинка">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pwd-conf" class="col-4 col-form-label">Потврди лозинка: </label>
                        <div class="col-8">
                            <input type="password" class="form-control" id="pwd-conf" placeholder="Лозинка">
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Креирај">
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