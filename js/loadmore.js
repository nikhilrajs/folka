jQuery(function($) {
	var limit = 6;
	var page = 1;
	var type = 'latest';
	var category = '';
	var max_pages_latest = 1;


  

    $('.app-l-blog__more .app-c-btn').click(function(e) {
        e.preventDefault();
        var button = $(this),
            data = {
                'action': 'loadmore',
                'limit': limit,
                'page': page,
                'type': type,
                'category': category
            };

        $.ajax({
            url: postAjax.ajaxurl,
            data: data,
            type: 'POST',
            beforeSend: function(xhr) {
                //button.text('Loading...'); // change the button text, you can also add a preloader image
            },
            success: function(data) {
                
                if (data) {
					$(".app-l-blog__list").append(data);
                    page++;
                    [].forEach.call(document.querySelectorAll('img[data-src]'),    function(img) {
                        img.setAttribute('src', img.getAttribute('data-src'));
                        img.onload = function() {
                            img.removeAttribute('data-src');
                        };
                    });
                   // button.text('More Articles');
                    if (page == max_pages_latest)
                        button.remove(); // if last page, remove the button
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
        
    });

   

});