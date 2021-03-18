import jQuery from "jquery";
import { Materialize } from "./materialize";

export class App {
  public btnParticipate!: JQuery<HTMLElement>;
  public btnLogin!: JQuery<HTMLElement>;
  public btnTogglePswdVisibility!: JQuery<HTMLElement>;
  public participateForm!: JQuery<HTMLElement>;

  constructor(public materialize: Materialize) {
    /*
     *   NOTE: DOM Elements listeners
     */
    jQuery(() => {
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
      //   // this.btnParticipate = $("#participate-event").on("click", () => {
      //   //   if ($("#participate-event").text() == "Participer") {
      //   //     this.onParticipate(true);
      //   //   } else {
      //   //     this.onParticipate(false);
      //   //   }
      //   // });

      //   // TODO
      //   this.participateForm = $("form[name='participate']").on("submit", () => {
      //     if ($("#name").val() && $("#surname").val()) {
      //       $("#participate-event").attr('disabled', '');
      //     } else {
      //       $("#participate-event").attr('disabled', 'true');
      //     }
      //   })
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
        jQuery(() => {
          if (state == true) {
            this.materialize.openToast("success", "Activité rejointe");
          } else {
            this.materialize.openToast(
              "error",
              "Erreur : tous les champs ne sont pas remplis"
            );
          }
          //   $("#participate-event").removeClass("blue");
          //   $("#participate-event").addClass("red");
          //   $("#participate-event").text("Quitter");
          // } else {
          //   $("#participate-event").removeClass("red");
          //   $("#participate-event").addClass("blue");
          //   $("#participate-event").text("Participer");
          //   this.materialize.openToast("success", "Activité quittée");
          // }
        });
      },
    });
  }

  // public onLogin(e: JQuery.SubmitEvent<HTMLElement>) {
  //   console.log("login");

  //   // TODO: ajax
  //   e.preventDefault();
  //   $.post(
  //     '/controllers/LoginController.php',
  //     {
  //       email: $("#input-email").val(),
  //       password: $("#input-password").val(),
  //     },
  //     (resp) => {
  //         console.log(resp);

  //     },
  //     "json"
  //   );
  // }
}
