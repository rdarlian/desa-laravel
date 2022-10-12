$(document).ready(function(){
    var tgl = $('.js-dropdown');

    for(var i=0; i<tgl.length;i++){
        $tgl[i].on('click',function(){
        $childl = $(this).children('i');
        $childl.toggleClass("fas fa-angle-down").toggleClass("fas fa-angle-up");

        $child2 = $(this).children('ul');
        $child2.slideToggle('.sub-list');
    });
}
});
