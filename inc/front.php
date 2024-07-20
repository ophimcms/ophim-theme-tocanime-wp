<?php

//ajax search
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
    ?>
    <script type="text/javascript">
        function fetch(){

            $("#result").html('');
            key = jQuery('#search-nav').val();
            if(!key){
                $("#result").html('');
                return;
            }
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: { action: 'search_film', keyword:key ,limit : 5 },
                success: function(res) {
                    $("#result").html('');
                    let data = JSON.parse(res);
                    $.each(data, function(key, value){
                        $('#result').append('<a href="'+value.slug+'"><div class="rowsearch"> <div class="column left"> <img src="'+value.image+'" width="40" /> </div> <div class="column right"><p> '+value.title+' ' + '</p> '+value.original_title+' | '+value.year+' </div> </div></a>' )
                    });
                }
            });
            document.body.addEventListener("click", function (event) {
                $("#result").html('');
            });

        }
    </script>

    <?php
}

//search fim
function mySearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'ophim');
    };
    return $query;
};

add_filter('pre_get_posts','mySearchFilter');