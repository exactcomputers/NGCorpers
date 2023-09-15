jQuery(document).ready(function () {
  $("#vmap").vectorMap({
    map: "nigeria_en",
    backgroundColor: "#a5bfdd",
    borderColor: "#818181",
    borderOpacity: 0.25,
    borderWidth: 1,
    color: "#f4f3f0",
    enableZoom: true,
    hoverColor: "#c9dfaf",
    hoverOpacity: null,
    normalizeFunction: "linear",
    scaleColors: ["#b6d6ff", "#005ace"],
    selectedColor: "#c9dfaf",
    selectedRegions: null,
    showTooltip: true,
    showLabels: true,
    onResize: function (element, width, height) {
      console.log("Map Size: " + width + "x" + height);
    },
    onRegionClick: function (element, code, region) {
      // var regionName = vmap.getRegionName(code);
      var message =
        'You clicked "' +
        region +
        '" which has the code: ' +
        code.toUpperCase();
      // console.log(message);
      resourcesData(code);
    },
  });
});

const resourcesData = async (code) => {
  try {
    if (code !== "") {
      const response = await fetch(
        basePath("pages/resources") + "?code=" + code
      );
      const data = await response.json();
      if (data !== "") {
        $("#state-title").html(data.state + " State");
        $("#content").html(data.content);
        $("#modal-state").modal("show");
      }
    }
  } catch (error) {
    console.error(error);
  }
};

const allStates = async () => {
  try {
    const response = await fetch(basePath("pages/resources"));
    const data = await response.json();
    if (data !== "") {
      const ol = document.getElementById("all-states");
      for (let i = 0; i < data.length; i++) {
        var li = document.createElement("li");
        var a = document.createElement("a");
        a.setAttribute("href", "javascript:;");
        a.setAttribute("class", "stateName");
        a.setAttribute("data-id", data[i].id);
        ol.appendChild(li);
        li.appendChild(a);
        a.innerText = data[i].id + ". " + data[i].state;
        li.style.display = "inline-block";
        li.style.fontWeight = "bolder";
      }
      let stateNames = document.querySelectorAll(".stateName");
      if (stateNames) {
        stateNames.forEach((stateName) => {
          stateName.addEventListener("click", () => {
            var dataID = stateName.getAttribute("data-id");
            resourcesData(dataID);
          });
        });
      }
    }
  } catch (error) {
    console.error(error);
  }
};
allStates();

var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 10000,
};

var showError = (err) => {
  console.warn(`ERROR(${err.code}): ${err.message}`);
};

var initMap = () => {
  const map = new google.maps.Map(document.getElementById("gmap"), {
    zoom: 8,
    center: { lat: 6.5244, lng: 3.3792 },
  });
  const geocoder = new google.maps.Geocoder();
  const infowindow = new google.maps.InfoWindow();
  geocodeLatLng(geocoder, map, infowindow);
};

var geocodeLatLng = (geocoder, map, infowindow) => {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      const latlng = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,
      };
      console.log(latlng);
      geocoder.geocode({ location: latlng }, (results, status) => {
        if (status === "OK") {
          if (results[0]) {
            map.setZoom(11);
            const marker = new google.maps.Marker({
              position: latlng,
              map: map,
            });
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          } else {
            toastr.error("No results found", "Error", { timeOut: 2000 });
            console.log("No results found");
          }
        } else {
          toastr.error("Geocoder failed due to: " + status, "Error", {
            timeOut: 2000,
          });
          console.log("Geocoder failed due to: " + status);
        }
      });
    }, showError);
  }
};
