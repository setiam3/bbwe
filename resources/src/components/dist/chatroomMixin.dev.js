"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _chatroomStore = _interopRequireDefault(require("./../stores/chatroomStore"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var chatroomMixin = {
  store: _chatroomStore["default"],
  computed: {
    user: function user() {
      return window.user;
    },
    group: function group() {
      return this.$store.state.group_selected;
    },
    groups: function groups() {
      return this.$store.state.groups;
    },
    group_active: function group_active() {
      if (Object.keys(this.$store.state.group_selected).length === 0 && this.$store.state.group_selected.constructor === Object) {
        return false;
      }

      return true;
    }
  }
};
var _default = chatroomMixin;
exports["default"] = _default;