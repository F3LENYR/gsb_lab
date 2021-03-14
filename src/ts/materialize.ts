export class Materialize {

    constructor() {

        jQuery(() => {
            /*
            *   Materialize init components
            */
            $("#slide-out").sidenav();
            $('.tabs').tabs();
            $('.tooltipped').tooltip();
            $('.collapsible').collapsible();
        })

    }

    public openToast(type: string, html: string) {
        if (type == 'success') {
            let toast = M.toast({
                html: `
                <div>
                <i class="material-icons" style="color:#4caf50;margin-right:5px">check_circle</i>
                </div>
                <div style="width:100%"><p>` + html + '</p></div>',
                displayLength: 40000
            });
        }
        if (type == 'error') {
            M.toast({
                html: `<i class="material-icons" style="color:#f44336;margin-right:5px">error</i> ` + html,
                displayLength: 10000
            });
        }
    }

}