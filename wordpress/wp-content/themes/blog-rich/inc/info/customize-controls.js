( function( api ) {

	// Extends our custom "portfolio-view-pro" section.
	api.sectionConstructor['blog-rich'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
