/**
 * Selects & Tags
 */

'use strict';

$(function () {
  $('.select2').each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'انتخاب',
      language: 'fa',
      dropdownParent: $this.parent()
    });
  });
});
