<script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.lfm-btn').filemanager('image', {'prefix':'http://localhost/PHP1902_Duong/Code-Laravel/T3hHomework/public/laravel-filemanager'});


        $('#plus-image').on('click', function (e) {
            e.preventDefault();

            var lfm_count = parseInt($('.lfm-btn').length);
            var next = lfm_count+1;

            var html = '';

            for(var i = 0; i < 1000; i++){

                if ($('#lfm'+next).length < 1) {

                    html += '<div class="form-group">\n' +
                        '                    <label for="focusedinput" class="col-sm-2 control-label">Images</label>\n' +
                        '                    <div class="col-sm-8">\n' +
                        '                        <span class="input-group-btn">\n' +
                        '                         <a id="lfm'+next+'" data-input="thumbnail'+next+'" data-preview="holder'+next+'" class="lfm-btn btn btn-primary">\n' +
                        '                           <i class="fa fa-picture-o"></i> Choose\n' +
                        '                         </a>\n' +
                        '                            <a class="btn btn-warning remove-image">\n' +
                        '                           <i class="fa fa-remove"></i> Xóa\n' +
                        '                         </a>\n' +
                        '                       </span>\n' +
                        '                        <input id="thumbnail'+next+'" type="text" name="images[]" value="" class="form-control1" id="focusedinput" placeholder="Default Input">\n' +
                        '                        <img id="holder'+next+'" style="margin-top:15px;max-height:100px;">\n' +
                        '                    </div>\n' +
                        '                </div>';


                    break;
                } else {
                    next++;
                }


            }

            var box = $(this).closest('.form-group');

            $( html ).insertBefore( box );

            $('.lfm-btn').filemanager('image', {'prefix':'http://localhost/PHP1902_Duong/Code-Laravel/T3hHomework/public/laravel-filemanager'});

        });


        $(body).on('click', '.remove-image', function (e) {
            e.preventDefault();

            $(this).closest('.form-group').remove();

        });


    });

</script>
