import './scss/app.scss';
import './scss/_overrides.scss';
import 'materialize-css/dist/css/materialize.min.css';
import 'materialize-css/dist/js/materialize.min';

import { App } from 'C:/wamp64/www/src/ts/app';
import { Materialize } from './ts/materialize';

let app = new App(new Materialize());

export default app;