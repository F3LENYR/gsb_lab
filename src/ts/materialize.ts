export class Materialize {
  constructor() {
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('#slide-out');
      var instances = M.Sidenav.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.tabs');
      var instances = M.Tabs.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.tooltipped');
      var instances = M.Tooltip.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.collapsible');
      var instances = M.Collapsible.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.carousel');
      var instances = M.Carousel.init(elems, {
        fullWidth: true,
        indicators: true
      });
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
