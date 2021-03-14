import { Materialize } from './materialize';

export class App {

    public btnParticipate!: JQuery<HTMLElement>;
    public btnLogin!: JQuery<HTMLElement>;
    public btnTogglePswdVisibility!: JQuery<HTMLElement>;
    public loginForm!: JQuery<HTMLElement>;

    constructor(public materialize: Materialize) {
        /*
        *   NOTE: DOM Elements listeners
        */
        jQuery(() => {
            this.btnParticipate = $('#participate-event').on('click', () => {
                if ($('#participate-event').text() == 'Participer') {
                    this.onParticipate(true);
                } else {
                    this.onParticipate(false);
                }
            });
            // TODO
            this.loginForm = $('#loginForm').on('submit', (e) => this.onLogin(e));
        })
    }

    public onParticipate(state: boolean) {
        $.ajax({
            url: window.location.href,
            data: {
                isParticipating: state
            },
            type: 'post',
            success: (output) => {
                console.log(state);

                // TODO: AJAX request
                jQuery(() => {
                    if (state == true) {
                        $('#participate-event').removeClass('blue');
                        $('#participate-event').addClass('red');
                        $('#participate-event').text('Quitter');
                        this.materialize.openToast("success", "Activité rejointe");
                    } else {
                        $('#participate-event').removeClass('red');
                        $('#participate-event').addClass('blue');
                        $('#participate-event').text('Participer');
                        this.materialize.openToast("success", "Activité quittée");
                    }
                })
            }
        });
    }

    public onLogin(e: JQuery.SubmitEvent<HTMLElement>) {
        console.log('login');
        // TODO: ajax
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            type: 'post',
            url: '/controllers/LoginController.php',
            data: {
                loginForm: {
                    username: 'test',
                    password: 'test'
                }
            },
            success: (output) => {
                console.log(output);
            },
            error: (error) => {
                console.log(error);
            }
        });
    }

}