var str = "Aucun pain bleu ici, malheureusement. keep looking tho, may find something.";
console.log(str);
console.log(getCookie("user"));
console.log(getCookie("pass"));

function redirect() {
    if (getCookie("user") !== null && getCookie("pass") !== null)
    {
        console.log("Redirect oof");
        window.location = "./api/client.php";  
    }
    else
    {
        console.log("nope");
    }
}

function chkLogin(woof, miaw) {
    $.post( "./api/yeet.php", { dog: woof, cat: miaw }, function(data) {
    console.log("au moins ta fonction chkLogin se fait caller, c'est déjà ça...");
    console.log(data);
    document.getElementById("nomd").value = "";
    document.getElementById("mdp").value = "";

    if (data == "redirect" || document.cookie)
{
    window.location = 'api/client.php';
}
});
}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
    else return null;
}

  function setCookie(name, value, options = {}) {

    options = {
      path: '/',
      // add other defaults here if necessary
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

  function deleteCookies(name) {
    console.log("no more cookies");
    setCookie(name, "", {
      'max-age': -1
    })
    window.location = '../index.html';
  }