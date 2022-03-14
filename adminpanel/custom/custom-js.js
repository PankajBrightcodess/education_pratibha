$(document).ready(function(){
    $('body').on('click','.has-treeview',function(e){
		var current=$(this);
		$('.has-treeview').each(function(index, element) {
            if($(this).not(current).hasClass('menu-open')){
				$(this).removeClass('menu-open').find('.nav-treeview').slideUp();
			}
        });
	});
});