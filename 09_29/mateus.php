<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Salve, world!</title>
  </head>
  <body>
    
    <?php 
        require_once('structure/menu.php');
        menu();
    ?>
  
      <div class="card text-center">
        <div class="card-header">
         Dando inicio ao site
        </div>
        <div class="card-body">
          <h5 class="card-title">Aula WEB I</h5>
          <p class="card-text">Mateus França, 19 anos. Cursando na UNIDAVI</p>
        </div>
        <div class="card-footer text-muted">
        </div>
      </div>
      
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Desenvolvimento WEB</h5>
            <small>Atualizado hoje</small>
          </div>
          <p class="mb-1">Fuçando no bootstrap</p>
          <small>texto_aleatorio.txt</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Noticias</h5>
            <small class="text-muted">3 dias atrás</small>
          </div>
          <p class="mb-1">A Apple tem um terceiro fundador: Ronald Wayne. Ele vendeu os 10% que eram seus, em 1976, pela bagatela de US$ 800.</p>
          <small class="text-muted"></small>
        </a>
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Noticias</h5>
            <small class="text-muted">3 dias atrás</small>
          </div>
          <p class="mb-1">Apenas uma loja do McDonald’s no mundo não tem o logotipo da marca em amarelo. Em Sedona, no Arizona, o símbolo da rede é na cor turquesa.</p>
          <small class="text-muted"></small>
        </a>
      </div>
      <br>
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Página em desenvolvimento - 25%</div>
      </div>      
    <br>    
    <br>   
      <nav aria-label="Navegação de página exemplo">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
        </ul>
      </nav>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
