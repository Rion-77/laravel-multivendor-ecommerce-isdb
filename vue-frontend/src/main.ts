import { createApp } from "vue";
import * as bootstrap from "bootstrap";
import jQuery from "jquery";
import PerfectScrollbar from "perfect-scrollbar";
import "./assets/vendor/fonts/boxicons.css";
import "./assets/vendor/css/core.css";
import "./assets/vendor/css/theme-default.css";
import "./assets/css/demo.css";
import "./assets/css/multivendor.css";
import "perfect-scrollbar/css/perfect-scrollbar.css";
import "apexcharts/dist/apexcharts.css";
import App from "./App.vue";
import { router } from "./router/routes.ts";

declare global {
  interface Window {
    $: typeof jQuery;
    jQuery: typeof jQuery;
    bootstrap: typeof bootstrap;
    PerfectScrollbar: typeof PerfectScrollbar;
  }
}

Object.assign(window, {
  $: jQuery,
  jQuery,
  bootstrap,
  PerfectScrollbar,
});

createApp(App).use(router).mount("#app");

async function initializeTemplateScripts() {
  await import("./assets/vendor/js/helpers.js");
  await import("./assets/vendor/js/menu.js");
  await import("./assets/js/main.js");
  await import("./assets/js/multivendor.js");
}

void initializeTemplateScripts();
