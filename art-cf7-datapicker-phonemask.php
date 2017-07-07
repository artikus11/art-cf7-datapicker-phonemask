<?php
/*
Plugin Name: Art Cf7 Datapicker Phonemask
Plugin URI: #
Description: Плагин телефонной маски и даты
Version: 1.0
Author: Артем Абрамович
Author URI: №
License:  GPL2
*/

/**
 * Load jQuery script
 */
add_action( 'wp_enqueue_scripts', 'acdp_enqueue_datepicker' );
function acdp_enqueue_datepicker() {
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
	wp_enqueue_style( 'jquery-ui' );
	wp_enqueue_script('jquery-mask', plugins_url( '/assets/js/jquery.maskedinput.min.js', __FILE__ ), null, true);
}

add_filter( 'wpcf7_form_elements', 'do_shortcode' );

add_action( 'wp_footer', 'acdp_custom_script' );
function acdp_custom_script() {
	?>
	<script>
        jQuery(document).ready(function ($) {
            'use strict';
            $.datepicker.setDefaults({
                closeText: 'Закрыть',
                prevText: '<Пред',
                nextText: 'След>',
                currentText: 'Сегодня',
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
                dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                weekHeader: 'Нед',
                dateFormat: 'dd-mm-yy',
                firstDay: 1,
                showAnim: 'slideDown',
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            } );
            $('input[name*="date"], .datepicker, .acdp-datepicker').datepicker({
	            dateFormat: 'dd.mm.yy'
            });
            
            $(".acdp-phone").mask("+7(999) 999-99-99");
        });
	</script>
	
	<?php
}
