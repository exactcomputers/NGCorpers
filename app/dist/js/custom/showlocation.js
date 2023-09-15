let mapElement = "map";
let address = "Ikeja Allen Avenue, Lagos";
geocoder = new google.maps.Geocoder();
geocoder.geocode({ address: address }, function (results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
    var mapOptions = {
      zoom: 17,
      center: results[0].geometry.location,
      disableDefaultUI: true,
    };
    var map = new google.maps.Map(
      document.getElementById(mapElement),
      mapOptions
    );
    var marker = new google.maps.Marker({
      map,
      position: results[0].geometry.location,
    });
  } else {
    console.log(status);
    $("#error").html(
      "Geocode was not successful for the following reason: " + status
    );
  }
});
