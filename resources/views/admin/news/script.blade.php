<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/spartan-multi-image-picker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://unpkg.com/@yaireo/tagify"></script>
<script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>

<script>
    var input = document.querySelector('input[name=tags]');
    new Tagify(input)

    $('#summernote').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true                  // set focus to editable area after initializing summernote
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#thumbnail_image').attr('src', e.target.result).width(160).height(160);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<script type="text/javascript">
    $(function () {
        $(".other_images").spartanMultiImagePicker({
            fieldName: 'images[]',
            maxCount: 5,
            rowHeight: '150px',
            groupClassName: 'col-md-4',
            maxFileSize: '',
            placeholderImage: {
                image: "{{asset('/')}}admin/assets/images/placeholder-image-1.png",
                width: '100%'
            },
            dropFileLabel: "drop_here",
            onAddRow: function (index, file) {

            },
            onRenderedPreview: function (index) {

            },
            onRemoveRow: function (index) {

            }
        });
    });
</script>

