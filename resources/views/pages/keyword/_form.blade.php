@csrf
<div class="form-group mb-4">

    <label class="mt-3">Title En</label>
    <div class="input-group mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Title</span>
        </div>
        <textarea class="@error('title_en') is-invalid @enderror form-control" name="title_en" aria-label="With textarea">{{ old('title_en', $keyword->getTranslation('title', 'en') ?? '') }}</textarea>
    </div>

    @error('title_en')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label class="mt-3">Description En</label>
    <div class="input-group mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Description</span>
        </div>
        <textarea class="@error('description_en') is-invalid @enderror form-control" name="description_en" aria-label="With textarea">{{ old('description_en', $keyword->getTranslation('description', 'en') ?? '') }}</textarea>
    </div>

    @error('description_en')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label class="mt-3">Keyword En</label>
    <div class="input-group mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Keyword</span>
        </div>
        <textarea class="@error('keyword_en') is-invalid @enderror form-control" name="keyword_en" aria-label="With textarea">{{ old('keyword_en', $keyword->getTranslation('keyword', 'en') ?? '') }}</textarea>
    </div>

    @error('keyword_en')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label class="mt-3">Tag En</label>
    <div class="input-group mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Tag</span>
        </div>
        <textarea class="@error('tag_en') is-invalid @enderror form-control" name="tag_en" aria-label="With textarea">{{ old('tag_en', $keyword->getTranslation('tag', 'en') ?? '') }}</textarea>
    </div>

    @error('tag_en')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label class="mt-3">Title Ar</label>
    <div class="input-group mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Title</span>
        </div>
        <textarea class="@error('title_ar') is-invalid @enderror form-control" name="title_ar" aria-label="With textarea">{{ old('title_ar', $keyword->getTranslation('title', 'ar') ?? '') }}</textarea>
    </div>

    @error('title_ar')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label class="mt-3">Description Ar</label>
    <div class="input-group mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Description</span>
        </div>
        <textarea class="@error('description_ar') is-invalid @enderror form-control" name="description_ar" aria-label="With textarea">{{ old('description_ar', $keyword->getTranslation('description', 'ar') ?? '') }}</textarea>
    </div>

    @error('description_ar')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label class="mt-3">Keyword Ar</label>
    <div class="input-group mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Keyword</span>
        </div>
        <textarea class="@error('keyword_ar') is-invalid @enderror form-control" name="keyword_ar" aria-label="With textarea">{{ old('keyword_ar', $keyword->getTranslation('keyword', 'ar') ?? '')  }}</textarea>
    </div>

    @error('keyword_ar')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label class="mt-3">Tag Ar</label>
    <div class="input-group mb-5">
        <div class="input-group-prepend">
            <span class="input-group-text">Tag</span>
        </div>
        <textarea class="@error('tag_ar') is-invalid @enderror form-control" name="tag_ar" aria-label="With textarea">{{ old('tag_ar', $keyword->getTranslation('tag', 'ar') ?? '') }}</textarea>
    </div>

    @error('tag_ar')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

</div>
