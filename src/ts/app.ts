import $ from "jquery";
import { Materialize } from "./materialize";

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
            }, 250)
          });
        }, 250)
      }, 250);

    });

    /*
     *   NOTE: DOM Elements listeners, linked to jQuery validate & Ajax
     */

    $(() => {
      this.btnParticipate = $("#participate-event").on("click", () => {
        if ($("form[name='participate']").validate().checkForm()) {
          this.onParticipate(
            true,
            $("#activity-id").val()?.toString(),
            $("#name").val()?.toString(),
            $("#surname").val()?.toString()
          );
        } else {
          this.onParticipate(
            false,
            $("#activity-id").val()?.toString(),
            $("#name").val()?.toString(),
            $("#surname").val()?.toString()
          );
        }
      });
    });
  }

  public onParticipate(
    state: boolean,
    id?: string,
    name?: string,
    surname?: string
  ) {
    $.ajax({
      url: "/controllers/ActivitesController.php",
      data: {
        activity_id: id,
        name: name,
        surname: surname,
      },
      type: "post",
      success: (output) => {
        let json_output = JSON.parse(output);
        console.log(json_output);
        console.log(state);

        if (json_output.success == false && state == false) {
          this.materialize.openToast(
            "error",
            "Erreur : tous les champs ne sont pas remplis"
          );
        } 
        if (json_output.success == true && json_output.exists == false) {
          this.materialize.openToast("success", "Activité rejointe");
        }
        
        if (json_output.success == false && json_output.exists == true) {
          this.materialize.openToast("success", "Activité quittée");
        }

        // $(() => {
        //   if (output.success == true && output.exists == false) {
        //     this.materialize.openToast("success", "Activité rejointe");

        //     $("#participate-event").removeClass("blue");
        //     $("#participate-event").addClass("red");
        //     $("#participate-event").text("Quitter");
        //   } else {
        //     if (output.success == false) {
        //       this.materialize.openToast(
        //         "error",
        //         "Erreur : tous les champs ne sont pas remplis"
        //       );
        //     }
        //     $("#participate-event").removeClass("red");
        //     $("#participate-event").addClass("blue");
        //     $("#participate-event").text("Participer");
        //     this.materialize.openToast("success", "Activité quittée");
        //   }
        // });
      },
    });
  }
}
