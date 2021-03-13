export class App {

    constructor() {
        jQuery(() => {
            $("#slide-out").sidenav();
            $('.tabs').tabs();
            $('.tooltipped').tooltip();
            $('.collapsible').collapsible();
        })
    }

    public participate() {
        console.log('participate');
    }

}

console.log('test');
