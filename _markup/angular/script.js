// lesson 2
var myApp = angular.module("myModule",[]);

myApp.controller("myController", function($scope){
	$scope.message = "Angular js Tutorial";
});

myApp.controller("gioscontroller", function($scope){
	$scope.textx = "Wao";
});

// lesson 3
var myApp3 = angular.module("myModule3", []); 

myApp3.controller("gioscontroller3", function($scope){
	var emploee = {
		firstname: "David", 
		lastname: "Gvazava", 
		gender: "Male"
	}
	$scope.newAction = emploee;
});

// lesson 4
var myApp4 = angular.module("myModule4", []).controller("gioscontroller4", function($scope){
	var coentry = {
		name: "Georgia", 
		code: "GE", 
		flag: "images/Desert.jpg"
	}
	$scope.imgx = coentry;
});

// lesson 5
var myApp5 = angular.module("myModule5", []).controller("gioscontroller5", function($scope){
	
	$scope.message = "Hello Angular";
});

// lesson 6
var myApp6 = angular.module("myModule6", []).controller("gioscontroller6", function($scope){
	var emploeys = [
		{ firstName: "gio", LastName: "gvazava" }, 
		{ firstName: "Kate", LastName: "gvazava" }, 
		{ firstName: "Darejan", LastName: "gvazava" }, 
		{ firstName: "Guram", LastName: "gvazava" } 
	];
	$scope.r = emploeys;
});