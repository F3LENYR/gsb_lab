import 'animate.css';
import './scss/app.scss';
import './scss/_overrides.scss';
import 'jquery-validation';

import { App } from './ts/app';
import { Materialize } from './ts/materialize';

let app = new App(new Materialize());

export default [app];