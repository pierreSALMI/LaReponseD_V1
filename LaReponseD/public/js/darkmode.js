/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/darkmode.js":
/*!**********************************!*\
  !*** ./resources/js/darkmode.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Arrays of strings for the date display
var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; // Get the DOM elements

var dateDisplay = document.getElementById('date');
var hourHand = document.getElementById('hour-hand');
var minuteHand = document.getElementById('minute-hand');
var secondHand = document.getElementById('second-hand');
var digitalTime = document.getElementById('digital-time');
var darkMode = localStorage.getItem('darkmode'); // console.log(darkMode);

if (darkMode == 'yes') {
  document.body.classList.add('dark');
  document.getElementById('dark-mode-toggle').checked = 'true';
} // Dark mode toggle


document.getElementById('dark-mode-toggle').addEventListener('change', function () {
  document.body.classList.toggle('dark');

  if (darkMode == 'no') {
    darkMode = 'yes';
  } else {
    darkMode = 'no';
  }

  localStorage.setItem('darkmode', darkMode);
}); // Initialise second hand

var timeNow = new Date();
var seconds = timeNow.getSeconds();
var sRot = seconds * 6 - 96; // Get and display the time

var clock = function clock() {
  var timeNow = new Date(); // DEBUG: new Date(year, month, day, hours, minutes, seconds)
  // timeNow = new Date(2019,7,21,18,22,41);
  // DEBUG end
  // Display the date

  var day = timeNow.getDay();
  var date = timeNow.getDate();
  var month = timeNow.getMonth();
  dateDisplay.innerHTML = "".concat(days[day], ", ").concat(format(date), " ").concat(months[month]); // Each second is 6 degrees of arc.
  // Second hand moves in discrete steps

  var seconds = timeNow.getSeconds(); // let sRot = seconds * 6 - 90;

  sRot = sRot + 6; // Each minute is 6 degrees of arc. 
  // Add seconds/10 for smooth movement of minute hand

  var minutes = timeNow.getMinutes();
  var mRot = minutes * 6 + seconds / 10 - 90; // Each hour is 30 degrees of arc. 
  // Add minutes/2 for smooth movement of hour hand

  var hours = timeNow.getHours();
  var hRot = hours % 12 * 30 + minutes / 2 - 90; // Position the hands

  hourHand.style.transform = "rotate(".concat(hRot, "deg)");
  minuteHand.style.transform = "rotate(".concat(mRot, "deg)");
  secondHand.style.transform = "rotate(".concat(sRot, "deg)"); // Display the digital clock

  digitalTime.innerHTML = "".concat(format(hours), ":").concat(format(minutes), ":").concat(format(seconds));
}; // Helper function to add leading zero


function format(num) {
  return num < 10 ? "0".concat(num) : num;
} // IIFE to run the clock


(function run() {
  clock();
  setTimeout(function () {
    run();
  }, 1000);
})();

/***/ }),

/***/ 2:
/*!****************************************!*\
  !*** multi ./resources/js/darkmode.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\User\Documents\Ynov\B2\WebDev\PHP\ProjetQuizz\LaReponseD\LaReponseD\resources\js\darkmode.js */"./resources/js/darkmode.js");


/***/ })

/******/ });