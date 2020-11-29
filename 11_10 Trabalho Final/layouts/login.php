<div class="container">
    <div class="row">

        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

            <div class="mt-5 bg-primary py-3 px-4">
               
                    <h5 class="text-center">Login</h5>
                    <hr class="bg-light">
                    
                    <?php
                        if ($_SESSION['erroLogin']) {
                            echo '<p> Falha na autenticação. Tente novamente. </p>';
                            $_SESSION['erroLogin'] = false;
                        }
                    ?>

            
                    <form method="post" action="">
                        <div class="form-row">
                            <div class="form-group col-sm-8 col-md-10 col-lg-8 mx-auto">
                                <label for="email"> E-mail </label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="E-mail...">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-8 col-md-10 col-lg-8 mx-auto">
                                <label for="senha"> Senha </label>
                                <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha...">
                            </div>
                        </div>
                        <input type="submit" value="Entrar" name="entrar" class="btn btn-light col-12 py-2">
                        
                    </form>

                    <hr class="bg-light">                

            </div>

        </div>

    </div>
    
</div>