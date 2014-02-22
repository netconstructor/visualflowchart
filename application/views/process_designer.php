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
	<link href="/<?php echo $prefix; ?>/assets/css/jquery-ui.css" rel="stylesheet"/>
	<link href="/<?php echo $prefix; ?>/assets/css/elements.css" rel="stylesheet"/>
    <!-- Bootstrap -->
    <link href="/<?php echo $prefix; ?>/assets/css/bootstrap.css" rel="stylesheet">
	<!--<link href="/<?php echo $prefix; ?>/assets/css/bootstrap-theme.css" rel="stylesheet">-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link href="/<?php echo $prefix; ?>/assets/css/style.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  </head>
  <body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-main">
					<div class="panel-heading">
						<h3 class="panel-title"  style="display:inline; font-weight: 600;">Process designer</h3>
						<div class="dropdown pull-right" style="display:inline-block;">
							<button class="btn btn-link btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Admin <span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Settings</a></li>
								<li role="presentation" class="divider"></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a></li>
							</ul>
						</div>
					</div>
					<div class="panel-body">
						<div class="row" style="margin-top: -15px; padding: 3px;background: #dde2e8;">
							<div class="col-lg-12" style="">
								<div class="btn-toolbar" role="toolbar">
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-sm fa-lg"><span class="glyphicon glyphicon-floppy-save"></span></button>
										<button type="button" class="btn btn-default btn-sm fa-lg"><i class="fa fa-folder-open"></i></button>
										<button type="button" class="btn btn-default btn-sm fa-lg"><i class="glyphicon glyphicon-check"></i></button>
									</div>
									<!--<div class="dropdown" style="display:inline-block;">
										<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Insert <span class="caret"></span></button>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
											<li role="presentation"><a role="menuitem" tabindex="-1" href="#" id="addShape">Process step</a></li>
											<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Decision step</a></li>
										</ul>
									</div>-->
									<button type="button" class="btn btn-default btn-sm fa-lg"><i class="fa fa-plus-circle" id="addShape"></i></button>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-9">
								<div class="panel panel-tools">
									<div class="panel-heading">Process</div>
									<div class="panel-body">
										<div class="fd process stage" id="process" style="height: 100%;">
											<div class="w" id="opened">BEGIN<div class="ep"></div></div>
											<div class="w" id="phone1">PHONE INTERVIEW 1<div class="ep"></div></div>
											<div class="w" id="phone2">PHONE INTERVIEW 2<div class="ep"></div></div>
											<div class="w" id="inperson">IN PERSON<div class="ep"></div></div>
											<div class="w" id="rejected">REJECTED<div class="ep"></div></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="panel panel-tools">
									<div class="panel-heading">Tools</div>
									<div class="panel-body">
										
									</div>
								</div>
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
	<script src="/<?php echo $prefix; ?>/assets/js/jquery-ui.js"></script>
	<script src="/<?php echo $prefix; ?>/assets/js/jquery.jsPlumb-1.5.5-min.js"></script>
	<script src="/<?php echo $prefix; ?>/assets/js/app/app.js"></script>
  </body>
</html>