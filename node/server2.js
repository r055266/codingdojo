var event_emitter = require("events").EventEmitter;

var Ticker = function()
{
	var self = this,
				next_tick = function()
				{
					self.emit("tick", Math.random(1000));
					setTimeout(next_tick, 1000);
				}

		next_tick();
}

Ticker.prototype = new event_emitter;

var tick_tock = new Ticker();

tick_tock.addListener('tick', function(number){
	console.log('number emitted: '+ number);
});