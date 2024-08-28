window.addEventListener("load", function () {
  //store tabs variable

  var tab = this.document.querySelectorAll("ul.nav-tab > li");

  for (let i = 0; i < tab.length; i++) {
    tab[i].addEventListener("click", switchTab);
  }

  function switchTab(event) {
     document.querySelector("ul.nav-tab li.active").classList.remove("active");
     document.querySelector(".tab-pane.active").classList.remove("active");

      var clickedTab = event.currentTarget;

      clickedTab.preventDefault();
      clickedTab.classList.add("active");
      
  }
});
