/**
 * @file
 * Javascript for Field Example.
 */

/**
 * Provides a farbtastic colorpicker for the fancier widget.
 */
(function ($) {
  Drupal.behaviors.accordion_field_colorpicker = {
    attach: function(context) {
      $(".edit-field-example-colorpicker").live("focus", function(event) {
        var edit_field = this;
        var picker = $(this).closest('div').parent().find(".field-example-colorpicker");

        // Hide all color pickers except this one.
        $(".field-example-colorpicker").hide();
        $(picker).show();
        $.farbtastic(picker, function(color) {
          edit_field.value = color;
        }).setColor(edit_field.value);
      });
    }
  }

  Drupal.behaviors.accordion = {
    attach: function(context) {
      $('.accordion-body').hide();
      $('.accordion-title').on('click', function(){
        $(this).toggleClass('open').next('.accordion-body').slideToggle();
      });
    }
  }

})(jQuery);
