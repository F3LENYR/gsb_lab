export class Materialize {
  
  constructor() {
    document.addEventListener("DOMContentLoaded", () => {
      let sidenav = document.querySelectorAll("#slide-out");
      M.Sidenav.init(sidenav);
      let tabs = document.querySelectorAll(".tabs");
      M.Tabs.init(tabs);
      let tooltips = document.querySelectorAll(".tooltipped");
      M.Tooltip.init(tooltips);
      let collapse = document.querySelectorAll(".collapsible");
      M.Collapsible.init(collapse);
      let carousel = document.querySelectorAll(".carousel");
      M.Carousel.init(carousel, {
        fullWidth: true,
        indicators: true,
      });
      let select = document.querySelectorAll("select");
      M.FormSelect.init(select);
    });
  }

  public openToast(type: string, html: string) {
    if (type == "success") {
      let toast = M.toast({
        html:
          `<div>
                <i class="material-icons" style="color:#4caf50;margin-right:5px">check_circle</i>
                </div>
                <div style="width:100%"><p>` +
          html +
          "</p></div>",
        displayLength: 40000,
      });
    }
    if (type == "error") {
      M.toast({
        html:
          `<div><i class="material-icons" style="color:#f44336;margin-right:5px">error</i></div>
                <div style="width:100%"><p>` +
          html +
          "</p></div>",
        displayLength: 10000,
      });
    }
  }
}
