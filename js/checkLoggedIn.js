function loggedIn() {
   if (getCookie("user") != "notlogged") {
      document.querySelector("#login").href = "#";
      document.querySelector("#login").innerHTML = "Logout";
      document.querySelector("#login").id = "logout";
  }
}