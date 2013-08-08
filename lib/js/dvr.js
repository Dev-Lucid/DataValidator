// Copyright 2013 Mike Thorn (github: WasabiVengeance). All rights reserved.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

var dvr={'rulesets':{},'functions':{}};


dvr.validate=function(data,ruleset){
	if(typeof(data) == 'object'){
		var passes = true;
		var errors = {};
		
		if(typeof(dvr.rulesets[ruleset]) != 'undefined'){
			for(var i=0; i<dvr.rulesets[ruleset].length;i++){
				var value = data[dvr.rulesets[ruleset][i].field];
				console.log('checking field '+dvr.rulesets[ruleset][i].field+': '+value);
				for(var j=0; j<dvr.rulesets[ruleset][i].rules.length; j++){
					var funcType = typeof(dvr.functions[dvr.rulesets[ruleset][i].rules[j].type]);
					if(funcType == 'function'){
						var testResult = dvr.functions[dvr.rulesets[ruleset][i].rules[j].type](
							value,
							dvr.rulesets[ruleset][i].rules[j].data1,
							dvr.rulesets[ruleset][i].rules[j].data2,
							dvr.rulesets[ruleset][i].rules[j].data3
						);
						if(!testResult){
							passes = false;
							errors[dvr.rulesets[ruleset][i].field] = dvr.rulesets[ruleset][i].rules[j].message;
						}
					}else{
						throw 'unknown validation type';
					}
				}
			}
		}
		return [passes,errors];
	}
	else{
	}
};

dvr.functions.numeric=function(v,d1,d2,d3){
	v = parseFloat(v);
	return (!isNaN(v));
};

dvr.functions.notnumeric=function(v,d1,d2,d3){
	v = parseFloat(v);
	return (isNaN(v));
};

dvr.functions.checked=function(v,d1,d2,d3){
	return ((new String(v)) == 'on');
};

dvr.functions.notchecked=function(v,d1,d2,d3){
	return ((new String(v)) != 'on');
};

dvr.functions.email=function(v,d1,d2,d3){
	return /^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/.test(v);
};

dvr.functions.length=function(v,d1,d2,d3){
	v = new String(v);
	if(isNaN(parseInt(d2))){
		return (v.length >= parseInt(d1));
	}else{
		return (v.length >= parseInt(d1) && v.length <= parseInt(d2));
	}
};

dvr.functions.maxlength=function(v,d1,d2,d3){
	v = new String(v);
	return (v.length <= d1);
};

dvr.functions.minlength=function(v,d1,d2,d3){
	v = new String(v);
	return (v.length >= d1);
};

dvr.functions.equals=function(v,d1,d2,d3){
	v = new String(v);
	return (v == d1);
};

dvr.functions.notequals=function(v,d1,d2,d3){
	v = new String(v);
	return (v != d1);
};
