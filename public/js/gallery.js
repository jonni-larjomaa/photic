$(function(){
    $('.thumbnail').fancybox();
    
    $('button.delete').click(function(e){
        e.stopPropagation();
        
        var el = $(this);
        var image = el.parent('a').attr('href').split('/').pop();
        
        $.post('/delete', {photo : image}, function(data){
            
            if( data.success )
            {
                el.closest('div.thumb').hide('slow',function(){
                    $(this).remove();
                });
            }
            else
            {
                alert('Could not remove image: ' + image);
            }
            
        });
        
        e.preventDefault();
    });
});
