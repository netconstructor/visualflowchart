$(document).ready(function(){
	var instance;
	var elm_id = 0;
	jsPlumb.ready(function () {
		jsPlumb.importDefaults({ 
			ConnectionsDetachable:true
		});
		instance = jsPlumb.getInstance({
			Endpoint: ["Dot", {
				radius: 3
			}],
			HoverPaintStyle: {
				strokeStyle: "#1e8151",
				lineWidth: 2
			},
			ConnectionOverlays: [
				["PlainArrow", {
					location: 1,
					id: "arrow",
					length: 10,
					foldback: 0.5
				}],
				["Label", {
					label: "",
					id: "label",
					cssClass: "aLabel"
				}]
			],
			Container: "process"
		});
		
		var shape = '<div class="w" id="elm_start_0"><span class="glyphicon glyphicon-log-in"></span> Entry <div class="ep"></div></div>';
		$("#process").append(shape);
		
		instance.doWhileSuspended(function () {
			var windows = jsPlumb.getSelector(".process .w");
			instance.draggable(windows, { containment:".stage"});
			
			instance.makeSource(windows, {
				filter: ".ep", // only supported by jquery
				anchor: "Continuous",
				connector: ["StateMachine", {
					curviness: 20
				}],
				connectorStyle: {
					strokeStyle: "#5c96bc",
					lineWidth: 2,
					outlineColor: "transparent",
					outlineWidth: 2
				},
				maxConnections: 1,
				onMaxConnections: function (info, e) {
					alert("Maximum connections (" + info.maxConnections + ") reached");
				}
			});
		});
		var shape = '<div class="w" id="elm_exit_0"><span class="glyphicon glyphicon-log-out"></span> Exit </div>';
		$("#process").append(shape);
		
		instance.doWhileSuspended(function () {			
			var windows = jsPlumb.getSelector(".process .w");
			instance.draggable(windows, { containment:".stage"});
			
			instance.makeTarget(windows, {
				dropOptions: {
					hoverClass: "dragHover"
				},
				anchor: "Continuous"
			});
		});
		
		instance.bind("click", function (c) {
			if(confirm('Delete action '+c.getOverlay('label').getLabel()+'?'))
				instance.detach(c);
		});

		instance.bind("connection", function (info) {
			var label = prompt('Action');
			if(!label)
				instance.detach(info.connection);
			else
				info.connection.getOverlay("label").setLabel(label);
		});
		
		instance.bind("contextmenu", function(){
			//alert(1);
		});
	});
	
	$(".stage").click(function(){
		$('.w').removeClass('active');
	});

	$("#addShape").click(function(){
		var shapeName = prompt('Name');
		var shape = '<div class="w" id="elm_'+elm_id+'">'+shapeName+'<div class="ep"></div></div>';
		$("#process").append(shape);
		$("#eml_"+elm_id).click(function(e){
			$(this).addClass('active');
		});
		
		elm_id++;
		instance.doWhileSuspended(function () {
			var windows = jsPlumb.getSelector(".process .w");
			instance.draggable(windows, { containment:".stage"});
			
			instance.makeSource(windows, {
				filter: ".ep", // only supported by jquery
				anchor: "Continuous",
				connector: ["StateMachine", {
					curviness: 20
				}],
				connectorStyle: {
					strokeStyle: "#5c96bc",
					lineWidth: 2,
					outlineColor: "transparent",
					outlineWidth: 2
				},
				maxConnections: 5,
				onMaxConnections: function (info, e) {
					alert("Maximum connections (" + info.maxConnections + ") reached");
				}
			});

			instance.makeTarget(windows, {
				dropOptions: {
					hoverClass: "dragHover"
				},
				anchor: "Continuous"
			});
		});
	});
	
	$("#addShape1").click(function(){
		$("#mdStepSelect").modal({
			keyboard: false,
			backdrop: 'static'
		});
	});
});