document.addEventListener('DOMContentLoaded', function(){

    class LoadElement {
        constructor(btn_load){
            this.btn_load = document.querySelector('.img-form');
        }

        init(){
            this.btn_load.addEventListener('click', this.loadMore.bind(this));
        };

        loadMore(){
            // var load = document.querySelector('.img-form');

            // load.addEventListener('click', function(){
                var last_img = $(this).data('img');
                $('#btn_more').html('chargement...');

                $.ajax({
                    url:'/src/Controller/SerieController.php',
                    method:'POST',
                    data:{last_img:last_img},

                    success:function(data){
                        if(data != ''){
                            $('.btnsuite').remove();
                            $('#imagesRow').append(data);
                        }
                        else {
                            $('#btn_more').html('aucune image');
                        }
                    },

                    error:function(res, status, err){

                    }

                });
            // });
        };
    };

    var newLoader = new LoadElement();
    newLoader.init();
});
