import "./bootstrap";
//import * as bootstrap from "bootstrap";   // ✅ ADD THIS
import "@tabler/core/dist/js/tabler.min.js";

import Alpine from "alpinejs";

window.Alpine = Alpine;
//window.bootstrap = bootstrap;  // ✅ VERY IMPORTANT

Alpine.start();
