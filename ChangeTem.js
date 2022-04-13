function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

function setCookie(name, value, options = {}) {

    options = {
      path: '/',
      // при необходимости добавьте другие значения по умолчанию
      ...options
    };
  
    if (options.expires instanceof Date) {
      options.expires = options.expires.toUTCString();
    }
  
    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
  
    for (let optionKey in options) {
      updatedCookie += "; " + optionKey;
      let optionValue = options[optionKey];
      if (optionValue !== true) {
        updatedCookie += "=" + optionValue;
      }
    }
    document.cookie = updatedCookie;
}
function deleteCookie(name) {
  setCookie(name, "", {
    'max-age': -1
  })
}
function SetTheme()
{
  if(getCookie("theme") == undefined)
  {
    setCookie("theme", "White");
    return;
  }
  else if(getCookie("theme") == "White") 
  {
    setCookie("theme", "Black");
    ChangeTema();
  }
  else
  {
    setCookie("theme", "White");
    ChangeTema();
  }
  SetText();
}

function ChangeTema()
{
  var element = ["Black", "White"];

  if (getCookie("theme") == "White")
  {
    setCookie("theme", "Black")
    element = ["Black", "White"];
  }
  else
  {
    setCookie("theme", "White");
    element = ["White", "Black"];
  }
  document.body.classList.add(element[0]);
  document.body.classList.remove(element[1]);

  var elements = document.getElementsByTagName("section");
  for (let s of elements)
  {
    s.classList.add(element[0]+"_border");
    s.classList.remove(element[1]+"_border");
  }
  var _element = document.querySelector("form");
  _element.classList.add(element[0]+"_border");
  _element.classList.remove(element[1]+"_border");
}

function SaveText(input){
  localStorage.setItem(input.name,input.value);
}
function SetText(){
  document.reg.name.value = localStorage.getItem("name");
  document.reg.pass.value = localStorage.getItem("pass");
}
