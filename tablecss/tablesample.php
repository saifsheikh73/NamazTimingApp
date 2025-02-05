<html lang="en" ng-app="StarterApp">
	<head>
	<link rel="stylesheet" type="text/css" href="tablecss/table.css">
	<script src="tablecss/tab.js"></script>
	</head>
  <body layout="column" ng-controller="AppCtrl">
    <div class="main-fab">
      <md-button class="md-fab md-accent">+</md-button>
    </div>
    <md-toolbar class="md-tall" layout="column"><span flex="flex"></span>
      <div class="md-toolbar-tools">
        <div class="fill-height" layout="row" flex="flex">
          <div class="md-toolbar-item md-breadcrumb" ng-hide="toggleSearch"><span ng-click="toggleSearch = !toggleSearch">Angular Material Table</span></div><span flex="flex" ng-hide="toggleSearch"></span>
          <md-input-container flex="flex" style="padding-left:88px;" ng-show="toggleSearch">
            <input id="searchinput" type="text" ng-model="search" show-focus="toggleSearch"/>
          </md-input-container>
          <div class="md-toolbar-item md-tools" layout="row"><a class="md-button md-default-theme" href="#" ng-click="toggleSearch = !toggleSearch"><i class="ion-android-search"></i></a></div>
        </div>
      </div>
    </md-toolbar>
    <md-content layout="column" flex="flex" ng-click="toggleSearch=false">
      <md-table headers="headers" content="content" sortable="sortable" filters="search" custom-class="custom" thumbs="thumbs" count="count"></md-table>
    </md-content>
  
<!-- md-table jade template-->
<div id="md-table-template" ng-hide="true">
  <table class="md-table" md-colresize="md-colresize">
    <thead>
      <tr class="md-table-headers-row">
        <th class="md-table-header" ng-repeat="h in headers"><a href="#" ng-if="handleSort(h.field)" ng-click="reverse=!reverse;order(h.field,reverse)">{{h.name}} <i class="ion-android-arrow-dropup" ng-show="reverse &amp;&amp; h.field == predicate"></i><i class="ion-android-arrow-dropdown" ng-show="!reverse &amp;&amp; h.field == predicate"></i></a><span ng-if="!handleSort(h.field)">{{h.name}}</span></th>
        <th class="md-table-header"></th>
      </tr>
    </thead>
    <tbody>
      <tr class="md-table-content-row" ng-repeat="c in content | filter:filters | startFrom:tablePage*count | limitTo: count">
        <td>
          <div class="md-table-thumbs" ng-repeat="h in headers" ng-if="h.field == thumbs">
            <div style="background-image:url({{c.thumb}})"></div>
          </div>
        </td>
        <td class="md-table-content" ng-repeat="h in headers" ng-class="customClass[h.field]" ng-if="h.field != thumbs">{{(h.field.indexOf('date') > 0) ? $filter('date')(c[h.field]) : c[h.field];}}</td>
        <td class="md-table-td-more">
          <md-button aria-label="Info"><i class="ion-android-more-vertical"></i></md-button>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="md-table-footer" layout="row"><span class="md-table-count-info">Rows per page : <a href="#" ng-click="goToPage(0); count=10">10</a>,<a href="#" ng-click="goToPage(0); count=25">25</a>,<a href="#" ng-click="goToPage(0); count=50">50</a>,<a href="#" ng-click="goToPage(0); count=100">100</a>(current is {{count}})</span><span flex="flex"></span><span ng-show="nbOfPages() &gt; 1">
      <md-button class="md-primary md-hue-2" ng-disabled="tablePage==0" ng-click="tablePage=tablePage-1" aria-label="Previous Page"><i class="ion-chevron-left" style="font-size:16px;"></i></md-button><a href="#" ng-repeat="i in getNumber(nbOfPages()) track by $index">
        <md-button class="md-primary md-hue-2 md-table-footer-item" ng-click="goToPage($index)"><span ng-class="{ 'md-table-active-page': tablePage==$index}">{{$index+1}}</span></md-button></a>
      <md-button class="md-primary md-hue-2" ng-disabled="tablePage==nbOfPages()-1" ng-click="tablePage=tablePage+1" aria-label="Next Page"><i class="ion-chevron-right" style="font-size:16px;"></i></md-button></span></div>
</div></body>
</html>