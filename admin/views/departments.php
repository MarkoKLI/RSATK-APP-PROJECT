<script>
    function prepareUpdate(id) {
        var desc = $("#desc" + id).text();
        var title = $("#name" + id).text();

        $("#desc").val(desc.trim());
        $("#title").val(title.trim());
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
        <h2>Одделенија</h2>
    </div>
    <div id="accordion" class="card-body">
        <?php foreach ($_SESSION["specialties"] as $department): ?>
        <div class="card">
            <div class="card-header" id="title<?php echo $department["id"]; ?>">
                <div class="row justify-content-between">
                    <button class="btn collapsed col-lg-9 ml-2" 
                            id="name<?php echo $department["id"]; ?>"
                            data-toggle="collapse" 
                            data-target="#desc<?php echo $department["id"]; ?>" 
                            aria-expanded="false"
                            aria-controls="desc<?php echo $department["id"]; ?>">
                        <?php echo $department["title"]; ?>
                    </button>
                    <div class="row col-lg-3">
                    <button class="btn btn-outline-primary mr-3"
                            onclick="prepareUpdate(<?php echo $department['id']; ?>)">Промени</button>
                        <form action="<?php echo $location; ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $department["id"]; ?>">
                            <input type="hidden" name="action" value="delete_department">
                            <input class="btn btn-outline-danger" type="submit"
                                    value="Избриши">
                        </form>
                    </div>
                </div>
            </div>
            <div id="desc<?php echo $department["id"]; ?>"  
                aria-labelledby="title<?php echo $department["id"]; ?>"
                data-parent="#accordion" class="collapse">
                <div class="card-body">
                    <?php echo $department["description"]; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="card container-card">
    <div class="card-header">
        <h3>Креирај одделение</h3>
    </div>
    <div class="card-body">
        <form class="needs-validation" action="<?php echo $location; ?>" method="post" novalidate>
            <input type="hidden" name="action" id="action" value="create_department">
            <input type="hidden" name="id" id="id">
            <div class="form-group row">
                <label for="title" class="col-2 col-form-label text-center">Назив на оддел: </label>
                <div class="col-10">
                    <input class="form-control" id="title" name="title" required
                        placeholder="Назив">
                    <div class="invalid-feedback">
                        <?php echo (isset($invalidFeedback))? 
                                    $invalidFeedback :
                                    "Please enter a title!"; 
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="desc" class="col-2 col-form-label text-center">Опис на оддел: </label>
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
    $(document).ready(function() {
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