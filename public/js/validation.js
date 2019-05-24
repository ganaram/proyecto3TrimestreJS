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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/validation.js":
/*!************************************!*\
  !*** ./resources/js/validation.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  asociarEventos();
});

function asociarEventos() {
  $('#formTest').submit(function (event) {
    event.preventDefault();
    validacionForm();
  });
  $("#mail").change(function (event) {
    validacionEmail();
  });
  $("#pwd").change(function (event) {
    validacionContra();
  });
  $("#terms").change(function (event) {
    validacionCheckbox();
  });
  $("#selector").change(function (event) {
    validacionSelect();
  });
  $("#age").change(function (event) {
    validacionAge();
  });
  $().alert();
}

function validacionEmail() {
  var errors = [];
  var mail = $("#mail").val();
  var regex = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);

  if (!regex.test(mail)) {
    errors.push("The mail does not match our validation rules.");
  }

  var esCorrecto = imprimeErrores("#mail", "#errorsMail", errors);
  return esCorrecto;
}

function validacionContra() {
  var errors = [];
  var pwd = $("#pwd").val();
  var regex = new RegExp(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/);

  if (!regex.test(pwd)) {
    errors.push("Your password should contain eight characters, one letter and one number.");
  }

  var esCorrecto = imprimeErrores("#pwd", "#errorsPwd", errors);
  return esCorrecto;
}

function validacionForm() {
  var errors = [];
  $(txt).remove();
  var txt = "<span>Check your form and correct the errors.</span>";
  var esEmailCorrecto = validacionEmail();
  var esAgeCorrecta = validacionAge();
  var esCheckboxCorrecto = validacionCheckbox();
  var esContraCorrecta = validacionContra();
  var esSelectCorrecto = validacionSelect();

  if (esAgeCorrecta && esCheckboxCorrecto && esContraCorrecta && esEmailCorrecto && esSelectCorrecto) {
    $("formTest").submit();
    $('#successForm').modal('toggle');
  } else {
    $('#errorsForm').modal('toggle');
  }
}

function validacionSelect() {
  var errors = [];

  if ($("#selector").val() === "") {
    errors.push("You have to select an accout type.");
  }

  var esCorrecto = imprimeErrores("#selector", "#errorsSelect", errors);
  return esCorrecto;
}

function validacionAge() {
  var errors = [];

  if ($("#age").val() < 18) {
    errors.push("You have to be 18 or older.");
  }

  if (!$.isNumeric($("#age").val())) {
    errors.push("You have to introduce a numeric value.");
  }

  var esCorrecto = imprimeErrores("#age", "#errorsAge", errors);
  return esCorrecto;
}

function validacionCheckbox() {
  var errors = [];

  if (!$("#terms").is(":checked")) {
    errors.push("You have to agree our terms.");
  }

  var esCorrecto = imprimeErrores("#terms", "#errorsTerms", errors);
  return esCorrecto;
}

function imprimeErrores(campo, campoErrores, errors) {
  var esCorrecto = false;
  $(campo).removeClass("is-valid is-invalid");
  $(campoErrores).empty();

  if (errors.length === 0) {
    $(campo).addClass("is-valid");
    $(campoErrores).removeClass("alert alert-danger");
    esCorrecto = true;
  } else {
    esCorrecto = false;
    $(campo).addClass("is-invalid");
    $(campoErrores).addClass("alert alert-danger");
    errors.forEach(function (error) {
      return $(campoErrores).append("<span>".concat(error, "</span>"));
    });
  }

  return esCorrecto;
}

/***/ }),

/***/ 1:
/*!******************************************!*\
  !*** multi ./resources/js/validation.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/usuario/Sites/pccompuestosJS/resources/js/validation.js */"./resources/js/validation.js");


/***/ })

/******/ });