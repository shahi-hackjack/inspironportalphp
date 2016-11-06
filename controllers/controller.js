
var myApp=angular.module('myApp',[]);

var eid;
myApp.controller('AppCtrl',['$scope','$http',function($scope,$http){

$scope.login=function(){
        console.log($scope.log.Email);

   $http.post('login.php',$scope.log).success(function(res){
    console.log("response was succesful ");
    console.log($scope.log.Email);
    console.log(eid);
  eid = $scope.log.Email; 
  console.log("globalvar="+eid);
   console.log(res);
     

             

          
          $(".main2").slideUp().show(1000);
             $(".main1").hide();
           
          if(eid=='admin'){Cookies.set('name', 'admin');

           console.log(Cookies.get('name'));
             $scope.log=""; 
         }
         else{Cookies.set('name',$scope.log.Email );

           console.log(Cookies.get('name'));
               
$scope.log=""; 
               }
  //document.getElementById("pic").;

   }).error(function(){
   	$scope.log="";
   	document.getElementById('green').innerHTML="";
   document.getElementById('red').innerHTML="";
   	document.getElementById('red').innerHTML="Login Failed!!";
   });

};




$scope.register=function(){
        //console.log(window.location.hostname);
   $http.post('register.php',$scope.user).success(function(res){
    console.log("response was succesful ");
   console.log(res);
   


   $scope.user="";
   $('#form1').hide(1000);
   $('#form2').show(2000);
   document.getElementById('green').innerHTML="";
   document.getElementById('red').innerHTML="";
   document.getElementById('green').innerHTML="Successfully Registred!!";
    
}).error(function(){
	$scope.user="";
	$('#form1').hide(1000);
   $('#form2').show(2000);
	document.getElementById('green').innerHTML="";
   document.getElementById('red').innerHTML="";
	document.getElementById('red').innerHTML="Unsuccessfull Attempt!!";
});

};







}]);




