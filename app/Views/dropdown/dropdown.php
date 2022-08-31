<!doctype html>
<html lang="en">
    <head>
        <title>Dropdown usando JQuery AJAX</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS v5.2.0-beta1 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <h3>CodeIgniter 4 Dropdown dinamico usando jQuery Ajax</h3>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    CodeIgniter 4 Dropdown dinamico usando jQuery Ajax
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="paises">País:</label>
                        <select name="pais" id="pais" class="form-select">
                            <option value="" selected disabled>Seleccionar País</option>
                            <?php foreach($paises as $key => $pais) {?>
                                <option value="<?= $pais['id'] ?>"> <?= $pais['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <select name="estado" id="estado" class="form-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad:</label>
                        <select name="ciudad" id="ciudad" class="form-select"></select>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            // Cuando cambia el dropdown de paises
            $('#pais').change(function() {
                var paisId = $(this).val();
                if(paisId) {
                    $.ajax({
                        type: "GET",
                        url: "<?= base_url('public/dropdown/getEstados') ?>",
                        data:{
                            pais_id: paisId
                        },
                        success: function(res) {
                            var data = JSON.parse(res);
                            if(res) {
                                $("#estado").empty();
                                $("#estado").append('<option>Seleccionar Estado</option>');
                                $.each(data, function(key, value) {
                                    $("#estado").append('<option value="' + value.id + '">' + value.nombre + '</option>');
                                });
                            } else {
                                $("#estado").empty();
                            }
                        }
                    });
                } else {
                    $("#estado").empty();
                    $("#ciudad").empty();
                }
            });

            // Cuando cambia el dropdown de estados
            $('#estado').change(function() {
                var estadoId = $(this).val();
                if(estadoId) {
                    $.ajax({
                        type: "GET",
                        url: "<?= base_url('public/dropdown/getCiudades') ?>",
                        data:{
                            estado_id: estadoId
                        },
                        success: function(res) {
                            var data = JSON.parse(res);
                            if(res) {
                                $("#ciudad").empty();
                                $("#ciudad").append('<option>Seleccionar Ciudad</option>');
                                $.each(data, function(key, value) {
                                    $("#ciudad").append('<option value="' + value.id + '">' + value.nombre + '</option>');
                                });
                            } else {
                                $("#ciudad").empty();
                            }
                        }
                    });
                } else {
                    $("#ciudad").empty();
                }
            });
        </script>
    </body>
</html>