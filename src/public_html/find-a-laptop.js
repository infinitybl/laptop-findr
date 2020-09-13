var sliderMin = 0;
var sliderMax = 30;
var apiKey = 'JnowHc7dLuCsqIi';
var userName;
var maxLaptopsOnPage = 9;

/*
function postToDatabase() {
  //POST to check.php
  
  $.ajax({
      type: "POST",
      url: "postToDatabase.php",
      //send username and updated favourites variables
      data: 'username='+ userName + 'favourites=' + favouritesText,
      cache: false,
      success: function(response) {
        var response_array = JSON.parse(response);
        favouritesText = response_array['favourites'];
        //update favourites from database 
      }
  });

}
*/

$(document).ready(function() {

  $("#slider-range").slider({
      range: true,
      min: 0,
      max: 30,
      values: [0, 30],
      slide: function (event, ui) {
          $("#amount").val(ui.values[0] + " - " + ui.values[1]);
          sliderMin = ui.values[0];
          sliderMax = ui.values[1];
      }
    });
  
  $("#amount").val($("#slider-range").slider("values", 0) + " - " + $("#slider-range").slider("values", 1));

  /*
  var mySwiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 5,
    slidesPerGroup: 5,
    spaceBetween: 50,
    // loopAdditionalSlides: 0,
    loopFillGroupWithBlank: true,
    centeredSlides: true,
    slideToClickedSlide: true,
    // watchOverflow: true,
    // updateOnWindowResize: true,


    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
  });
  */
	$(".laptop-search-btn").bind( "click", postToAPIServer);
	
	document.querySelector(".laptop-search-bar").addEventListener("keyup", function(event) {
		// Number 13 is the "Enter" key on the keyboard
		if (event.keyCode === 13) {
			// Cancel the default action, if needed
			//event.preventDefault();
			
			postToAPIServer();
		 }
	});

	$(".laptop-card-holder").on("click", ".add-favourite-btn", function() {
		$(this).addClass("disabled");
        var model = this.getAttribute("modelid");
		$.ajax({
		  type: "POST",
		  url: "../private/addFavourites.php",
		  //send username and updated favourites variables
		  data: 'model=' + model,
		  success: function(response) {
			console.log("Success");
		  }
	  });
	  
	  /*
        $.ajax({
          type     : 'POST',
          url      : 'postFavourites.php',
          data     : '$name='+ postName,
          complete : function(data) {
              if(_this.siblings('.favourite'))
              {
                _this.html('<img src="add2.png" />');
              }
              else
              {
                _this.html('<img src="add1.png />');
              }
            }
        });
		*/
		 
	});
/*
  document.querySelector('.laptop-card-holder').addEventListener('click', function(e) {
    if (e.target && e.target.id == "add-favourite-btn") {
      //REMOVE model ID database the model 
      
      if (favouritesText != '') {
        favouritesText += ("," + e.target.modelID);
      }
      else {
        favouritesText += e.target.modelID;
      }
      
	  console.log("yoooo");
      var _this = $(this);
        var postid = _this.data('$postid');
        $.ajax({
          type     : 'POST',
          url      : 'postFavourites.php',
          dataType : 'json',
          data     : '$postid='+ postid,
          complete : function(data) {
              if(_this.siblings('.favourite'))
              {
                _this.html('<img src="add2.png" />');
              }
              else
              {
                _this.html('<img src="add1.png />');
              }
            }
        });

    }
	
  });
 */

  /*
  $.ajax({
      type: 'POST',
      url: 'https://cors-anywhere.herokuapp.com/https://noteb.com/api/webservice.php',
      async: true,
      dataType : 'json',   //you may use jsonp for cross origin request
      crossDomain: true

      
  });
  */
  /*
  
  $.post('https://cors-anywhere.herokuapp.com/https://noteb.com/api/webservice.php', 'apikey=JnowHc7dLuCsqIi&method=get_model_info&param[model_id]=1175',
  handleResponse);
  */
});


/*

*/


function titleCase(str) {
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       // You do not need to check if i is larger than splitStr length, as your for does that for you
       // Assign it back to the array
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   // Directly return the joined string
   return splitStr.join(' '); 
}


