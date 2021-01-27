<div class="card container-card">
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
        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Име и презиме</th>
                        <th>Тип на корисник</th>
                        <th>Избриши</th>
                    </tr>
                </thead>
                <tbody id="table-users">
                    <tr>
                        <td>1</td>
                        <td>Thirteen</td>
                        <td>Doctor</td>
                        <td>
                            <form action="<?php echo $location; ?>" method="post">
                                <input type="hidden" name="action" value="delete_user">
                                <input type="hidden" name="userId" value="1">
                                <input class="btn btn-outline-danger btn-sm" type="submit" value="Бриши!">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Lisa Cuddy</td>
                        <td>Patient</td>
                        <td><form action="<?php echo $location; ?>" method="post">
                                <input type="hidden" name="action" value="delete_user">
                                <input type="hidden" name="userId" value="1">
                                <input class="btn btn-outline-danger btn-sm" type="submit" value="Бриши!">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Gregory House</td>
                        <td>Doctor</td>
                        <td>
                            <form action="<?php echo $location; ?>" method="post">
                                <input type="hidden" name="action" value="delete_user">
                                <input type="hidden" name="userId" value="1">
                                <input class="btn btn-outline-danger btn-sm" type="submit" value="Бриши!">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-between">
        <div class="card container-card create-user-card">
            <div class="card-header">
                <h3>Креирај корисник:</h3>
            </div>
            <div class="card-body">
                <form action="index.php" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="action" value="create_user">
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Име: </label>
                        <div class="col-8">
                            <input class="form-control" id="name" name="name" 
                            placeholder="Име" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="surname" class="col-4 col-form-label">Презиме: </label>
                        <div class="col-8">
                            <input class="form-control" id="surname" name="surname" 
                            placeholder="Презиме" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="embr" class="col-4 col-form-label">ЕМБР: </label>
                        <div class="col-8">
                            <input class="form-control" id="embr" name="embr" 
                            placeholder="ЕМБР" required pattern="[0-9]{13}$">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-4 col-form-label">Адреса: </label>
                        <div class="col-8">
                            <input class="form-control" id="address" name="address"
                            placeholder="Адреса" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">Email: </label>
                        <div class="col-8">
                            <input class="form-control" type="email" id="email" name="email" 
                            placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phoneNr" class="col-4 col-form-label">Телефонски број: </label>
                        <div class="col-8">
                            <input type="tel" class="form-control" id="phoneNr" name="phoneNr"
                            pattern="[0-9]{0,14}$" placeholder="Telephone number" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-4 col-form-label">Датум на раѓање: </label>
                        <div class="col-8">
                            <input class="form-control" type="date" id="dob" name="dob" required>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="custom-control custom-switch col-8">
                            <input type="checkbox" class="custom-control-input" id="isDoctor" name="isDoctor" value="true">
                            <label class="custom-control-label" for="isDoctor">Докторски профил</label>
                        </div>
                    </div>
                    <div id="specialtyDiv" class="form-group row">
                        <label for="dob" class="col-4 col-form-label">Одделение: </label>
                        <div class="col-8">
                            <select class="form-control" name="specialty" id="specialty">
                                <option selected disabled></option>
                                <option value="1">sad</option>
                                <option value="2">bad</option>
                                <option value="3">mad</option>
                                <option value="4">rad</option>
                            </select>
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Креирај">
                </form>
            </div>
        </div>
        <div class="card container-card create-admin-card">
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
                <hr>
                <div class="admin-table-container mt-2">
                    <table class="table">
                        <caption>Постоечки профили</caption>
                        <thead>
                            <th>Корисничко име</th>
                            <th>Избриши</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Admin</td>
                                <td>
                                    <form action="<?php echo $location; ?>" method="post">
                                        <input type="hidden" name="action" value="delete_admin">
                                        <input type="hidden" name="userId" value="1">
                                        <input class="btn btn-outline-danger btn-sm" type="submit" value="Бриши!">
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Admin</td>
                                <td>
                                    <form action="<?php echo $location; ?>" method="post">
                                        <input type="hidden" name="action" value="delete_admin">
                                        <input type="hidden" name="userId" value="1">
                                        <input class="btn btn-outline-danger btn-sm" type="submit" value="Бриши!">
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Admin</td>
                                <td>
                                    <form action="<?php echo $location; ?>" method="post">
                                        <input type="hidden" name="action" value="delete_admin">
                                        <input type="hidden" name="userId" value="1">
                                        <input class="btn btn-outline-danger btn-sm" type="submit" value="Бриши!">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#search-users").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table-users tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

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

        $("#specialtyDiv").hide();
        $("#isDoctor").click(function() {
            if ($("#isDoctor").is(":checked") ) {
                $("#specialtyDiv").show();
                $("#specialty").attr("required",true);
            } else {
                $("#specialtyDiv").hide();
                $("#specialty").attr("required",false);
            }
        })
    });
</script>