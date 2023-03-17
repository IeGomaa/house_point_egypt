@csrf
<div class="form-group mb-4">
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $blog->title ?? '') }}" class="form-control mb-3">

    <label class="mt-3">Description</label>
    <div class="input-group mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Description</span>
        </div>
        <textarea class="form-control" name="description" aria-label="With textarea">{{ old('description', $blog->description ?? '') }}</textarea>
    </div>

    <div class="row layout-top-spacing">

        <div id="fuSingleFile" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>
                            Blog Image
                            <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a>
                        </label>
                        <label class="custom-file-container__custom-file" >
                            <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
