(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define('simditor-center', ["jquery",
      "simditor"], function ($, Simditor) {
      return (root.returnExportsGlobal = factory($, Simditor));
    });
  } else if (typeof exports === 'object') {
    // Node. Does not work with strict CommonJS, but
    // only CommonJS-like enviroments that support module.exports,
    // like Node.
    module.exports = factory(require("jquery"),
      require("Simditor"));
  } else {
    root['SimditorEmoji'] = factory(jQuery,
      Simditor);
  }
}(this, function ($, Simditor) {

var CenterButton,
  __hasProp = {}.hasOwnProperty,
  __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; },
  __slice = [].slice;

CenterButton = (function(_super) {
  __extends(CenterButton, _super);

  CenterButton.i18n = {
    'zh-CN': { center: '居中' },
    'en': { center: 'center' }
  };

  CenterButton.prototype.name = 'center';

  CenterButton.prototype.icon = 'align-center';

  CenterButton.prototype.htmlTag = 'center';

  CenterButton.prototype.menu = true;

  function CenterButton() {
    var args;
    args = 1 <= arguments.length ? __slice.call(arguments, 0) : [];
    CenterButton.__super__.constructor.apply(this, args);
  }

  CenterButton.prototype.renderMenu = function() {
  };

  CenterButton.prototype.command = function() {
  };

  return CenterButton;

})(Simditor.Button);

Simditor.Toolbar.addButton(CenterButton);


return CenterButton;


}));
