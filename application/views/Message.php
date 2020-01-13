<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<script type="text/javascript">
		function TableActions (value, row, index) {
			return '<a href="/message/delete/'+value+'" class="btn btn-labeled btn-danger" role="button"><span class="btn-label"> <i class="glyphicon glyphicon-remove"></i> </span>Delete</a>';
		}
		function TableDate (value, row, index) {
			return moment().format('DD-MM-YYYY');
		}
		</script>
		<meta charset="utf-8">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="<?php echo base_url('includes/bootstrap/css/bootstrap.min.css') ?>">

		<!-- Latest compiled and minified JavaScript -->
		<script src="<?php echo base_url('includes/bootstrap/js/bootstrap.min.js') ?>"></script>
		<link rel="stylesheet" href="<?php echo base_url('includes/bootstrap/css/style.css') ?>">
		<title></title>
	</head>
	<body class="register">
		<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<p class="navbar-btn">
							<a class=" btn btn-primary btn-lg"  role="button" href="/message">Início</a>			  
					</p>
					</div>			
					<ul class="nav navbar-nav navbar-right">
						<li>
						<p class="navbar-btn">
							<a href="/logout" class="btn btn-primary btn-lg" role="button">Sair</a>
						</p>
						</li>
					</ul>					
				</div> <!-- /.container-fluid -->
		</nav>
		<?php
			if(isset($error_message)) {
				echo "<div class='alert alert-danger' role='alert'>". $error_message ."</div>";
			}

			if(isset($message_display)) {
				echo "<div class='alert alert-success' role='alert'>". $message_display ."</div>";
			}
		?>
				<!-- Button trigger modal -->
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
				Nova mensagem
				</button>

		<div class="container  ">
			<table id="table"
				data-toggle="table"
				data-filter-control="true"
				data-click-to-select="true"
				data-toolbar="#toolbar"
				class="table-responsive table_backgraund_color"
			>
				<thead>
					<tr>
						<th>Número da mensagem	</th>
						<th data-field="prenom" data-filter-control="input" data-sortable="true">Mensagem</th>
						<th data-field="date" data-formatter="TableDate" data-filter-control="select" data-sortable="true">Data</th>
						<th data-field="examen" data-formatter="TableActions">Ações</th>
					</tr>
				</thead>
					<tbody>
						<?php
						if (isset($messages)) {
							foreach ($messages as $key => $message) {
								echo "<tr>
										<td>".$message["id"]."</td>
										<td>".$message["text_message"] ."</td> 
										<td>". $message["created_at"] ."</td>
										<td>". $message["id"] ."</td>
								</tr>";
							}
						}

						?>
					</tbody>
				</table>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Nova mensagem</h4>
						</div>
						<div class="modal-body">
							<?php
								echo form_open('message/create');
								$data = array(
									'rows'  => '5',
									'name' => 'text_message',
									'class'=> 'form-control'
								);
								echo form_textArea($data);
							?>
						</div>
					
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
							<?php
								echo form_submit('submit', 'Salvar nova mensagem', "class='btn btn-primary'");
								echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>