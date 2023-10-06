/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/board/index.js ***!
  \*************************************/
function getBoardUrl(value) {
  location.href = value;
}
$('#boardSelect').on('change', function () {
  location.href = this.value;
});
/******/ })()
;