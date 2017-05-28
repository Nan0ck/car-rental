document.write("<script type='text/javascript' src='moment.js'></script>");

function  deleteSignature() {
  let svg = document.getElementsByTagName('iframe')[0].contentWindow;
  let path = svg.getSignature();

  let params = "path="+ path;
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "saveSignature.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

    }
  }
  xmlhttp.send(params);
}

function savePathServer(){
  alert("Firma Guardada");
  let svg = document.getElementsByTagName('iframe')[0].contentWindow;
  let path = svg.getSignature();

  let params = "path="+ path;
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "saveSignature.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

    }
  }
  xmlhttp.send(params);
}

function addDriverEvent(){
  if(document.getElementById('aditional').checked){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("additionalDriver").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "addDriverInfo.php", true);
    xhttp.send();
  }else{
    document.getElementById("additionalDriver").innerHTML = "";
  }

}

function addInsurance(type) {
  let totalPrice =   parseInt(document.getElementById('totalExtras').innerHTML);
  if(type == 1){
    if(document.getElementById('insurance').checked){
      document.getElementById('totalExtras').innerHTML = totalPrice + 50;
    }else{
      document.getElementById('totalExtras').innerHTML = totalPrice - 50;
    }
  } else {
    if(type == 2){
      if(document.getElementById('gps').checked){
        document.getElementById('totalExtras').innerHTML = totalPrice + 30;
      }else{
        document.getElementById('totalExtras').innerHTML = totalPrice - 30;
      }
    }else{
      if(type == 3){

        if(document.getElementById('fullTank').checked){
          document.getElementById('totalExtras').innerHTML = totalPrice + 60;
        }else{
          document.getElementById('totalExtras').innerHTML = totalPrice - 60;
        }
      }
    }
  }
}

function carByCountry() {
  //segunda alternativa a conseguir el nombre del pais -- mas simple que la segunda con la api de google
  $.getJSON("https://freegeoip.net/json/", function(data) {
    var countryName = data.country_name;
    window.location.assign("cars.php?country=" + countryName);

  });

}

function showButtons() {
  window.location.assign("modify.php");
}


function deleteBooking() {

  let xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "delete.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

      if(this.responseText == -1){
        document.getElementById('cancel').style.display = "none";
        document.getElementById('accept').style.display = "none";
        document.getElementById('s').style.display = "block";
      } else {
        console.log("entre");
        document.getElementById('cancel').style.display = "none";
        document.getElementById('accept').style.display = "none";
        document.getElementById('alert').style.display = "block";
      }
    }
  }
  xmlhttp.send();

}


function getInformation() {
  let id = document.getElementById('confNumber').value;
  let params = "id="+ id;
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "getInformation.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if(this.responseText == -1){
        document.getElementById('informationR').innerHTML = "There was No information about a booking with that ID!";
        document.getElementById('deleteButton').style.display = "none";
      } else {
        document.getElementById('informationR').innerHTML = this.responseText;
        document.getElementById('deleteButton').style.display = "block";

      }
    }
  }
  xmlhttp.send(params);
}

function searchForCars(rental,city){
  window.location.assign("carsByRental.php?rental=" + rental+ "&city=" + city);
}

function showInput() {
  let aux = document.getElementById('returnDiferentLocation').checked;
  if (aux) {  document.getElementById('returnLocation').type = "text";
} else {
  document.getElementById('returnLocation').type = "hidden";
  document.getElementById('returnLocation').value = "";
}
}

let state = 0;
function focusF() {
  if(state == 1){
    $("#overlay").fadeOut("slow");
    try {
      document.getElementById('emailDisplay').style.zIndex = "1005";
    }
    catch(err) {
    }
    state = 0;
  }else{
    $("#overlay").fadeIn("slow");
    document.getElementById('emailDisplay').style.zIndex = "50";
    state = 1;
  }
}

function focusF2() {
  if(state == 1){
    $("#overlay").fadeOut("slow");
    state = 0;
  }else{
    $("#overlay").fadeIn("slow");
    state = 1;
  }
}

function calculateDaysPrice(costPerDay){

  const pickUpDate = document.getElementById('pickUpDate').value;
  const returnDate = document.getElementById('returnDate').value;
  let pickD = moment(pickUpDate);
  let returnD = moment(returnDate);
  let days = returnD.diff(pickD, 'days');
  let totalPrice = returnD.diff(pickD, 'days') * costPerDay ;

  document.getElementById('days').innerHTML = days + " Days";
  document.getElementById('total').innerHTML = totalPrice + " US$";

}

function changeDate(){

  const pickUpDate = document.getElementById('pickUpDate');
  const returnDate = document.getElementById('returnDate');
  let dateM = new Date(moment().format('YYYY-MM-DD'));
  dateM.setDate(dateM.getDate()+2);
  let momentObj = moment(dateM);

  pickUpDate.min = momentObj.format('YYYY-MM-DD');

}

function changeReturnDate() {
  let date = new Date(document.getElementById("pickUpDate").value);
  const returnDate = document.getElementById('returnDate');
  date.setDate(date.getDate()+2);
  let momentObj = moment(date);
  returnDate.min = momentObj.format('YYYY-MM-DD');
  console.log(moment().format('YYYY-MM-DD'));
}


function getCordenates(){
  let bloc = document.getElementById("bloc");
  navigator.geolocation.getCurrentPosition(showPosition);
}

function showPosition(position) {

  showMap(position.coords.latitude, position.coords.longitude);
}


function showMap(latitude, longitude) {

  let mapOptions = {
    center: new google.maps.LatLng(latitude, longitude),
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.ROADMAP} ;
    let map = new google.maps.Map(document.getElementById("map"),mapOptions);
    console.log(latitude + "   " + longitude);

    let place = new google.maps.LatLng(latitude,longitude);
    let marker = new google.maps.Marker({
      position: place
      , title: 'La Universidad de la Habana'
      , map: map
      , });

      let popup = new google.maps.InfoWindow({
        content: 'Tu ubicacion actual'});
        popup.open(map, marker);

        //primera alternativa a conseguir el nombre del pais -- mas codigo pero consigue el adress entero ***nota***
        let geocoder = new google.maps.Geocoder;
        geocoder.geocode({
          'location': place
          // ej. "-34.653015, -58.674850"
        }, function(results, status) {
          // si la solicitud fue exitosa
          if (status === google.maps.GeocoderStatus.OK) {
            // si encontró algún resultado.
            if (results[1]) {
              console.log(results[1].formatted_address);
              bloc.innerHTML = "Actual location: <br>" +  results[3].formatted_address;
            }
          }
        });
      }
