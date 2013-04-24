require( ['jquery'], function ( $ ) {
  $( '.purchase [name="purchase-option"]' ).change( function () { 
    var $option = $( this ),
        $buy = $( '.purchase .buy' ),
        $currentBuy = $buy.filter( '.' + $option.val() );

    // Hide all the buy buttons
    $buy.removeClass( 'selected' );

    // Show the current buy button
    $currentBuy.addClass( 'selected' );
  });
});