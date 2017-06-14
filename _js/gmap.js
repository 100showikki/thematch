//マップの初期設定
var currentWindow = null;
function initialize() {

//マップの中心座標
  var myLatLng = new google.maps.LatLng(43.059135, 141.358093);


//マップの設定オプション
  var myOptions = {
    zoom: 16,
    center: myLatLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  scrollwheel: false
  };
  map = new google.maps.Map(document.getElementById("map"), myOptions);

  /* ★マーカーオブジェクト */
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map
  });

//マップのスタイル調整
  var samplestyle = [
    {
      "stylers": [
        { "saturation": -100 },
        { "gamma": 0.98 }
      ]
    }
  ];
  var samplestyleOptions = {
    name: "シンプル"
  };
  var sampleMapType = new google.maps.StyledMapType(samplestyle, samplestyleOptions);
  map.mapTypes.set('simple', sampleMapType);
  map.setMapTypeId('simple');

}

//マップの呼び出し
google.maps.event.addDomListener(window, 'load', initialize);

