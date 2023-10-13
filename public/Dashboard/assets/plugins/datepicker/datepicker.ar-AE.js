(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(require('jquery')) :
  typeof define === 'function' && define.amd ? define(['jquery'], factory) :
  (factory(global.jQuery));
}(this, (function ($) {
  'use strict';

  $.fn.datepicker.languages['ar-AE'] = {
    format: 'dd/mm/yyyy',
    days: ['الأحد', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
    daysShort: ['أحد', 'أثنين', 'ثلاثاء', 'اربعاء', 'خميس', 'جمعة', 'سبت'],
    daysMin: ['أ', 'ث', 'ث', 'أ', 'خ', 'ج', 'س'],
    weekStart: 1,
    months: ['يناير', ' فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', ' اكتوبر', ' نوفمبر', 'ديسمبر'],
    monthsShort: ['يناير', ' فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', ' اكتوبر', ' نوفمبر', 'ديسمبر'],
  };
})));
