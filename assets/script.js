window.addEventListener("load", function () {
  //store tabs variable

  let tab = this.document.querySelectorAll("ul.nav-tab > li");

  for (let i = 0; i < tab.length; i++) 
   {
     tab[i].addEventListener("click", switchTab);
    }

  function switchTab(event) {
    event.preventDefault();
    document.querySelector("ul.nav-tab li.active").classList.remove("active");
    document.querySelector(".tab-pane.active").classList.remove("active");

     let clickedTab = event.currentTarget;
     let anchor = event.target;
     let activePaneID = anchor.getAttribute("href");

    clickedTab.classList.add("active");
    document.querySelector(activePaneID).classList.add("active");
  }
}
);
