<script>
    function prepareUpdate(id) {
        var desc = $("#desc" + id).text();
        var name = $("#name" + id).text();

        $("#desc").val(desc.trim());
        $("#name").val(name.trim());
        $("#action").val("update_diagnosis");
        $("#id").val(id);
        $("#submit").val("Промени");
    }

    function resetUpdate() {
        $("#action").val("create_diagnosis");
        $("#submit").val("Креирај");
    }
</script>

<div class="card container-card list-card">
    <div class="card-header">
        <h2>Дијагнози</h2>
    </div>
    <div id="accordion" class="card-body">
        <div class="row form-group  justify-content-center">
            <label class="col-form-label col-2" for="search-diagnoses">Пребарај дијагноза:</label>
            <div class="col-9">
                <input type="search" name="search-diagnoses" id="search-diagnoses"
                        placeholder="Search" class="form-control">
            </div>
        </div>
    <?php foreach ($_SESSION["diagnoses"] as $diagnosis): ?>
        <div class="card">
            <div class="card-header" id="title<?php echo $diagnosis["id"]; ?>">
                <div class="row justify-content-between">
                    <button class="btn collapsed col-lg-9 ml-2" 
                            id="name<?php echo $diagnosis["id"]; ?>"
                            data-toggle="collapse" 
                            data-target="#desc<?php echo $diagnosis["id"]; ?>" 
                            aria-expanded="false"
                            aria-controls="desc<?php echo $diagnosis["id"]; ?>">
                        <?php echo $diagnosis["name"]; ?>
                    </button>
                    <div class="row col-lg-3">
                        <button class="btn btn-outline-primary"
                            onclick="prepareUpdate(<?php echo $diagnosis['id']; ?>)">Промени</button>
                        <form class="ml-3" action="<?php echo $location; ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $diagnosis["id"]; ?>">
                            <input type="hidden" name="action" value="delete_diagnosis">
                            <input class="btn btn-outline-danger" type="submit" value="Избриши">
                        </form>
                    </div>
                </div>
            </div>
            <div id="desc<?php echo $diagnosis["id"]; ?>"  
                aria-labelledby="title<?php echo $diagnosis["id"]; ?>"
                data-parent="#accordion" class="collapse">
                <div class="card-body">
                    <?php echo $diagnosis["description"]; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="card container-card">
    <div class="card-header">
        <h3>Креирај дијагноза: </h3>
    </div>
    <div class="card-body">
        <form class="needs-validation" action="<?php echo $location; ?>" method="post" novalidate>
            <input type="hidden" name="action" id="action" value="create_diagnosis">
            <input type="hidden" name="id" id="id">
            <div class="form-group row">
                <label for="title" class="col-2 col-form-label text-center">Име на дијагноза: </label>
                <div class="col-10">
                    <input class="form-control" id="name" name="name" 
                        placeholder="Назив" required>
                    <div class="invalid-feedback">
                        <?php echo (isset($invalidFeedback))? 
                                    $invalidFeedback :
                                    "Please enter a name!"; ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="desc" class="col-2 col-form-label text-center">Опис на дијагноза: </label>
                <div class="col-10">
                    <textarea class="form-control" id="desc" name="desc" 
                        placeholder="Опис..." cols="30" required></textarea>
                    <div class="invalid-feedback">
                        <?php echo (isset($invalidFeedback))? 
                                    $invalidFeedback :
                                    "Please enter a description!"; 
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-3 justify-content-center">
                <input class="btn btn-outline-primary" type="submit" value="Креирај!">
                <input class="btn btn-outline-secondary ml-3" type="reset" onclick="resetUpdate()" value="Откажи">
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#search-diagnoses").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#accordion .card-header").filter(function() {
                    $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
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
    });
</script>
