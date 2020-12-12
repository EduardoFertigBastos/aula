
<div class="row">

    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

        <div class="card card-signin my-5 bg-primary">

            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <?php
                    if ($_SESSION['erroLogin']) {
                        echo '<p> Falha na autenticação. Tente novamente. </p>';
                        $_SESSION['erroLogin'] = false;
                    }
                ?>

        
                <form method="post" action="">
                    
                    <div class="form-row">
                        <div class="form-group col-sm-8 col-md-10 col-lg-8">
                            <label for="email"> E-mail </label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="E-mail...">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-8 col-md-10 col-lg-8">
                            <label for="senha"> Senha </label>
                            <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha...">
                        </div>
                    </div>

                    <input type="submit" value="Entrar" name="entrar" class="btn btn-light col-sm-8 col-md-10 col-lg-8 py-2">
                    
                </form>

            </div>

        </div>

    </div>

</div>