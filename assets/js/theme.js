/**
 * Improve spacing of responsive navigation container
 */

// Get header navigation (which is our alignment anchor)
let headerNavigation = document.querySelector( 'header.wp-block-template-part .wp-block-navigation' );

// Get header navigation close button
let headerNavigationResponsiveClose = document.querySelector( 'header.wp-block-template-part .wp-block-navigation__responsive-container-close' );

// Set margin top equal to the window offset of the header navigation
headerNavigationResponsiveClose.style.marginTop = headerNavigation.offsetTop + 'px';
