/*global app */
'use strict';
app
.controller('booktableCtrl', ['$scope', '$stateParams','appConfig', 'dataservice','$timeout', '$ionicLoading',
  function($scope, $stateParams, appConfig, dataservice, $timeout, $ionicLoading){
    //
    if(typeof analytics !== 'undefined') {
      window.analytics.trackView('adduserCtrl');
    }

    function prependZero(param) {
      if (String(param).length < 2) {
        return '0' + String(param);
      }
      return param;
    }

    function epochParser(val, opType) {
      if (val === null) {
        return '00:00';
      } else {
        var meridian = ['AM', 'PM'];

        if (opType === 'time') {
          var hours = parseInt(val / 3600);
          var minutes = (val / 60) % 60;
          var hoursRes = hours > 12 ? (hours - 12) : hours;

          var currentMeridian = meridian[parseInt(hours / 12)];

          return (prependZero(hoursRes) + ':' + prependZero(minutes) + ' ' + currentMeridian);
        }
      }
    }

    // Nearest half an slot.
    function nearestTime(hour, min){
      var h = hour;
      var m;
      if (min<30) {
        m = 0;
      }else {
        h += 1;
        m = 30;
      } 
      return (h * 3600 + m * 60);
    }

    $scope.currentDate = new Date();
    var dateParticles = {
      year: $scope.currentDate.getFullYear(),
      month: $scope.currentDate.getMonth(),
      day: $scope.currentDate.getDate(),
      hour: $scope.currentDate.getHours(),
      minutes: $scope.currentDate.getMinutes()
    };

    $scope.title = 'Select Date';
    $scope.book= {};
    var defaultTime = nearestTime(dateParticles.hour);

    $scope.book.booking_time = epochParser(defaultTime, 'time');    

    $scope.datePickerCallback = function (val) {
      if(typeof(val) !== 'undefined'){      
        $scope.book.booking_date = val.getFullYear() + '-' + val.getMonth() + '-' + val.getDate();
      }
    };

    var timePickerCallback = function (val) {     
      if (typeof (val) !== 'undefined') {
        $scope.book.booking_time = epochParser(val, 'time');
        $scope.slots.inputEpochTime = val;
      }
    };
    

    $scope.slots = {
      inputEpochTime: nearestTime(dateParticles.hour),
      format: 12,
      step: 30,
      titleLabel: 'Select Time',
      callback: timePickerCallback
    };

    $scope.book = {
      persons: 2,
      name: localStorage.getItem('username'),
      booking_date: dateParticles.year + '-' + dateParticles.month + '-' + dateParticles.day,
      booking_time: epochParser($scope.epochTime, 'time')
    };

    $scope.booktablesubmit = function() {
      $scope.book.confirmed= 'No';
      console.log($scope.book);
      dataservice.bookTable($scope.book)
        .then(function(data){
          $scope.book.email = '';
          $scope.book.phone = '';
          $scope.messageShow = true;
          $scope.message = 'Hello ' + data.data.name + ' ' + data.message;    
          $timeout(function(){
            $scope.messageShow = false;
          },5000);    
        });
    };

    $scope.$on('$ionicView.enter',function(){
      $ionicLoading.hide();      
    });
    

}]);
