jQuery( document ).ready( function( $ ) {
	"use strict";
	var slider = document.getElementById("myRange");
	var output = document.getElementById("logo_showcase_columns_show_slide_speed");
	output.innerHTML = slider.value;

	slider.oninput = function() { 
	  	output.setAttribute( 'value' ,this.value );
	};

	$( "#radio-three" ).on( 'change', function() {
		var getImghIVal = $( this ).val();
		if( getImghIVal  == 'theme1' ) {
			$( "#grid_col_controller" ).hide( 'slow' );
			$( "#grid_col_controller2" ).hide( 'slow' );
			$( "#grid_col_controller3" ).hide( 'slow' );
			$( "#grid_col_controller4" ).hide( 'slow' );
		}
		if( getImghIVal  == 'theme2' ) {
			$( "#grid_col_controller" ).show( 'slow' );
			$( "#grid_col_controller2" ).show( 'slow' );
			$( "#grid_col_controller3" ).show( 'slow' );
			$( "#grid_col_controller4" ).show( 'slow' );
		}
		if( getImghIVal  == 'theme3' ) {
			$( "#grid_col_controller" ).hide( 'slow' );
			$( "#grid_col_controller2" ).hide( 'slow' );
			$( "#grid_col_controller3" ).hide( 'slow' );
			$( "#grid_col_controller4" ).hide( 'slow' );
		}
	});

	$( "#radio-four" ).on( 'change', function() {
		var getImghIVal = $( this ).val();
		if( getImghIVal  == 'theme1' ) {
			$( "#grid_col_controller" ).hide( 'slow' );
			$( "#grid_col_controller2" ).hide( 'slow' );
			$( "#grid_col_controller3" ).hide( 'slow' );
			$( "#grid_col_controller4" ).hide( 'slow' );
		}
		if( getImghIVal  == 'theme2' ) {
			$( "#grid_col_controller" ).show( 'slow' );
			$( "#grid_col_controller2" ).show( 'slow' );
			$( "#grid_col_controller3" ).show( 'slow' );
			$( "#grid_col_controller4" ).show( 'slow' );
		}
		if( getImghIVal  == 'theme3' ) {
			$( "#grid_col_controller" ).hide( 'slow' );
			$( "#grid_col_controller2" ).hide( 'slow' );
			$( "#grid_col_controller3" ).hide( 'slow' );
			$( "#grid_col_controller4" ).hide( 'slow' );
		}
	});

	$( "#radio-five" ).on( 'change', function() {
		var getImghIVal = $( this ).val();
		if( getImghIVal  == 'theme1' ) {
			$( "#grid_col_controller" ).hide( 'slow' );
			$( "#grid_col_controller2" ).hide( 'slow' );
			$( "#grid_col_controller3" ).hide( 'slow' );
			$( "#grid_col_controller4" ).hide( 'slow' );
		}
		if( getImghIVal  == 'theme2' ) {
			$( "#grid_col_controller" ).show( 'slow' );
			$( "#grid_col_controller2" ).show( 'slow' );
			$( "#grid_col_controller3" ).show( 'slow' );
			$( "#grid_col_controller4" ).show( 'slow' );
		}
		if( getImghIVal  == 'theme3' ) {
			$( "#grid_col_controller" ).hide( 'slow' );
			$( "#grid_col_controller2" ).hide( 'slow' );
			$( "#grid_col_controller3" ).hide( 'slow' );
			$( "#grid_col_controller4" ).hide( 'slow' );
		}
	});

	$( document ).on( 'click', '.tab-nav li', function() {
		$( ".active" ).removeClass( "active" );
		$( this ).addClass( "active" );
		var nav = $( this ).attr( "nav" );
		$( ".box li.tab-box" ).css( "display","none" );
		$( ".box"+nav ).css( "display","block" );
		$( "#nav_value" ).val( nav );
	});

	var repeatable_field = {
	    init: function() {
	        this.dragnDrop();
	        this.addRow();
	        this.removeRow();
	        this.addImageUploader();
	        this.removeImage();
	    },
	    dragnDrop: function() {
	        jQuery( "#ask-sortable" ).sortable();
	        jQuery( "#ask-sortable" ).disableSelection();
	    },
	    addRow: function() {
	        jQuery( document ).on( 'click', '#add-row', function ( e ) {
	            e.preventDefault();
	            var row = jQuery( '.empty-row.screen-reader-text' ).clone(true);
	            row.removeClass( 'empty-row screen-reader-text' );
	            row.insertBefore( '#repeatable-fieldset-one #ask-sortable>div:last' );
	            // return false;
	        } );
	    },
	    removeRow: function() {
	        jQuery( document ).on( 'click', '.remove-row', function () {
	            jQuery( this ).parents( 'div.ui-state-default' ).remove();
	            return false;
	        } );
	    },
	    addImageUploader: function() {
	        jQuery( document ).on( 'click', '.ask-upload_image_button', function ( event ) {
	            event.preventDefault();

	            var inputField = jQuery( this ).prev( '.nts-logo' );
	            console.log( inputField );
	            // Create the media frame.
	            var pevent = event,
	                button = jQuery( this ),
	                file_frame = wp.media( {
	                    library: {
	                        type: 'image',
	                    },
	                    multiple: false
	                } ).on( 'select', function () {
	                    var attachment = file_frame.state().get( 'selection' ).first().toJSON();
	                    var attachment_thumbnail = attachment.sizes.full || attachment.sizes.full;

	                    button.closest( '.tpsl-repeater-logo-wrapper' ).find( '.ask-logo' ).val( attachment.id );
	                    button.closest( '.tpsl-repeater-logo-wrapper' ).find( '.ask-logo' ).before( '<div><img src="' + attachment_thumbnail.url + '"/></div>' );
	                    button.closest( '.tpsl-repeater-logo-wrapper' ).find( '.ask-remove_image_button' ).show();
	                    button.hide();
	                } ).open();
	        } );
	    },
	    removeImage: function(){
	        jQuery( document ).on( 'click', '.ask-remove_image_button', function ( event ) {
	            event.preventDefault();
	            jQuery( this ).closest( '.tpsl-repeater-logo-wrapper' ).find( '.ask-logo' ).val( '' );
	            jQuery( this ).closest( '.tpsl-repeater-logo-wrapper' ).find( '.ask-upload_image_button' ).show();
	            jQuery( this ).hide();
	            jQuery( this ).closest( '.tpsl-repeater-logo-wrapper' ).find( 'div' ).remove();
	        } );
	    }
	}
	repeatable_field.init();
});