function postToAPIServer() {
  
  var modelName = document.querySelector(".laptop-search-bar").value;

  var cpuSelect = document.getElementById("cpuInputGroupSelect");
  var cpu = cpuSelect.options[cpuSelect.selectedIndex].text;
  
  console.log(cpu);

  var dTypeSelect = document.getElementById("dTypeInputGroupSelect");
  var dType = dTypeSelect.options[dTypeSelect.selectedIndex].text;
  
  console.log(dType);

  var gpuSelect = document.getElementById("gpuInputGroupSelect");
  var gpu = gpuSelect.options[gpuSelect.selectedIndex].text;
  
  console.log(gpu);

  var minRamSelect = document.getElementById("minRamInputGroupSelect");
  var minRam = minRamSelect.options[minRamSelect.selectedIndex].text;
  
  console.log(minRam);

  var minHDDSelect = document.getElementById("minHDDInputGroupSelect");
  var minHDD = minHDDSelect.options[minHDDSelect.selectedIndex].text;

  var osSelect = document.getElementById("osInputGroupSelect");
  var os = osSelect.options[osSelect.selectedIndex].text;
  
  console.log(os);

  var sTypeSelect = document.getElementById("sTypeInputGroupSelect");
  var sType = sTypeSelect.options[sTypeSelect.selectedIndex].text;
  
  console.log(sType);
  /*
  var priceRange = document.querySelector(".price-range-slider").value;

  var ram = document.querySelector(".price-range-slider").value;
  */

  
  $.post('https://cors-anywhere.herokuapp.com/https://noteb.com/api/webservice.php', `apikey=${apiKey}&method=list_models&param[model_name]=${titleCase(modelName)}&param[display_size_min]=${sliderMin}&param[display_size_max]=${sliderMax}&param[display_type]=${dType}&param[cpu_name]=${cpu}&param[gpu_name]=${gpu}&param[min_mem]=${minRam}&param[storage_cap]=${minHDD}&param[opsist]=${os}&param[first_hdd_type]=${sType}`,
  handleResponse);
}

function handleResponse(jsonReturn) {
  // console.log(jsonReturn);
  var response1 = JSON.parse(jsonReturn);
  console.log(response1);
  if (response1.code == 30) {
      //return error message, too much models found
  }
  else if (response1.code == 26) {
    document.querySelector('.laptop-card-holder').innerHTML = '';
    var response = response1["result"];
     
    console.log(response);  //-----Het
    response = JSON.stringify(response);
    response = response.split("\\\"").join(""); //Remove \"
    response = response.split("\\\\").join(""); //Remove \\
    response = response.split(",").join(", "); //Put spaces b/w commas
    response = JSON.parse(response);
    var i = 0;
    var ogResponse = response;
    while (response.hasOwnProperty("" + i) && i < maxLaptopsOnPage) {
        //response = response.replace("\\\"(\\w+)\\\":", "$1:");
      response = response["" + i];
      $.post('https://cors-anywhere.herokuapp.com/https://noteb.com/api/webservice.php', `apikey=${apiKey}&method=get_model_info_all&param[model_id]=${"" + response["model_info"]["0"]["id"]}`, handleSingleLaptopResponse);
      i++;
      response = ogResponse;
    }
    
    
  }
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
  
  

  /*
   Object.keys(response).forEach(function(key) {
     if (typeof response[key] === 'object') {
          console.table("Key: " + key + ", Value: " + cleanJSON(response[key]));
     }
     else {
       console.table("Key: " + key + ", Value: " + response[key]);
     }
    });
  */
  
  
 
}

function createNewLaptopCard() {
  var template = document.createElement('div');
  template.innerHTML = '<div class="card border-light mb-3" style="width: 18rem;"><img src="https://noteb.com/res/img/models/949_2.jpg" class="card-img-top laptop-picture" alt="..."><div class="card-body"></div><ul class="list-group list-group-flush text-dark"><li class="list-group-item text-dark laptop-name">Brand</li><li class="list-group-item text-dark laptop-price">Price</li><li class="list-group-item text-dark laptop-ram">RAM</li><li class="list-group-item text-dark laptop-disk">Disk</li><li class="list-group-item text-dark laptop-screen">Screen</li><li class="list-group-item text-dark laptop-cpu">Processor</li><li class="list-group-item text-dark laptop-os">OS</li><li class="list-group-item text-dark laptop-gpu">Video Card</li><li class="list-group-item text-dark laptop-battery-life">Battery</li></ul><div class="card-body text-dark"><a href="#" class="btn add-favourite-btn">Add to Favourites</a></div>';

  return template;
}

