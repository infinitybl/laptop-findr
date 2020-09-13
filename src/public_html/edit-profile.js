var sliderMin = 0;
var sliderMax = 30;
var apiKey = 'JnowHc7dLuCsqIi';
var favouritesText = ''; //STORES FAVOURITES STIRNG
var userName = document.querySelector("#profile-btn").textContent; //GET USER NAME FROM SESSION

$(document).ready(function() {

  //postToCheck();
  //when user clicks remove favourite button,
  //we remove the model id of the laptop from the 
  //favourites text (contains all modelid seperated by comma)
  /*
  document.querySelector('.laptop-card-holder').addEventListener('click', function(e) {
    if (e.target && e.target.id == "remove-favourite-btn") {
      //REMOVE model ID database the model 
      favouritesText.replace(e.target.modelID, ",");

      postToCheck();

      //update favourite laptops on screen
      showFavouriteLaptops(favouritesText);

    }
  });
  */
  
  $("#form-clear-btn").bind("click", function() {
	 document.getElementById("username").value = ''; 
	 document.getElementById("password1").value = '';
	 document.getElementById("password2").value = '';
	  
  });
  
  $(".laptop-card-holder").on("click", ".remove-favourite-btn", function() {
		console.log("yoooooooooo");
		console.log(this);
		var model = this.getAttribute("modelid");
		console.log(model);
		$.ajax({
		  type: "POST",
		  url: "../private/removeFavourites.php",
		  //send username and updated favourites variables
		  data: 'model=' + model,
		  success: function(response) {
			console.log("Success");
			document.querySelector(".laptop-card-holder").innerHTML = '';
			showFavouriteLaptops();
		  }
		});
	 
		
  });
  
  showFavouriteLaptops();
});

function showFavouriteLaptops() {

  $.post("../private/getFavourites.php", "", function(data) {
		console.log(data);
		data = JSON.parse(data);
		console.log(data["num"]);
		if (data["num"] > 0) {
			for (var i = 0; i < data["num"]; i++) {
			//generate elements for each model id to display favourite laptops
			//on screen
				$.post('https://cors-anywhere.herokuapp.com/https://noteb.com/api/webservice.php', `apikey=${apiKey}&method=get_model_info_all&param[model_id]=${data["" + i]}`, handleSingleLaptopResponse);
			}
		}
		
  });
	
  
  
}

function handleSingleLaptopResponse(jsonReturn) { 
  
  var response1 = JSON.parse(jsonReturn);
  console.log(response1);
  if (response1.code == 30) {
      //return error message, too much models found
  }
  else if (response1.code == 26) {
    var response = response1["result"];
    if (response.hasOwnProperty("0")) {
      //response = response.replace("\\\"(\\w+)\\\":", "$1:");
      console.log(response);
      response = JSON.stringify(response);
      response = response.split("\\\"").join(""); //Remove \"
      response = response.split("\\\\").join(""); //Remove \\
      response = response.split(",").join(", "); //Put spaces b/w commas
      response = JSON.parse(response);
      console.log(response);

      var elem = createNewLaptopCard();
      document.querySelector('.laptop-card-holder').appendChild(elem);
      setLaptopInfo(response["0"], elem);
    }
    
    
    
  }
  
 
}

function createNewLaptopCard() {
  var template = document.createElement('div');
  template.innerHTML = '<div class="card border-light mb-3" style="width: 18rem;"><img src="https://noteb.com/res/img/models/949_2.jpg" class="card-img-top laptop-picture" alt="..."><div class="card-body"></div><ul class="list-group list-group-flush text-dark"><li class="list-group-item text-dark laptop-name">Brand</li><li class="list-group-item text-dark laptop-price">Price</li><li class="list-group-item text-dark laptop-ram">RAM</li><li class="list-group-item text-dark laptop-disk">Disk</li><li class="list-group-item text-dark laptop-screen">Screen</li><li class="list-group-item text-dark laptop-cpu">Processor</li><li class="list-group-item text-dark laptop-os">OS</li><li class="list-group-item text-dark laptop-gpu">Video Card</li><li class="list-group-item text-dark laptop-battery-life">Battery</li></ul><div class="card-body text-dark"><a href="#" class="btn remove-favourite-btn">Remove from Favourites</a></div>';

  return template;
}

function returnSAttr(jsonObj, attrList) {
  if (typeof jsonObj[attrList[0]] === 'object') {
    return jsonObj[attrList[0]]["" + jsonObj[attrList[0]]["selected"]][attrList[1]];
  }

  return "";
  
}

function parseJSON(str) {
  try { return JSON.parse(str);  } catch(e) { return false; }
}

function setLaptopInfo(info, elem) {
  elem.querySelector(".remove-favourite-btn").setAttribute("modelid", `${info["model_info"]["0"]["id"]}`);
  elem.querySelector(".laptop-picture").setAttribute("src", `${info.model_resources.thumbnail}`);
  elem.querySelector(".laptop-name").textContent = `Name: ${info["model_info"]["0"]["name"]}`;
  elem.querySelector(".laptop-price").textContent = `Price Range: \$${info.config_price_min} - \$${info.config_price_max}`;
  elem.querySelector(".laptop-ram").textContent = `RAM: ${returnSAttr(info, ["memory", "size"])} GB, ${returnSAttr(info, ["memory", "speed"])} MHz (${returnSAttr(info, ["memory", "type"])})`;
  elem.querySelector(".laptop-disk").textContent = `Storage: ${returnSAttr(info, ["primary_storage", "model"])}, ${returnSAttr(info, ["primary_storage", "cap"])} GB (${returnSAttr(info, ["primary_storage", "read_speed"]) || 'N/A'} MB/s)`;
  elem.querySelector(".laptop-screen").textContent = `Screen: ${returnSAttr(info, ["display", "size"])}\` ${returnSAttr(info, ["display", "horizontal_resolution"])} x ${returnSAttr(info, ["display", "vertical_resolution"])}p, ${returnSAttr(info, ["display", "type"])}`;
  elem.querySelector(".laptop-cpu").textContent = `CPU: ${returnSAttr(info, ["cpu", "prod"])} ${returnSAttr(info, ["cpu", "model"])} ${returnSAttr(info, ["cpu", "cores"])} Cores (${returnSAttr(info, ["cpu", "base_speed"])} GHz)`;
  elem.querySelector(".laptop-os").textContent = `OS: ${returnSAttr(info, ["operating_system", "name"])}`;
  elem.querySelector(".laptop-gpu").textContent = `GPU: ${returnSAttr(info, ["gpu", "prod"])} ${returnSAttr(info, ["gpu", "model"])}, (${returnSAttr(info, ["gpu", "base_speed"])} MHz)`;
  elem.querySelector(".laptop-battery-life").textContent = `Battery life: ${info.battery_life_hours} hours `;
}



