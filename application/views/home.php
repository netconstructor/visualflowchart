<?php
	$prefix = $this->config->item('URI_Prefix');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Process Designer</title>

    <!-- Bootstrap -->
    <link href="/<?php echo $prefix; ?>/assets/css/bootstrap.css" rel="stylesheet">
	<!--<link href="/<?php echo $prefix; ?>/assets/css/bootstrap-theme.css" rel="stylesheet">-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link href="/<?php echo $prefix; ?>/assets/css/style.css" rel="stylesheet">
  </head>
  <body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"  style="display:inline;">Process designer</h3>
						<div class="dropdown pull-right" style="display:inline-block;">
							<button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Dropdown <span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
								<li role="presentation" class="divider"></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
							</ul>
						</div>
					</div>
					<div class="panel-body">
						<div class="row" style="margin-top: -15px; padding: 3px;background: #eaeaea;">
							<div class="col-lg-12" style="">
								<div class="btn-toolbar" role="toolbar">
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-sm">Left</button>
										<button type="button" class="btn btn-default btn-sm">Middle</button>
										<button type="button" class="btn btn-default btn-sm">Right</button>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-8">
								
							</div>
							<div class="col-lg-4">
								
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/<?php echo $prefix; ?>/assets/js/bootstrap.min.js"></script>
  </body>
</html>