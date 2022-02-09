$(function(){
    
    $('input').each (function(){
        if($(this).attr('required')==='required'){
            $(this).after('<span class="asteric">*</span>');
        }
    });
    
   $('.confirm').onclick (function(){
    return confirm('Are You Sure?');
}); 
});
/////////////////////////////////////////////////////////////// Message confirm into btn Delet

