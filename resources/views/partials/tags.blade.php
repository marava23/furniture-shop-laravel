@foreach($tags as $tag)
    <li>
        <label class="check">
            <input type="checkbox" name="tag[]" value="{{$tag->id}}"  @if(isset($qs["tag"]) && in_array($tag->id,$qs["tag"])) checked @endif>
            <span class="checkmark"></span>
        </label>
        <a href="#">
            <b>{{$tag->name}}</b>
            <span class="quantity">({{$tag->productTags->count()}})</span>
        </a>
    </li>
@endforeach
