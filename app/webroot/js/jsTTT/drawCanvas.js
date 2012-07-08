/*
*		author: Fernando Cea
*		documentation library http://jcscript.com/documentation/functions/delPoint
*/

drawCanvas = {
	
	_init: function(){
		this.loadTool();
	},

	loadTool: function(){

		var canvas, context, canvaso, contexto;

		// The active tool instance.
		var tool;
		var tool_default = 'line';

		var testDiv = $('#imageTemp'); var offset = testDiv.offset();

		function init () {
				
			// Find the canvas element.
			canvaso = document.getElementById('imageView');
			if (!canvaso) {
				alert('Error: I cannot find the canvas element!');
				return;
			}

			if (!canvaso.getContext) {
				alert('Error: no canvas.getContext!');
				return;
			}

			// Get the 2D canvas context.
			contexto = canvaso.getContext('2d');
			if (!contexto) {
				alert('Error: failed to getContext!');
				return;
			}

			// Add the temporary canvas.
			var container = canvaso.parentNode;
			canvas = document.createElement('canvas');
			if (!canvas) {
				alert('Error: I cannot create a new canvas element!');
				return;
			}

			canvas.id     = 'imageTemp';
			canvas.width  = canvaso.width;
			canvas.height = canvaso.height;
			container.appendChild(canvas);

			context = canvas.getContext('2d');

			// Get the tool select input.
			var tool_select = document.getElementById('dtool');
			if (!tool_select) {
				alert('Error: failed to get the dtool element!');
				return;
			}
			tool_select.addEventListener('change', ev_tool_change, false);

			// Activate the default tool.
			if (tools[tool_default]) {
				tool = new tools[tool_default]();
				tool_select.value = tool_default;
			}

			// Attach the mousedown, mousemove and mouseup event listeners.
			canvas.addEventListener('mousedown', ev_canvas, false);
			canvas.addEventListener('mousemove', ev_canvas, false);
			canvas.addEventListener('mouseup',   ev_canvas, false);
			canvas.addEventListener('click',   ev_canvas, false);
			canvas.addEventListener('dblclick',   ev_canvas, false);
			canvas.addEventListener('contextmenu',   ev_canvas, false);
		}

		// The general-purpose event handler. This function just determines the mouse 
		// position relative to the canvas element.
		function ev_canvas (ev) {
			if (ev.layerX || ev.layerX == 0) { // Firefox
				ev._x = ev.layerX;
				ev._y = ev.layerY;
			} else if (ev.offsetX || ev.offsetX == 0) { // Opera
				ev._x = ev.offsetX;
				ev._y = ev.offsetY;
			}

			// Call the event handler of the tool.
			var func = tool[ev.type];
			if (func) {
				func(ev);
			}
		}

		// The event handler for any changes made to the tool selector.
		function ev_tool_change (ev) {
			if (tools[this.value]) {
				tool = new tools[this.value]();
			}
		}

		// This function draws the #imageTemp canvas on top of #imageView, after which 
		// #imageTemp is cleared. This function is called each time when the user 
		// completes a drawing operation.
		function img_update () {
				contexto.drawImage(canvas, 0, 0);
				context.clearRect(0, 0, canvas.width, canvas.height);
		}

		function setClearCanvasBTN(context){
			var btnClear = document.getElementById('btnClear');
			
			btnClear.onclick = function() {
							context.clearRect(0, 0, canvas.width, canvas.height);
					};
		}		
		

		// This object holds the implementation of each drawing tool.
		var tools = {};

		// The drawing pencil.
		tools.pencil = function () {
		var tool = this;
		this.started = false;

		// This is called when you start holding down the mouse button.
		// This starts the pencil drawing.
		this.mousedown = function (ev) {
				context.beginPath();
				context.moveTo(ev._x, ev._y);
				tool.started = true;
		};

		// This function is called every time you move the mouse. Obviously, it only 
		// draws if the tool.started state is set to true (when you are holding down 
		// the mouse button).
		this.mousemove = function (ev) {
			if (tool.started) {
				context.lineTo(ev._x, ev._y);
				context.stroke();
			}
		};

		// This is called when you release the mouse button.
		this.mouseup = function (ev) {
			if (tool.started) {
				tool.mousemove(ev);
				tool.started = false;
				img_update();
			}
		};
		};

		// The rectangle tool.
		tools.rect = function () {
			var tool = this;
			this.started = false;

			this.mousedown = function (ev) {
				tool.started = true;
				tool.x0 = ev._x;
				tool.y0 = ev._y;
			};

			this.mousemove = function (ev) {
				if (!tool.started) {
					return;
				}

				var x = Math.min(ev._x,  tool.x0),
						y = Math.min(ev._y,  tool.y0),
						w = Math.abs(ev._x - tool.x0),
						h = Math.abs(ev._y - tool.y0);

				context.clearRect(0, 0, canvas.width, canvas.height);

				if (!w || !h) {
					return;
				}

				context.strokeRect(x, y, w, h);
			};

			this.mouseup = function (ev) {
				if (tool.started) {
					tool.mousemove(ev);
					tool.started = false;
					img_update();
				}
			};
		};

		jc.start("imageView",true);


		// The line tool.
		tools.line = function () {
			var 	tool = this;
			this.started = false;

			this.mousedown = function (ev) {
				tool.started = true;
				tool.x0 = ev._x;
				tool.y0 = ev._y;
			};

			this.mousemove = function (ev) {
				if (!tool.started) {
					return;
				}

				context.clearRect(0, 0, canvas.width, canvas.height);

				context.beginPath();
				context.moveTo(tool.x0, tool.y0);
				context.lineTo(ev._x,   ev._y);
				context.stroke();
				context.closePath();
				
			};

			this.mouseup = function (ev) {
				if (tool.started) {
					tool.mousemove(ev);
					tool.started = false;
					img_update();
				}
			};

			setClearCanvasBTN(contexto);
			
		};

		tools.linePointToPoint = function () {
			var 	linePoints = []
				,		cachePoints = []
				,		count = 0;

			this.click = function(ev){
				switch (linePoints.length){
					//agrega el primer punto
					case 0: linePoints.push([ev.layerX,ev.layerY]); break;
					//agrega el segundo punto, dibuja y vacia
					case 1: linePoints.push([ev.layerX,ev.layerY]); jc.line(linePoints).draggable().id('imageView'); linePoints = []; break;
				}
				cachePoints.push([ev.layerX,ev.layerY]);
				count = cachePoints.length;
				console.log(count);
			};

			this.dblclick = function(ev){
				console.log(count);
				//jc('#imageView').delPoint(count--);
			};

			this.contextmenu  = function(ev){
				
				ev.preventDefault();

				if (count >= 0){
					count = cachePoints.length;
					cachePoints.pop();
					console.log(count);
					jc('#imageView').delPoint(count);
				}

			};

		};

		
		init();
		
	},

	clearCanvas: function(context){
		var canvas = document.getElementById(context);

		canvas = canvas.getContext('2d');
		canvas.save();
		canvas.setTransform(1, 0, 0, 1, 0, 0);
		canvas.clearRect(0, 0, canvas.width, canvas.height);

		// Restore the transform
		canvas.restore();
	}
}
drawCanvas._init();