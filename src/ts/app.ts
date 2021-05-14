import $ from "jquery";
import { Materialize } from "./materialize";

export class App {
  public btnParticipate!: JQuery<HTMLElement>;
  public btnLogin!: JQuery<HTMLElement>;
  public btnTogglePswdVisibility!: JQuery<HTMLElement>;
  public participateForm!: JQuery<HTMLElement>;

  constructor(public materialize?: any) {
    /*
     *   NOTE: DOM Elements listeners
     */
    $("#loader").each((i, e) => {
      setTimeout(() => {
        $(e).addClass("hidden");
        $("#wait-loader").each((i, e) => {
          $(e).removeClass("hidden");
        });
      }, 2000);
    });

    $(() => {
      this.btnParticipate = $("#participate-event").on("click", () => {
        console.log("participate");
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
        console.log(output);
        console.log(state);

        // TODO: AJAX request
        $(() => {
          if (output.success == false) {
            this.materialize.openToast(
              "error",
              "Erreur : tous les champs ne sont pas remplis"
            );
          }

          if (output.success == true && output.exists == false) {
            this.materialize.openToast("success", "Activité rejointe");

            $("#participate-event").removeClass("blue");
            $("#participate-event").addClass("red");
            $("#participate-event").text("Quitter");
          } else {
            $("#participate-event").removeClass("red");
            $("#participate-event").addClass("blue");
            $("#participate-event").text("Participer");
            this.materialize.openToast("success", "Activité quittée");
          }
        });
      },
    });
  }
}
