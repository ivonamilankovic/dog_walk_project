
//not implemented anywhere

$(document).ajaxStart(function () {
    $('.loader').show();
});

$(document).ajaxComplete(function () {
    $('.loader').hide();
});
// treba negde ubaciti taj div sa slikom

/*
* css za zatamnjenu pozadinu:
* css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff' }
*
*
*  2. primer na:  https://jquery.malsup.com/block/#demos
* */