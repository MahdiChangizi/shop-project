(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
  typeof define === 'function' && define.amd ? define(['exports'], factory) :
  (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.fa = {}));
}(this, (function (exports) { 'use strict';

  var fp = typeof window !== "undefined" && window.flatpickr !== undefined
      ? window.flatpickr
      : {
          l10ns: {},
      };
  var Persian = {
      weekdays: {
          shorthand: ["یک", "دو", "سه", "چهار", "پنج", "جمعه", "شنبه"],
          longhand: [
              "یک‌شنبه",
              "دوشنبه",
              "سه‌شنبه",
              "چهارشنبه",
              "پنچ‌شنبه",
              "جمعه",
              "شنبه",
          ],
      },
      months: {
          shorthand: [
              "فروردین",
              "اردیبهشت",
              "خرداد",
              "تیر",
              "مرداد",
              "شهریور",
              "مهر",
              "آبان",
              "آذر",
              "دی",
              "بهمن",
              "اسفند",
          ],
          longhand: [
              "فروردین",
              "اردیبهشت",
              "خرداد",
              "تیر",
              "مرداد",
              "شهریور",
              "مهر",
              "آبان",
              "آذر",
              "دی",
              "بهمن",
              "اسفند",
          ],
      },
      firstDayOfWeek: 6,
      ordinal: function () {
          return "";
      },
      amPM: ["ق.ظ", "ب.ظ"],
      rangeSeparator: ' تا ',
      weekAbbreviation: "هفته",
      daysInMonth: [31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29]
  };
  fp.l10ns.fa = Persian;
  var fa = fp.l10ns;

  exports.Persian = Persian;
  exports.default = fa;

  Object.defineProperty(exports, '__esModule', { value: true });

})));
