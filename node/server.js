/* Require events and set emitter to use on event */
var sys = require("sys"),
	http = require("http");
	// url = require("url"),
	// events = require("events"),
	// emitter = new events.EventEmitter(),
	// path = require("path"),
	// fs = require("fs"),
	// util = require("util");

http.createServer(function(request,response){
	//sys.puts("I got kicked");
	function f(x){
		//console.log('AAAA', x)
		if(x == 1)
			return 1;
		else if(x == 2)
			return 2;
		else
			return x+f(x-2)*3+f(x-1)*2;
	}

	console.log(f(5))
	//console.log(toString(f(5)));
	response.writeHeader(200);
	response.write(f(5) +'');
	response.end();

	/* INITIALIZE HEADER TO APPROPRIATE CONTENT-TYPE AND START OUTPUTTING CONTENT */

	//response.writeHeader(200, {'Content-Type':'text/html'});

	/* INVENTORY (NEEDS REVISION) */

	// var items = new Array("Ball", "Laptop", "Cellphone", "Tuxedo", "External HDD", "Car", "Basketball Shoe", "Gamepad Controller", "Backpack", "Shades");
	// var count = 0;
	// var delay = 2000;

	// console.log("Loop Items by forEach");
	// items.forEach(function(item){
	// 	if(count == 0)
	// 		console.log(item);
	// 	else
	// 	{
	// 		delay_display(item, delay, function(item){
	// 			console.log(item);
	// 		});
		
	// 		delay += 2000;
	// 	}
	// 	count++;
	// });

	/* FIRST PROGRAM */

	// var url_request = url.parse(request.url).pathname;

	// if(url_request == "/" || url_request == "/index.html")
	// 	var file = "index.html"
	// else if(url_request == "/parents.html")
	// 	var file = "parents.html"
	// else
	// 	var file = ""
	// fs.exists(file,function(exists){
	// 	if(!exists)
	// 	{
	// 		response.writeHeader(404, {'Content-Type':"text/html"});
	// 		response.write("<h1>Page Not Found!</h1>");
	// 		response.end();
	// 	}
	// 	else
	// 	{
	// 		fs.readFile(file, function(error, data){
	// 			if(error)
	// 			{
	// 				response.writeHeader(500, {'Content-Type':"text/html"});
	// 				response.write("<h1>Internal Server Error</h1>");
	// 				response.end();
	// 			}
	// 			else
	// 			{
	// 				response.writeHeader(200, {'Content-Type':"text/html"});
	// 				response.write(data);
	// 				response.end();
	// 			}
	// 		});
	// 	}
	// });

	/* ROUTING (NOT COMPLETE)*/

	// var url_request = url.parse(request.url).pathname

	// if(url_request == '/' || url_request == "/index.html")
	// 	file_path = "index.html"
	// else if(url_request == "/parents.html")
	// 	file_path = "parents.html"

	// fs.exists(file_path, function(exists){
	// 	if(!exists)
	// 	{
	// 		display_error(404, response, fs)
	// 	}
	// 	else
	// 	{
	// 		fs.readFile(file_path, function(error, data){
	// 			if(error)
	// 			{
	// 				response.writeHeader(500, {"Content-Type": "text/html"});
	// 				response.write("<h1>Internal Server Error!</h1>");
	// 				response.end();
	// 			}
	// 			else
	// 			{
	// 				response.write(data);
	// 				response.end();
	// 			}
	// 		})
	// 	}
	// })

	/* READ/WRITE */

	// fs.readFile("index.html", "utf8", function(err, contents){
	// 	response.write(contents);
	
	// 	fs.writeFile("index.html", "\nI'm Randall Frisk", "utf8", function(){
	// 		response.end();
	// 	});

	// 	fs.appendFile("information.txt", "\n Adding Another Line!", "utf8", function(){
	// 		response.end();
	// 	})
	// })


	/* EVENTS */

	// emitter.on("hello", function(data){
	// 	console.log("Hello There " +data.name+ "! You are only " + data.age);
	// })

	// emitter.emit("hello", {"name":"Randall Frisk", "age":"27"});

	/* PATH */

	// var request_url = url.parse(request.url).pathname

	// console.log(path.basename(request_url));
	// console.log(path.extname(request_url));
	// console.log(path.normalize(request_url));
	
	/* FUNCTIONS */

	/* call back functions */

	// var contents = fs.readFile('information.txt', 'utf8', function(err, contents){
	// 	setTimeout(function(){
	// 		console.log(contents);
	// 	})
	// });

	// my_sandwich("Turkey", "Cheese", function(data){
	// 	console.log(data);
	// })

	/* ARRAYS */

	// var items = new Array("Car", "Laptop", "Basketball Shoes", "IPAD");
	// var items_array = ["Vegitable", "Fruits", "Meat", "Wheat"];
	// var multidim = [items, items_array];

		/* using iterate */

		// for(var x=0; x< items.length; x++){
		// 	response.write("\n"+items[x]);
		// }

		/* interate through multidimensional array */

		// multidim.forEach(function(it){
		// 	response.write("\n\n"+it);
		// 	for(var x=0; x< it.length; x++){
		// 		response.write("\n"+it[x]);
		// 	}
		// });

		/*  using sort */

		// items.sort()
		// response.write("\n"+items);
		// response.write("\n"+multidim[1]);

		/* using splice */

		// items.splice(0,2)
		// response.write("\n"+items);
		// response.write("\n"+multidim[1]);

		/* using join */

		// response.write("\n"+items.join("="));
		// response.write("\n"+multidim[1]);

		/* accessing multidimensional arrays */

		// response.write("\n"+multidim[0]);
		// response.write("\n"+multidim[1]);


		/* using a function to add an item to the beginning of the array */

		//passed_by_ref(items);

		/* adding an item to the beginning of the array */

		// items[0] = "Toyota";

		// response.write("\n"+items);

	/* foreach loop */

	// var items = new Array("Car", "Laptop", "Basketball Shoes", "IPAD");

	// items.forEach(function(item){
	// 	response.write("\n"+item);
	// });

	/* while loop */

	// var x = false;
	// var y = 0;

	// while(!x)
	// {
	// 	if(y == 20)
	// 		break;

	// 	response.write("\n"+y);

	// 	y = y+2;
	// }

	/* for loop */

	// for(var x=0, y=0; x<10; x++, y=y+2)
	// {
	// 	response.write("\n"+x+"-"+y);
	// }

	/* using strings injunction with different string functions */

	//response.write(a+b);
	//response.write("\n"+ c.charAt(5));
	// response.write("\n"+ b.IndexOf("S"));
	// response.write("\n"+ b.charAt(0));
	// response.write("\n"+ d.split("."));
	// response.write("\n"+ d.substr(0,3));
	// response.write("\n"+ d.toLowerCase());
	// response.write("\n"+ d.toUpperCase());
	
	/* MUST INCLUDE TO END REQUEST. */

	//response.end();



	/* example of using url and util */

	// var a ="Hello World", b = "Another String", c = 55 + 30, d = 'Ka.boom.boom';

	// if(request_url == "/")
	// {
	// 	file_path = "index.html";
	// 	fs.exists(file_path, function(exists){
			// if(!exists){
			// 	response.writeHeader(404, {"Content-Type": "text/plain"});
			// 	reponse.write("Page Not Found");
			// }else{

				// easier way using util

				// var file = fs.createReadStream(file_path);
				// util.pump(file, response);

				// hard way without using util

				// fs.readFile(file_path, function(error, data){
				// 	if(error){
				// 		response.writeHeader(500, {"Content-Type": "text/plain"});
				// 		response.write("Internal Server Error Occurred");
				// 		response.end();
				// 	}else{
				// 		fs.createReadStream(file_path);
				// 		response.writeHeader(200, {"Content-Type": "text/html"});
				// 		response.write(data);
				// 		response.end();
				// 	}
			// 	})
	// 		// }
	// 	})
	// }
}).listen(1024);
sys.puts("Server Running on 8080");

// function used for array section

function passed_by_ref(arr)
{
	arr[0] = "Totota";
}

// function used for callback functions.

function my_sandwich(param1, param2, callback)
{
	if(callback && typeof(callback) === "function")
	{
		callback("started eating my sandwich. \n it has " + param1 + " and " + param2);
	}
}

function display_error(error_code, response, fs)
{
	response.writeHeader(error_code, {"Content-Type": "text/html"});
	response.write("<h1>Page Not Found</h1>");
	response.end();
}

// function used for inventory

function delay_display(item, delay, callback){
	var stop = new Date().getTime();

	process.nextTick(function() {
		if(new Date().getTime() > stop + delay){
			if(typeof callback == "function"){
				callback(item);
			}
		}else{
			process.nextTick(arguments.callee);
		}
	});
}
