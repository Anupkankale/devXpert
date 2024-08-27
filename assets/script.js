window.addEventListener("load", function () {
  //store tabs variable

  var tabs = this.document.querySelectorAll("ul.nav-tabs > li");

  for (i = 0; i < tabs.length; i++) {
    tab[i].addEventListener("click", switchTab);
  }

  function switchTab(event) {
    console.log(event);
  }
});
