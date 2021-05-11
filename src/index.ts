import './scss/app.scss';
import './scss/_overrides.scss';

import { App } from './ts/app';
import { Materialize } from './ts/materialize';

const jquery_validation = require('jquery-validation');
const jquery = require('jquery');


const mat_css  = require('materialize-css/dist/css/materialize.min.css');
const mat_js = require('materialize-css/dist/js/materialize.min');



let app = new App();
let materialize = new Materialize();

export default [app, materialize];