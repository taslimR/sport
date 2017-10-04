jQuery( document ).ready( function ( $ ) {
	var offset;
	jQuery( 'body' ).on( 'click', '.penci-ajax-more-button', function ( event ) {
		if ( !$( this ).hasClass( 'loading-posts' ) ) {
			var $this = $( this ),
				layout = $this.data( 'layout' ),
				ppp = $this.data( 'number' ),
				mes = $this.data( 'mes' );
			offset = $( this ).attr( 'data-offset' );

			$this.addClass( 'loading-posts' );

			$.ajax( {
				type    : "POST",
				dataType: "html",
				url     : ajax_var_more.url,
				data    : 'offset=' + offset + '&layout=' + layout + '&ppp=' + ppp + '&action=penci_more_post_ajax&nonce=' + ajax_var_more.nonce,
				success : function ( data ) {
					if ( data ) {
						var data_offset = parseInt( offset ) + ppp;
						$this.attr( 'data-offset', data_offset );
						if ( layout === 'standard' || layout === 'classic' ) {
							$( "#main .theiaStickySidebar > article:last" ).after( data );
						} else if ( layout === 'overlay' ) {
							$( "#main .theiaStickySidebar > section:last" ).after( data );
						} else if ( layout === 'masonry' || layout === 'masonry-2' ) {
							$( data ).imagesLoaded( function () {
								$( ".penci-masonry" ).isotope( 'insert', $( data ) );
							} );
						} else {
							$( ".theiaStickySidebar > ul.penci-grid" ).append( data );
						}

						$( ".container" ).fitVids();

						$( '#main .penci-slick-slider' ).each( function () {
							var $this = $( this );
							$this.slick( {
								dots          : false,
								infinite      : true,
								speed         : 500,
								slidesToShow  : 1,
								nextArrow     : '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-right"></i></button>',
								prevArrow     : '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-left"></i></button>',
								adaptiveHeight: true
							} );	// slick

							$( data ).imagesLoaded( function () {
								$this.addClass( 'loaded' );
							} );
						} );	// each

						if( $().easyPieChart ) {
							$( '.penci-piechart' ).each( function () {
								var $this = $( this );
								$this.one( 'inview', function ( event, isInView, visiblePartX, visiblePartY ) {
									var chart_args = {
										barColor  : $this.data( 'color' ),
										trackColor: $this.data( 'trackcolor' ),
										scaleColor: false,
										lineWidth : $this.data( 'thickness' ),
										size      : $this.data( 'size' ),
										animate   : 1000
									};
									$this.easyPieChart( chart_args );
								} ); // bind inview
							} ); // each
						}

						$this.removeClass( 'loading-posts' );

					} else {
						$( ".penci-ajax-more-button .ajax-more-text" ).text( mes );
						$( ".penci-ajax-more-button i" ).remove();
						$this.removeClass( 'loading-posts' );
						setTimeout(function(){
							$this.remove();
						}, 1200);
					}
				},
				error   : function ( jqXHR, textStatus, errorThrown ) {
					$loader.html( jqXHR + " :: " + textStatus + " :: " + errorThrown );
				}

			} );
		}
	} );

} );