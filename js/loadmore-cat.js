jQuery(function($) {

    var limit2 = 6;
	var page2 = 1;
	var type2 = 'website';
	var category2 = '';
	var max_pages_latest2 = 1;
    var id ='';

    var $catID = $("#cat-id").val();

    $('.app-l-cat__more .app-c-btn').click(function(e) {
        e.preventDefault();
        var button = $(this),
            data2 = {
                'action': 'load_more_posts',
                'limit': limit2,
                'page': page2,
                'type': type2,
                'category': category2,
                'id' : $catID,
            };

        $.ajax({
            url: catAjax.ajaxurl,
            data: data2,
            type: 'POST',
           
            beforeSend: function(xhr) {
                //button.text('Loading...'); // change the button text, you can also add a preloader image
                
            },
            success: function(data) {
               
                if (data) {
					$(".app-l-cat__wrap").append(data);
                    page2++;
                    [].forEach.call(document.querySelectorAll('img[data-src]'),    function(img) {
                        img.setAttribute('src', img.getAttribute('data-src'));
                        img.onload = function() {
                            img.removeAttribute('data-src');
                        };
                    });
                   // button.text('More Articles');
                    if (page2 == max_pages_latest2)
                        button.parent().remove(); // if last page, remove the button
                } else {
                    button.parent().remove(); // if no data, remove the button as well
                }
            }
        });
        
    });

});