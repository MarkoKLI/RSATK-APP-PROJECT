<div class="card container-card">
    <div class="card-header">
        <h2>Одделенија</h2>
    </div>
    <div id="accordion" class="card-body">
        <div class="card">
            <div class="card-header" id="title1">
                <div class="row justify-content-between">
                    <button class="btn col-lg-9 ml-2" data-toggle="collapse" data-target="#desc1" 
                            aria-expanded="true" aria-controls="desc1">
                    Кардиологија
                    </button>
                    <div class="row col-lg-3">
                        <form action="<?php echo $location; ?>" method="post" class="mr-4">
                            <input type="hidden" name="action" value="edit_department">
                            <input class="btn btn-outline-primary" type="submit"
                                    value="Промени">
                        </form>
                        <form action="<?php echo $location; ?>" method="post">
                            <input type="hidden" name="action" value="delete_department">
                            <input class="btn btn-outline-danger" type="submit"
                                    value="Избриши">
                        </form>
                </div>
                </div>
            </div>
            <div id="desc1" class="collapse show" aria-labelledby="title1" 
                data-parent="#accordion">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="title2">
                <div class="row justify-content-between">
                    <button class="btn collapsed col-lg-9 ml-2" data-toggle="collapse" data-target="#desc2" aria-expanded="false" aria-controls="desc2">
                    Онкологија
                    </button>
                    <div class="row col-lg-3">
                        <form action="<?php echo $location; ?>" method="post" class="mr-4">
                            <input type="hidden" name="action" value="edit_department">
                            <input class="btn btn-outline-primary" type="submit"
                                    value="Промени">
                        </form>
                        <form action="<?php echo $location; ?>" method="post">
                            <input type="hidden" name="action" value="delete_department">
                            <input class="btn btn-outline-danger" type="submit"
                                    value="Избриши">
                        </form>
                    </div>
                </div>
            </div>
            <div id="desc2" class="collapse" aria-labelledby="title2" data-parent="#accordion">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="title3">
                <div class="row justify-content-between">
                    <button class="btn collapsed col-lg-9 ml-2" data-toggle="collapse" data-target="#desc3" aria-expanded="false" aria-controls="desc3">
                    Нефрологија
                    </button>
                    <div class="row col-lg-3">
                        <form action="<?php echo $location; ?>" method="post" class="mr-4">
                            <input type="hidden" name="action" value="edit_department">
                            <input class="btn btn-outline-primary" type="submit"
                                    value="Промени">
                        </form>
                        <form action="<?php echo $location; ?>" method="post">
                            <input type="hidden" name="action" value="delete_department">
                            <input class="btn btn-outline-danger" type="submit"
                                    value="Избриши">
                        </form>
                </div>
                </div>
            </div>
            <div id="desc3" class="collapse" aria-labelledby="title3" data-parent="#accordion">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card container-card">
    <div class="card-header">
        <h3>Креирај одделение</h3>
    </div>
    <div class="card-body">
        <form class="needs-validation" action="<?php echo $location; ?>" method="post" novalidate>
            <input type="hidden" name="action" value="create_department">
            <div class="form-group row">
                <label for="title" class="col-2 col-form-label text-center">Назив на оддел: </label>
                <div class="col-10">
                    <input class="form-control" id="title" name="title" 
                        placeholder="Назив" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="desc" class="col-2 col-form-label text-center">Опис на оддел: </label>
                <div class="col-10">
                    <textarea class="form-control" id="desc" name="desc" 
                        placeholder="Опис..." cols="30" required></textarea>
                </div>
            </div>
            <div class="col-2 justify-content-center">
                <input class="btn btn-outline-primary" type="submit" value="Креирај!">
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