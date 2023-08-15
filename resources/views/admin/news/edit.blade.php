@extends('layout.admin.master')
@section('title') Add News Form @endsection
@section('add-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('body')

    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 mx-3">Add News</h4>
            <a href="{{route('admin.news.index')}}" class="btn btn-warning w-md mx-2"><i class="dripicons-chevron-left"></i> Back</a>
        </div>
    </div>
    <div class="col-xl-12">
        <form action="{{route('admin.news.update',['id'=>$news->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body" id="addForm">
                    <h5 class="card-title text-primary mb-3">Basic Info </h5>
                    <div class="row">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">News Title</label>
                            <div class="col-md-10">
                                <input type="text " name="title" class="form-control" value="{{$news->title}}" placeholder="" >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">News Category</label>
                            <div class="col-md-10">
                                <select class="form-control" name="category_id" id="category_id" style="border-radius:4px" required onchange="getSubCategory(this.value)">
                                    <option value="" selected disabled>--Select Sub Category--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"{{$news->category->id == $category->id ? 'selected' :''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">News Description</label>
                            <textarea name="description"  class="form-control summernote" id="summernote" placeholder="Description" >
                                {!! $news->description !!}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Media--}}
            <div class="card">
                <div class="card-body" id="addForm">
                    <div class="row">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Tags</label>
                            <div class="col-md-10">

                                @php($tags = [])
                                @foreach ($news->tags as $key => $news_tag)
                                    @php($tags[$key] = $news_tag->tags)
                                @endforeach
                                @php($tags = json_encode($tags))
                                <input name='tags' class="form-control" value="{{$tags}}" autofocus>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body" id="addForm">
                    <h5 class="card-title text-primary mb-3"> Media </h5>
                    <div class="row">
                        <div class="mb-3 row">
                            <label for="example-text-input"  class="col-md-2 col-form-label">Video URL</label>
                            <div class="col-md-10">
                                <input type="text " name="video_url" value="{{$news->video}}" class="form-control" placeholder="" >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Thumbnail</label>
                            <div class="col-md-10">
                                <input type="file" min="0" step="0.01" onchange="readURL(this);" value="{{$news->thumbnail}}" name="thumbnail"  value="" class="form-control" placeholder="" >
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <img id="thumbnail_image" src="{{asset ( $news->thumbnail !=null ? 'storage/app/public/news/'.$news->thumbnail : 'public/admin/assets/images/placeholder-image-1.png' )}}" height="160px" width="300px" alt="your image"  />
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="text-muted">File Type : jpg jpeg png Maximum Size: 2MB</div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Images</label>
                            <div class="col-md-10 ">
                                <div class="d-flex flex-column">
                                    <div class="row edit_other_images mt-3"></div>
                                    <div class="row other_images mt-3"></div>
                                    <div class="text-muted">File Type : jpg jpeg png Maximum Size: 2MB</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div>
            <div class="col-lg-12 d-flex justify-content-end mt-3 mb-3">
                <button type="submit" class="btn btn-primary w-md mx-2"><i class="fa fa-save"></i> Update News </button>
                <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times-circle"></i> Reset</button>
            </div>
        </form>
    </div>
@endsection
@section('js')
    @include('admin.news.script')
    <script>
        $(function () {

            @foreach (json_decode($news->images) as $image)
                $(".edit_other_images").spartanMultiImagePicker({

                    fieldName: 'images[]',
                    maxCount: 5,
                    rowHeight: '150px',
                    groupClassName: 'col-md-4',
                    maxFileSize: '',
                    placeholderImage: {
                        image: "{{asset ( $image !=null ? 'storage/app/public/news/'.$image : 'public/admin/assets/images/placeholder-image-1.png' )}}",
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
            @endforeach

            });
    </script>
@endsection
