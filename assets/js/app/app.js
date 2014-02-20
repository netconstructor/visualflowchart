$(document).ready(function(){
	var instance;
	var elm_id = 0;
	jsPlumb.ready(function () {
		instance = jsPlumb.getInstance({
			Endpoint: ["Dot", {
				radius: 2
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

		/*instance.bind("click", function (c) {
			instance.detach(c);
		});*/

		instance.bind("connection", function (info) {
			//info.connection.getOverlay("label").setLabel(info.connection.id);
			var label = prompt('Action');
			/*if(label == '')
				instance.detach(info.connection);
			else*/
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
		var shape = '<div class="w" id="eml_'+elm_id+'">'+shapeName+'<div class="ep"></div></div>';
		$("#process").append(shape);
		$("#eml_"+elm_id).click(function(e){
			//alert($(this).attr('id'));
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
});