function setLaptopInfo(info, elem) {
  elem.querySelector(".add-favourite-btn").setAttribute("modelid", "" + `${info["model_info"]["0"]["id"]}`);
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


function returnSAttr(jsonObj, attrList) {
  if (typeof jsonObj[attrList[0]] === 'object') {
    return jsonObj[attrList[0]]["" + jsonObj[attrList[0]]["selected"]][attrList[1]];
  }

  return "";
  
}

function getKeyValueJson(obj, html) {
  $.each(obj, function(key, value) {
    
    value = parseJSON(value) || value;
    
    if (value == null) {
      return
    }
    console.log(typeof value);
    if (typeof value == 'object') {
      html += getKeyValueJson(value, html);
    } else {
      html += '<label>' + key + '</label> :-  <label>' + value + '</label><br>';
    }
  });
  return html;
}

function parseJSON(str) {
  try { return JSON.parse(str);  } catch(e) { return false; }
}

/*
window.addEventListener('load', init);


function getData(url, objClass)
{
  var httpReq = null;

  if (window.XMLHttpRequest)
    httpReq = new XMLHttpRequest();
  else if (window.ActiveXObject)
    httpReq = new ActiveXObject("Microsoft.XMLHTTP");
  else
    return false;

  httpReq.onreadystatechange = function()
  {
    var obj = document.querySelector(objClass);
    //obj.innerHTML = httpReq.responseText;
    console.log(httpReq.responseText);
    alert(httpReq.responseText);
  }
  
  httpReq.open('POST', url, true);
  httpReq.send("apikey=JnowHc7dLuCsqIi&method=get_model_info&param[model_id]=1175");
  
}
*/

/*
function init() {
  
  getData('https://cors-anywhere.herokuapp.com/https://noteb.com/api/webservice.php', '.data');

}
*/


// const inputField = document.querySelector('.chosen-value');
// const dropdown = document.querySelector('.value-list');
// const dropdownArray = [... document.querySelectorAll('li')];
// console.log(typeof dropdownArray)
// dropdown.classList.add('open');
// inputField.focus(); // Demo purposes only
// let valueArray = [];
// dropdownArray.forEach(item => {
//   valueArray.push(item.textContent);
// });

// const closeDropdown = () => {
//   dropdown.classList.remove('open');
// }

// inputField.addEventListener('input', () => {
//   dropdown.classList.add('open');
//   let inputValue = inputField.value.toLowerCase();
//   let valueSubstring;
//   if (inputValue.length > 0) {
//     for (let j = 0; j < valueArray.length; j++) {
//       if (!(inputValue.substring(0, inputValue.length) === valueArray[j].substring(0, inputValue.length).toLowerCase())) {
//         dropdownArray[j].classList.add('closed');
//       } else {
//         dropdownArray[j].classList.remove('closed');
//       }
//     }
//   } else {
//     for (let i = 0; i < dropdownArray.length; i++) {
//       dropdownArray[i].classList.remove('closed');
//     }
//   }
// });

// dropdownArray.forEach(item => {
//   item.addEventListener('click', (evt) => {
//     inputField.value = item.textContent;
//     dropdownArray.forEach(dropdown => {
//       dropdown.classList.add('closed');
//     });
//   });
// })

// inputField.addEventListener('focus', () => {
//    inputField.placeholder = 'Type to filter';
//    dropdown.classList.add('open');
//    dropdownArray.forEach(dropdown => {
//      dropdown.classList.remove('closed');
//    });
// });

// inputField.addEventListener('blur', () => {
//    inputField.placeholder = 'Select state';
//   dropdown.classList.remove('open');
// });

// document.addEventListener('click', (evt) => {
//   const isDropdown = dropdown.contains(evt.target);
//   const isInput = inputField.contains(evt.target);
//   if (!isDropdown && !isInput) {
//     dropdown.classList.remove('open');
//   }
// });