myApp.controller('Ctrl',['$scope','$http',function($scope,$http){




$scope.logout=function(){
        console.log("logout working");
        Cookies.remove('name');
        location.reload(); 
};


$scope.Pitch=function(){
  console.log(eid);
      console.log("Pitching"+$scope.Event.EventOrganiser1);
      $scope.Event.eid=Cookies.get('name');
      console.log($scope.Event.eid);
$http.post('eventrpitch.php',$scope.Event).success(function(res){
    console.log("response was succesful ");

        
   //console.log(res.EventDescription);
   console.log((res));
   
 $scope.Event="";
$("#event1").hide();
$("event3").hide();
$("event2").hide();
$("#event5").hide();
$("#event4").show();
if(Cookies.get('name')!='admin')
{$http.post('eventload.php',{'dt':Cookies.get('name')}).success(function(res){
 console.log(res);
 if(Cookies.get('name')=='admin') {
  $("#event2").show();
  $("#event4").hide();
   $("#event3").hide();
   $("#event5").hide();
   $("#event1").hide();
  console.log("m in admin"); 
  }
 else
    {
      $("#event4").show(); 
      $("#event2").hide();
   $("#event3").hide();
    $("#event1").hide();
    $("#event5").hide();

  }
 //   debugger;
  //$scope.contact=res;
      $scope.ED=res;
  }).error(function(){
 console.log("YOU CAN PITCH ONLY ONCE");
});
}
else{
$http.post('eventloadadmin.php').success(function(res){
 console.log(res);
 if(Cookies.get('name')=='admin') {
  $("#event2").show();
  $("#event4").hide();
   $("#event3").hide();
   $("#event1").hide();
   $("#event5").hide();
   
  console.log("m in admin"); 
  }
 else
    { console.log("m in normal");
      $("#event4").show(); 
      $("#event2").hide();
   $("#event3").hide();
   
    $("#event1").hide();

    $("#event5").hide();
  }
 //   debugger;
  

   //$scope.contact=res;
   $scope.ED=res;
   }).error(function(){
 console.log("YOU CAN PITCH ONLY ONCE");
});

}
})
};



$scope.Load=function(){
  console.log(eid);
if(Cookies.get('name')!='admin')
{$http.post('eventload.php',{'dt':Cookies.get('name')}).success(function(res){
 console.log(res);
 if(Cookies.get('name')=='admin') {
  $("#event2").show();
  $("#event4").hide();
   $("#event3").hide();
   $("#event1").hide();
   $("#event5").hide();
  
  console.log("m in admin"); 
  }
 else
    {
      $("#event4").show(); 
      $("#event2").hide();
      $("#event3").hide();
      $("#event1").hide();
      $("#event5").hide();
  }
 //   debugger;
  

   //$scope.contact=res;
   $scope.ED=res;
   });
}
else{
$http.post('eventloadadmin.php').success(function(res){
 console.log(res);
 if(Cookies.get('name')=='admin') {
  $("#event2").show();
  $("#event4").hide();
   $("#event3").hide();
   $("#event1").hide();
   $("#event5").hide();
   
  console.log("m in admin"); 
  }
 else
    { console.log("m in normal");
      $("#event4").show(); 
      $("#event2").hide();
   $("#event3").hide();
   
    $("#event1").hide();

    $("#event5").hide();
  }
 //   debugger;
  

   //$scope.contact=res;
   $scope.ED=res;
   });

}
};



$scope.Edit=function(){

  console.log("event3");

$("#event5").hide();
 //   debugger;
 
    $("#event1").hide();
    $("#event4").hide();
    $("#event2").hide();
      $("#event3").show();
 
$http.post('eventload.php',{'dt':Cookies.get('name')}).success(function(res){
 console.log(res[0].EventName);

   $scope.Event=res[0];
   
   });

};

$scope.Update=function(){
console.log("updateangular");
/*location.reload();
 $("#event3").hide();
 $("#event2").show();
 //   debugger;
    $("#event1").hide();
  $('#event4').hide();

*/

if(Cookies.get('name')=='admin')
  {console.log($scope.Event.Email);
   $scope.Event.eid=$scope.Event.Email;
$http.post('eventadminupdate.php',$scope.Event).success(function(res){
  console.log(res);
$("#event3").hide();
 $("#event2").hide();
  $("#event1").show();
  $('#event4').hide();
  $('#event5').hide();
  
  $scope.Event="";
 }).error(function(){
 console.log("ERROR IN UPDATE"); 
});
}
else{
  console.log($scope.Event.Email);
   $scope.Event.eid=$scope.Event.Email;
$http.post('eventrpitch.php',$scope.Event).success(function(res){
  console.log(res);
$("#event3").hide();
 $("#event2").hide();
  $("#event1").show();
  $('#event4').hide();
  $('#event5').hide();
  
  $scope.Event="";


}).error(function(){
 console.log("ERROR IN UPDATE"); 
});
}


};

$scope.change=function(id){
console.log(id);


$('#event3').hide();
$('#event5').show();
$('#event2').hide();
$('#event1').hide();
$('#event4').hide();


$http.post('eventload.php',{'dt':id}).success(function(res){
        console.log(res);
         $scope.Event=res[0];
}).error(function(){
 console.log("ERROR IN CHANGE");
});
};

$scope.delete=function(id){
console.log("remove"+id);
$http.post('eventdelete.php',{'dt':id}).success(function(res){
     console.log(res);
   
$('#event3').hide();
$('#event2').hide();

$('#event1').show();
$('#event4').hide();
$('#event5').hide();
}).error(function(){
 console.log("ERROR IN DELETE"); 
});


};

$scope.FORM=function(){
  $("#event1").show();
  
 //   debugger;
    $("#event2").hide();
    $("#event3").hide();
    $("#event4").hide();
    $('#event5').hide();

    }

}]);