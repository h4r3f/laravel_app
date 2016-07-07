/*global app */
'use strict';
app
.controller('dishitemsCtrl', ['$scope', '$stateParams', '$ionicLoading', 'appConfig', 'dataservice', '$filter', 'FCcart', '$rootScope', '$ionicScrollDelegate', 'curSymbol',
	function($scope, $stateParams, $ionicLoading, appConfig, dataservice, $filter, FCcart, $rootScope, $ionicScrollDelegate, curSymbol){

		$scope.curSymbol = curSymbol;

		if(typeof analytics !== 'undefined') {
			window.analytics.trackView('dishitemsCtrl');
		}

		$scope.imgroot = appConfig.imgserver;
		dataservice.dishItems().then(function(d){
			$scope.dishes = d.data;
			$ionicLoading.hide();
		});

		$scope.filterdata = {};
		$scope.filterdata.catids = [];
		$rootScope.$on('filter', function(e, f){
			$scope.dishfilter = f;
      $ionicScrollDelegate.scrollTop();
		});

		$scope.$on('$ionicView.beforeEnter',function(){
			$scope.hasCart = FCcart.hasCart(); 
		});

		$scope.dishLike = function (foodid) {

			//Update Like
			var dishItem = $filter('filter')($scope.dishes, {id : foodid});
			var likeddishes;
			//Update localstore and database
			if(localStorage.getItem('dishlike')){
				likeddishes = localStorage.getItem('dishlike').split(',');
				if(likeddishes.indexOf(foodid.toString()) !== -1){
					likeddishes.splice(likeddishes.indexOf(foodid.toString()), 1);
					dataservice.dishLike(foodid,false).then(function(){
						dishItem[0].likes = String(parseInt(dishItem[0].likes) -1);
					});
				}else{					
					likeddishes.push(foodid.toString());
					dataservice.dishLike(foodid,true).then(function(){
						dishItem[0].likes = String(parseInt(dishItem[0].likes) + 1);
					});
				}
			}else{
				likeddishes = [ foodid ];
			}			
			localStorage.setItem('dishlike', likeddishes.toString());		
		};
		$scope.$on('$ionicView.enter',function(){
			if($scope.cats) {
				$ionicLoading.hide();
			}			        
		});	
}]);