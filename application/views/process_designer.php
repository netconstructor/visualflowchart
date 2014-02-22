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
											<!--<div class="w" id="rejected">REJECTED<div class="ep"></div></div>-->
											<?php
												foreach($process['steps'] as $step){
													echo '<div class="w" id="'.$step['id'].'" style="top: '.$step['position_x'].'px; left: '.$step['position_y'].'px;">'.$step['step_name'].'<div class="ep"></div></div>';
												}
											?>
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
	<!--<script src="/<?php echo $prefix; ?>/assets/js/app/app.js"></script>-->
	<script>
		$(document).ready(function(){
			jsPlumb.ready(function() {

				// setup some defaults for jsPlumb.	
				var instance = jsPlumb.getInstance({
					Endpoint : ["Dot", {radius:2}],
					HoverPaintStyle : {strokeStyle:"#1e8151", lineWidth:2 },
					ConnectionOverlays : [
						[ "Arrow", { 
							location:1,
							id:"arrow",
							length:14,
							foldback:0.8
						} ]/*,
						[ "Label", { label:"FOO", id:"label", cssClass:"aLabel" }]*/
					],
					Container:"process"
				});

				var windows = jsPlumb.getSelector(".process .w");

				// initialise draggable elements.  
				instance.draggable(windows);

				// bind a click listener to each connection; the connection is deleted. you could of course
				// just do this: jsPlumb.bind("click", jsPlumb.detach), but I wanted to make it clear what was
				// happening.
				instance.bind("click", function(c) { 
					instance.detach(c); 
				});

				// bind a connection listener. note that the parameter passed to this function contains more than
				// just the new connection - see the documentation for a full list of what is included in 'info'.
				// this listener sets the connection's internal
				// id as the label overlay's text.
				/*instance.bind("connection", function(info) {
					info.connection.getOverlay("label").setLabel(info.connection.id);
				});*/

				// suspend drawing and initialise.
				instance.doWhileSuspended(function() {

					// make each ".ep" div a source and give it some parameters to work with.  here we tell it
					// to use a Continuous anchor and the StateMachine connectors, and also we give it the
					// connector's paint style.  note that in this demo the strokeStyle is dynamically generated,
					// which prevents us from just setting a jsPlumb.Defaults.PaintStyle.  but that is what i
					// would recommend you do. Note also here that we use the 'filter' option to tell jsPlumb
					// which parts of the element should actually respond to a drag start.
					instance.makeSource(windows, {
						filter:".ep",				// only supported by jquery
						anchor:"Continuous",
						connector:[ "StateMachine", { curviness:20 } ],
						connectorStyle:{ strokeStyle:"#5c96bc", lineWidth:2, outlineColor:"transparent", outlineWidth:4 },
						maxConnections:5,
						onMaxConnections:function(info, e) {
							alert("Maximum connections (" + info.maxConnections + ") reached");
						}
					});						

					// initialise all '.w' elements as connection targets.
					instance.makeTarget(windows, {
						dropOptions:{ hoverClass:"dragHover" },
						anchor:"Continuous"				
					});

					// and finally, make a couple of connections
					//instance.connect({ source:"opened", target:"phone1" });
					//instance.connect({ source:"phone1", target:"inperson" });              
					//instance.connect({ source:"phone1", target:"phone1" });
					<?php
						foreach($process['actions'] as $action){
							echo 'instance.connect({ source:"'.$action['from_step'].'", target:"'.$action['to_step'].'",overlays:[[ "Label", {label:"'.$action['label'].'", id:"'.$action['id'].'", cssClass:"aLabel"}]]});';
						}
					?>
				});

			});
		});
	</script>
  </body>
</html>