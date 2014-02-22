$(document).ready(function(){
<<<<<<< HEAD
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
=======
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
				} ],
                [ "Label", { label:"FOO", id:"label", cssClass:"aLabel" }]
>>>>>>> 489e07b02eb78ac3a1822327f277d5fa075d181b
			],
			Container:"process"
		});
<<<<<<< HEAD
		
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
			
=======

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
        instance.bind("connection", function(info) {
			info.connection.getOverlay("label").setLabel(info.connection.id);
        });

		// suspend drawing and initialise.
		instance.doWhileSuspended(function() {
										
			// make each ".ep" div a source and give it some parameters to work with.  here we tell it
			// to use a Continuous anchor and the StateMachine connectors, and also we give it the
			// connector's paint style.  note that in this demo the strokeStyle is dynamically generated,
			// which prevents us from just setting a jsPlumb.Defaults.PaintStyle.  but that is what i
			// would recommend you do. Note also here that we use the 'filter' option to tell jsPlumb
			// which parts of the element should actually respond to a drag start.
>>>>>>> 489e07b02eb78ac3a1822327f277d5fa075d181b
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
			instance.connect({ source:"opened", target:"phone1" });
			instance.connect({ source:"phone1", target:"inperson" });              
			instance.connect({ source:"phone1", target:"phone1" });
		});
	
	});
	
	$("#addShape1").click(function(){
		$("#mdStepSelect").modal({
			keyboard: false,
			backdrop: 'static'
		});
	});
});