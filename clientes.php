<?php 
include("conexao.php");
session_start();

if( (!isset($_SESSION['usuario']) == true ) )
{
	unset ($_SESSION['login']);
	header('location:login.php');	
}

	$sessaousuario = $_SESSION ['usuario']; // Ativando esta variável + 'nome' = inicia a visualização do perfil do usuário//
?>


<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="img/favicon.png" rel="shortcut icon">
    <title>Painel </title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/css/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="assets/css/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

	<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">
			
				<a href="index.php" class="site_title"><img class="img-responsive center-margin" src="img/favicon.png"></a>
				
            </div>

            <div class="clearfix"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Início </a></li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="usuarios.php"><i class="fa fa-user"></i> Usuários </a></li>
                </ul>
                <ul class="nav side-menu">
                <li style="border-right: 5px solid #0089C4;"><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="clientes_pronafcusteio.php">Pronaf Custeio</a>
                        </li>
                        <li><a href="clientes_pronampcusteio.php">Pronamp Custeio</a>
                        </li>
                        <li><a href="clientes_pronafinvestimento.php">Pronaf Investimento</a>
                        </li>
                        <li><a href="clientes_pronampinvestimento.php">Pronamp Investimento</a>
                        </li>
                    </ul>
                  </li>                   

                </ul>
                <ul class="nav side-menu">
                  <li><a href="sair.php"><i class="fa fa-reply"></i> Sair </a></li>
                </ul>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $sessaousuario;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="sair.php"><i class="fa fa-sign-out pull-right"></i> SAIR</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_right">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h1 class="text-center">Clientes</h1>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  <a href="clientes_incluir.php" style="color: #fff"><i class="fa fa-plus-circle">
                    <p class="btn btn-dark">
                        </i>&nbsp;Adicionar cliente
					</p>
				  </a>
                    <table id="datatable-responsive" class=" table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          	<th>Código</th>
                          	<th>Nome</th>
                          	<th>Cidade</th>
                          	<th class="contoth">Estado</th>
							<th class="contoth">CEP</th>
							<th class="contoth">CPF</th>
							<th>Endereço</th>
							<th>Agência</th>
							<th>Nº da Agência</th>
							<th>Tipo</th>
							<th>Ações</th>
                        </tr>
                      </thead>
<?php
$consulta = mysql_query("SELECT * FROM clientes WHERE deletar != '1'");
while ($dados = mysql_fetch_array($consulta))
{

	?>	
                        <tr>
                        	<th><?php echo $dados['idCliente']; ?></th>
                        	<th><?php echo $dados['nome']; ?></th>
                            <td><?php echo $dados['cidade']; ?></td>
                            <td class="contod"><?php echo $dados['estado']; ?></td>
							<td class="contod"><?php echo $dados['cep']; ?></td>
							<td class="contod"><?php echo $dados['cpf']; ?></td>
							<td class="contod"><?php echo $dados['endereco']; ?></td>
							<td class="contod"><?php echo $dados['agencia']; ?></td>
							<td class="contod"><?php echo $dados['numero']; ?></td>
							<td class="contod"><?php echo $dados['tipo']; ?></td>
                            <td><a href="clientes_editar.php?id=<?php echo $dados['idCliente'];?>"><i class="fa fa-pencil-square" style="font-size: 20px"></i></a><a href="controlador.php?acao=excluir_clientes&id=<?php echo $dados['idCliente'];?>"><i class="fa fa-trash-o" style="font-size: 20px"></i></td>
                        </tr>
<?php } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/js/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="assets/js/custom.min.js"></script>
    
        <script src="assets/js/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/buttons.bootstrap.min.js"></script>
    <script src="assets/js/buttons.flash.min.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>
    <script src="assets/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/js/dataTables.keyTable.min.js"></script>
    <script src="assets/js/dataTables.responsive.min.js"></script>
    <script src="assets/js/responsive.bootstrap.js"></script>
    <script src="assets/js/datatables.scroller.min.js"></script>

    <!-- Custom Theme Scripts -->

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>

  </body>
</html>