<div class="mb-3">
    <label for="insert-title" class="form-label">Titolo</label>
    <input value="{{ old('title', $post->title) }}" type="text" value="{{ $post->title }}" name="title"
        class="form-control" id="insert-title" placeholder="Inserici il titolo del post" required>
</div>
@error('title')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@enderror
<div class="mb-3">
    <label for="insert-post_image" class="form-label">Immagine</label>
    <input value="{{ old('post_image', $post->post_image) }}" type="text" value="{{ $post->post_image }}"
        name="post_image" class="form-control" id="insert-post_image" placeholder="Inserici l'immagine del post"
        required>
</div>
@error('post_image')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@enderror
<div class="mt-3">
    <label for="post_content">Contenuto del post</label>
    <textarea class="form-control" name="post_content" id="post_content" cols="30" rows="5"
        placeholder="Scrivi il tuo post"required>
                        {{ old('post_content', $post->post_content) }}
                    </textarea>
</div>
@error('post_content')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@enderror
<button type="submit" class="mt-3 btn btn-lg btn-success text-center fw-bold">Inserisci le
    modifiche</button>
