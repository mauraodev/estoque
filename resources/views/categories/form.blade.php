<form class="form" method="POST" action="{{ action('CategoriesController@update') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $category->id }}">

    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
    </div>

    <button class="btn btn-primary pull-right">
        Salvar
    </button>
</form>
