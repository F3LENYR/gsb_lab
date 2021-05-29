import $ from "jquery";

export class App {
  public btnParticipate!: JQuery<HTMLElement>;
  public btnLogin!: JQuery<HTMLElement>;
  public btnTogglePswdVisibility!: JQuery<HTMLElement>;
  public participateForm!: JQuery<HTMLElement>;

  constructor(public materialize?: any) {
    /*
     *  App essentials
     */

    // Simulate a loader of 750ms
    $("#loader").each((i, e1) => {
      setTimeout(() => {
        $(e1).addClass("scale-out").addClass("hidden");
        setTimeout(() => {
          $("#wait-loader").each((i, e) => {
            $(e).removeClass("hidden");
            $(e).removeAttr("style");
            $(e).children().removeAttr("style");
            setTimeout(() => {
              $(e).removeClass("scale-out");
            }, 250);
          });
        }, 250);
      }, 250);
    });

    /*
     *   NOTE: DOM Elements listeners, linked to jQuery validate & Ajax
     */

    $(() => {
      this.btnParticipate = $("#participate-event").on("click", () => {
        let name: any = $("#name").val()?.toString();
        let surname: any = $("#surname").val()?.toString();
        if (
          name?.length > 0 &&
          surname?.length > 0 &&
          $("form[name='participate']").validate().checkForm()
        ) {
          this.onParticipate(
            $("#activity-id").val()?.toString(),
            name,
            surname
          );
        } else {
          this.materialize.openToast(
            "error",
            "Erreur : tous les champs ne sont pas remplis"
          );
        }
      });
    });
  }

  public onParticipate(id?: string, name?: string, surname?: string) {
    $.ajax({
      url: "/controllers/ActivitesController.php",
      data: {
        state: true,
        activity_id: id,
        name: name,
        surname: surname,
      },
      type: "post",
      success: (output) => {
        let json_output = JSON.parse(output);
        if (json_output.added == true) {
          $("#participate-event").removeClass("red");
          $("#participate-event").addClass("blue");
          $("#participate-event").text("Participer");
          this.materialize.openToast("success", "Activité quittée");
        } else {
          $("#participate-event").removeClass("blue");
          $("#participate-event").addClass("red");
          $("#participate-event").text("Quitter");
          this.materialize.openToast("success", "Activité rejointe");
        }
      },
    });
  }
}
