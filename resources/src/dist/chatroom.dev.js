"use strict";

var _vue = _interopRequireDefault(require("vue"));

var _Chatroom = _interopRequireDefault(require("./Chatroom"));

require("bootstrap/dist/css/bootstrap.min.css");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

// import './assets/sass/main.scss';
_vue["default"].config.productionTip = false;
new _vue["default"]({
  render: function render(h) {
    return h(_Chatroom["default"]);
  }
}).$mount('#chatroom');