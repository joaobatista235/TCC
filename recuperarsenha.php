<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCA &mdash; Catálogo para o comércio agrícola</title>

    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <link rel="stylesheet" href="css/btns.css">

    <style>
        #elementos{
            position:relative;
            margin: 0 auto;
            margin-top:100px;
        }
    </style>

</head>
    <body>
        
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5" id="elementos">
                <h2 class="mb-4">Recuperar senha</h2>

                <form id="form1" name="form1" method="post" action="enviaremail.php?id=" class="p-4 border rounded">
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="text-black" for="email">Email</label>
                            <input autocomplete="off" type="text" name="email" id="email" class="form-control" placeholder="Endereço de email">
                        </div>
                    </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Enviar" class="btn px-4 btn-primary text-white">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>          
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    </body>
</html>

