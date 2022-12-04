<?php
include "V_verifica-login.php"
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="shortcut icon" href="../imagens/logo_tittle.png">
  <link rel="stylesheet" type="text/css" href="../CSS_Hiago/cssHiago2.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha3844-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>


<body>

<header><!-- inicio Cabecalho -->
      <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #a3bbd9;">
        <div class="container">
           
          <a href="#" class="navbar-brand">
            <img src="../imagens/hospital_logo__2_-removebg-preview (1).png" height="85px">
          </a>

          <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="nav-principal">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="P_indexadm.php" class="nav-link text-light">Inicio</a>
              </li>
              <li class="nav-item">
                <a href="P_internações-uti_leitosmed.php" class="nav-link text-light">UTI/Leitos</a>
              </li>
              <li class="nav-item">
                <a href="P_cadastro_Medico.php" class="nav-link text-light">Cadastro Medico</a>
              </li>
              <li class="nav-item">
                <a href="P_listagem-medico.php" class="nav-link text-light">Medicos</a>
              </li>
              <li class="nav-item">
              <a href="P_perfil-usuarioadm.php" class="nav-link text-light">Meu perfil</a>
              </li>
              <li class="nav-item">
                <a href="V_logout.php" class="btn btn-outline-light ml-4">Sair</a>
              </li>
          </div>
       
        </div>
      </nav>
    </header><!--/fim Cabecalho -->
    <section class="meio">
<div class="container" style="min-height: 100%;">
        <div class="row my-3">
            <div class="col-lg-5 col-xl-4 card-profile">
                <div class="card shadow-sm">
                    <div class="card-body" id="card-user">
                        <div class="d-flex justify-content-center">
                            <div class="img-habbo2" id="img-avatar">
                                <img src="../imagens/foto_perfil.png">
                               
                            </div>
                        </div>    
                        <div class="tab-content mt-4">

                            <div role="tabpanel" class="tab-pane active tab-formatacao" id="page1">

                               

                        <hr>
                                                <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Funções</th>
                                <th scope="col">   </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <p><strong>Senha:</strong>
                                       <a href="P_alterar-senha-usuarios.php"><span class="badge badge-danger">Alterar</span></a>
                                                             </p>
                                </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
</div>
<div class="col-lg-7 col-xl-8" style="min-width: 390px;">
        <div class="card card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="pills-timeline-tab"data-toggle="pill" href="#pills-timeline" role="tab" aria-controls="pills-timeline" aria-selected="true" >Informações</a>
                </li>


                
            </ul>
            <div class="tab-content" id="pills-tabContent">
               
         <!--SE FOR RECEPCIONISTA-->
         <div class="row">
                                    <div class="col-6">
                                        <div class="mb-1"><p><strong>Nome: </strong> <?php echo $_SESSION['nome']; ?></p></div>
                                    </div>

                                    <div class="col-6">
                                        <span></span>
                                    </div>
                                </div>

                                

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-1"><p><strong>Cargo:</strong> <?php echo $_SESSION['nome_funcao']; ?></p></div>
                                    </div>

                                    <div class="col-6">
                                        <span></span>
                                    </div>
                                </div>
                                

                               

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-1"><p><strong>CPF: </strong> <?php echo $_SESSION['cpf']; ?></p></div> 
                               
                                    </div>

                                    
                                    <div class="col-6">
                                        <span></span>
                                    </div>
                                </div> 
                                    

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-1"><p><strong>Data de Nascimento:</strong> <?php echo $_SESSION['Nascimento']; ?></p></div>
                                    </div>

                                    <div class="col-6">
                                        <span></span>
                                    </div>
                                </div>
        
    </div>
</section>     
     

</body>
</html>